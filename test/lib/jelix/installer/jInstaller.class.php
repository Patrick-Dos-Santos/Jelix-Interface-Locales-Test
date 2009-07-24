<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/

/**
* @package     jelix
* @subpackage  installer
* @author      Laurent Jouanneau
* @contributor 
* @copyright   2008 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
class jInstaller{
	static function getApplication(){
	}
	static function installPackage($packageFileName){
	}
	static function install($list){
	}
	static function uninstall($list){
	}
	const STATUS_INSTALLED = 1;
	const STATUS_UNINSTALLED = 2;
	const STATUS_ACTIVATED = 4;
	const STATUS_DEACTIVATED = 8;
	const STATUS_ALL = 0;
	static function getModulesList($status = 0){
	}
	static function getModuleById($id){
	}
	static function getModule($name){
	}
	static function getPluginsList(){
	}
	static function getPluginById($id){
	}
	static function getPlugin($name){
	}
}
