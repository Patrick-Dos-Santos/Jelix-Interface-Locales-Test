<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package      jelix
* @subpackage   core
* @author       Jouanneau Laurent
* @contributor  Thibault PIRONT < nuKs >, Christophe Thiriot, Philippe Schelté
* @copyright    2006-2009 Jouanneau laurent
* @copyright    2007 Thibault PIRONT, 2008 Christophe Thiriot, 2008 Philippe Schelté
* @link         http://www.jelix.org
* @licence      GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
class jConfigCompiler{
	private function __construct(){}
	static public function read($configFile){
		if(JELIX_APP_TEMP_PATH=='/'){
			die('Jelix Error: Application temp directory doesn\'t exist !');
		}
		if(!is_writable(JELIX_APP_TEMP_PATH)){
			die('Jelix Error: Application temp directory is not writable');
		}
		$config = jIniFile::read(JELIX_LIB_CORE_PATH.'defaultconfig.ini.php');
		if( $commonConfig = parse_ini_file(JELIX_APP_CONFIG_PATH.'defaultconfig.ini.php',true)){
			self::_mergeConfig($config, $commonConfig);
		}
		if($configFile !='defaultconfig.ini.php'){
			if(!file_exists(JELIX_APP_CONFIG_PATH.$configFile))
				die("Jelix config file $configFile is missing !");
			if( false ===($userConfig = parse_ini_file(JELIX_APP_CONFIG_PATH.$configFile,true)))
				die("Syntax error in the Jelix config file $configFile !");
			self::_mergeConfig($config, $userConfig);
		}
		$config = (object) $config;
		self::prepareConfig($config);
		if(BYTECODE_CACHE_EXISTS){
			$filename=JELIX_APP_TEMP_PATH.str_replace('/','~',$configFile).'.conf.php';
			if($f = @fopen($filename, 'wb')){
				fwrite($f, '<?php $config = '.var_export(get_object_vars($config),true).";\n?>");
				fclose($f);
			} else{
				throw new Exception('(24)Error while writing config cache file '.$filename);
			}
		}else{
			jIniFile::write(get_object_vars($config), JELIX_APP_TEMP_PATH.str_replace('/','~',$configFile).'.resultini.php', ";<?php die('');?>\n");
		}
		return $config;
	}
	static protected function prepareConfig($config){
		$config->isWindows =(DIRECTORY_SEPARATOR === '\\');
		if(trim( $config->startAction) == ''){
			$config->startAction = ':';
		}
		$config->_allBasePath = array();
		$unusedModules = split(' *, *',$config->unusedModules);
		$config->_modulesPathList = self::_loadPathList($config->modulesPath, $unusedModules, $config->_allBasePath);
		self::_loadPluginsPathList($config);
		$coordplugins = array();
		foreach($config->coordplugins as $name=>$conf){
			if(!isset($config->_pluginsPathList_coord[$name])){
				die("Jelix Error: Error in the main configuration. The coord plugin $name doesn't exist!");
			}
			if($conf){
				if($conf != '1' && !file_exists(JELIX_APP_CONFIG_PATH.$conf)){
					die("Jelix Error: Error in the main configuration. Configuration file '$conf' for coord plugin $name doesn't exist!");
				}
				$coordplugins[$name] = $conf;
			}
		}
		$config->coordplugins = $coordplugins;
		if($config->checkTrustedModules){
			$config->_trustedModules = explode(',',$config->trustedModules);
			if(!in_array('jelix',$config->_trustedModules))
				$config->_trustedModules[]='jelix';
		}else{
			$config->_trustedModules = array_keys($config->_modulesPathList);
		}
		if($config->urlengine['scriptNameServerVariable'] == ''){
			$config->urlengine['scriptNameServerVariable'] = self::_findServerName($config->urlengine['entrypointExtension']);
		}
		$config->urlengine['urlScript'] = $_SERVER[$config->urlengine['scriptNameServerVariable']];
		$lastslash = strrpos($config->urlengine['urlScript'], '/');
		$config->urlengine['urlScriptPath'] = substr($config->urlengine['urlScript'], 0, $lastslash).'/';
		$config->urlengine['urlScriptName'] = substr($config->urlengine['urlScript'], $lastslash+1);
		$basepath = $config->urlengine['basePath'];
		if($basepath != '/' && $basepath != ''){
			if($basepath{0} != '/') $basepath='/'.$basepath;
			if(substr($basepath,-1) != '/') $basepath.='/';
			if(PHP_SAPI != 'cli' && strpos($config->urlengine['urlScriptPath'], $basepath) !== 0){
				throw new Exception('Jelix Error: basePath ('.$basepath.') in config file doesn\'t correspond to current base path. You should setup it to '.$config->urlengine['urlScriptPath']);
			}
		} else if($basepath == ''){
			$basepath = $config->urlengine['urlScriptPath'];
		}
		$config->urlengine['basePath'] = $basepath;
		if($config->urlengine['jelixWWWPath']{0} != '/')
			$config->urlengine['jelixWWWPath'] = $basepath.$config->urlengine['jelixWWWPath'];
		$snp = substr($config->urlengine['urlScript'],strlen($basepath));
		$pos = strrpos($snp, $config->urlengine['entrypointExtension']);
		if($pos !== false){
			$snp = substr($snp,0,$pos);
		}
		$config->urlengine['urlScriptId'] = $snp;
		$config->urlengine['urlScriptIdenc'] = rawurlencode($snp);
		self::_initResponsesPath($config->responses);
		self::_initResponsesPath($config->_coreResponses);
		if(trim($config->timeZone) === ''){
			$tz = ini_get('date.timezone');
			if($tz != '')
				$config->timeZone = $tz;
			else
				$config->timeZone = "Europe/Paris";
		}
		if($config->sessions['storage'] == 'files'){
			$config->sessions['files_path'] = str_replace(array('lib:','app:'), array(LIB_PATH, JELIX_APP_PATH), $config->sessions['files_path']);
		}
		$config->sessions['_class_to_load'] = array();
		if($config->sessions['loadClasses'] != ''){
			$list = split(' *, *',$config->sessions['loadClasses']);
			foreach($list as $sel){
				if(preg_match("/^([a-zA-Z0-9_\.]+)~([a-zA-Z0-9_\.\\/]+)$/", $sel, $m)){
					if(!isset($config->_modulesPathList[$m[1]])){
						throw new Exception('Error in config files, loadClasses: '.$m[1].' is not a valid or activated module');
					}
					if(($p=strrpos($m[2], '/')) !== false){
						$className = substr($m[2],$p+1);
						$subpath = substr($m[2],0,$p+1);
					}else{
						$className = $m[2];
						$subpath ='';
					}
					$path = $config->_modulesPathList[$m[1]].'classes/'.$subpath.$className.'.class.php';
					if(!file_exists($path) || strpos($subpath,'..') !== false){
						throw new Exception('Error in config files, loadClasses, bad class selector: '.$sel);
					}
					$config->sessions['_class_to_load'][] = $path;
				}
				else
					throw new Exception('Error in config files, loadClasses, bad class selector: '.$sel);
			}
		}
	}
	static protected function _loadPathList($list, $forbiddenList, &$allBasePath){
		$list = split(' *, *',$list);
		array_unshift($list, JELIX_LIB_PATH.'core-modules/');
		$result=array();
		foreach($list as $k=>$path){
			if(trim($path) == '') continue;
			$p = str_replace(array('lib:','app:'), array(LIB_PATH, JELIX_APP_PATH), $path);
			if(!file_exists($p)){
				trigger_error('The path, '.$path.' given in the jelix config, doesn\'t exists !',E_USER_ERROR);
				exit;
			}
			if(substr($p,-1) !='/')
				$p.='/';
			if($k!=0)
				$allBasePath[]=$p;
			if($handle = opendir($p)){
				while(false !==($f = readdir($handle))){
					if($f{0} != '.' && is_dir($p.$f) && !in_array($f, $forbiddenList)){
						$result[$f]=$p.$f.'/';
					}
				}
				closedir($handle);
			}
		}
		return $result;
	}
	static protected function _loadPluginsPathList(&$config){
		$list = split(' *, *',$config->pluginsPath);
		array_unshift($list, JELIX_LIB_PATH.'plugins/');
		foreach($list as $k=>$path){
			if(trim($path) == '') continue;
			$p = str_replace(array('lib:','app:'), array(LIB_PATH, JELIX_APP_PATH), $path);
			if(!file_exists($p)){
				trigger_error('The path, '.$path.' given in the jelix config, doesn\'t exists !',E_USER_ERROR);
				exit;
			}
			if(substr($p,-1) !='/')
				$p.='/';
			if($handle = opendir($p)){
				while(false !==($f = readdir($handle))){
					if($f{0} != '.' && is_dir($p.$f)){
						if($subdir = opendir($p.$f)){
							if($k!=0)
							   $config->_allBasePath[]=$p.$f.'/';
							while(false !==($subf = readdir($subdir))){
								if($subf{0} != '.' && is_dir($p.$f.'/'.$subf)){
									if($f == 'tpl'){
										$prop = '_tplpluginsPathList_'.$subf;
										$config->{$prop}[] = $p.$f.'/'.$subf.'/';
									}else{
										$prop = '_pluginsPathList_'.$f;
										$config->{$prop}[$subf] = $p.$f.'/'.$subf.'/';
									}
								}
							}
							closedir($subdir);
						}
					}
				}
				closedir($handle);
			}
		}
	}
	static private function _findServerName($ext){
		$varname = '';
		$extlen = strlen($ext);
		if(strrpos($_SERVER['SCRIPT_NAME'], $ext) ===(strlen($_SERVER['SCRIPT_NAME']) - $extlen) || php_sapi_name() == 'cli'){
			return 'SCRIPT_NAME';
		}else if(isset($_SERVER['REDIRECT_URL']) && strrpos( $_SERVER['REDIRECT_URL'], $ext) ===(strlen( $_SERVER['REDIRECT_URL']) -$extlen)){
			return 'REDIRECT_URL';
		}else if(isset($_SERVER['ORIG_SCRIPT_NAME']) && strrpos( $_SERVER['ORIG_SCRIPT_NAME'], $ext) ===(strlen( $_SERVER['ORIG_SCRIPT_NAME']) - $extlen)){
			return 'ORIG_SCRIPT_NAME';
		}
		throw new Exception('Jelix Error: in config file the parameter urlengine:scriptNameServerVariable is empty and Jelix don\'t find
            the variable in $_SERVER which contains the script name. You must see phpinfo and setup this parameter in your config file.');
	}
	static private function _initResponsesPath(&$list){
		$copylist = $list;
		foreach($copylist as $type=>$class){
			if(file_exists($path=JELIX_LIB_CORE_PATH.'response/'.$class.'.class.php')){
				$list[$type.'.path']=$path;
			}elseif(file_exists($path=JELIX_APP_PATH.'responses/'.$class.'.class.php')){
				$list[$type.'.path']=$path;
			}else{
				throw new Exception('Jelix Config Error: the class file of the response type "'.$type.'" is not found ('.$path.')');
			}
		}
	}
	static private function _mergeConfig(&$array, $tomerge){
		foreach($tomerge as $k=>$v){
			if(!isset($array[$k])){
				$array[$k] = $v;
				continue;
			}
			if($k{1} == '_')
				continue;
			if(is_array($v)){
				$array[$k] = array_merge($array[$k], $v);
			}else{
				$array[$k] = $v;
			}
		}
	}
}
