<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package     jelix
* @subpackage  core_response
* @author      Laurent Jouanneau
* @contributor Yann (description and keywords), Dominique Papin
* @contributor Warren Seine, Alexis Métaireau, Julien Issler
* @copyright   2005-2009 Laurent Jouanneau, 2006 Yann, 2007 Dominique Papin
* @copyright   2008 Warren Seine, Alexis Métaireau
* @copyright   2009 Julien Issler
*              few lines of code are copyrighted CopixTeam http://www.copix.org
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
require_once(JELIX_LIB_PATH.'tpl/jTpl.class.php');
class jResponseHtml extends jResponse{
	protected $_type = 'html';
	public $title = '';
	public $favicon = '';
	public $body = null;
	public $bodyTpl = '';
	public $bodyErrorTpl = '';
	public $bodyTagAttributes= array();
	protected $_headSent = 0;
	protected $_charset;
	protected $_lang;
	protected $_CSSLink = array();
	protected $_CSSIELink = array();
	protected $_Styles  = array();
	protected $_JSLink  = array();
	protected $_JSIELink  = array();
	protected $_JSCode  = array();
	protected $_Others  = array();
	protected $_MetaKeywords = array();
	protected $_MetaDescription = array();
	protected $_Link = array();
	protected $_bodyTop = array();
	protected $_bodyBottom = array();
	protected $_isXhtml = true;
	protected $_endTag="/>\n";
	protected $_strictDoctype = true;
	public $xhtmlContentType = false;
	function __construct(){
		global $gJConfig;
		$this->_charset = $gJConfig->charset;
		$this->_lang = $gJConfig->locale;
		$this->body = new jTpl();
		parent::__construct();
	}
	final public function output(){
		$this->_headSent = 0;
		if($this->_isXhtml && $this->xhtmlContentType && strstr($_SERVER['HTTP_ACCEPT'],'application/xhtml+xml')){
			$this->_httpHeaders['Content-Type']='application/xhtml+xml;charset='.$this->_charset;
		}else{
			$this->_httpHeaders['Content-Type']='text/html;charset='.$this->_charset;
		}
		$this->sendHttpHeaders();
		$this->outputDoctype();
		$this->_headSent = 1;
		$this->doAfterActions();
		if($this->bodyTpl != '')
			$this->body->meta($this->bodyTpl);
		$this->outputHtmlHeader();
		echo '<body ';
		foreach($this->bodyTagAttributes as $attr=>$value){
			echo $attr,'="', htmlspecialchars($value),'" ';
		}
		echo ">\n";
		$this->_headSent = 2;
		echo implode("\n",$this->_bodyTop);
		if($this->bodyTpl != '')
			$this->body->display($this->bodyTpl);
		if($this->hasErrors()){
			if($GLOBALS['gJConfig']->error_handling['showInFirebug']){
				echo '<script type="text/javascript">if(console){';
				foreach( $GLOBALS['gJCoord']->errorMessages  as $e){
					switch($e[0]){
					  case 'warning':
						echo 'console.warn("[warning ';
						break;
					  case 'notice':
						echo 'console.info("[notice ';
						break;
					  case 'strict':
						echo 'console.info("[strict ';
						break;
					  case 'error':
						echo 'console.error("[error ';
						break;
					}
					echo $e[1],'] ',str_replace(array('"',"\n","\r","\t"),array('\"','\\n','\\r','\\t'),$e[2]),' (',str_replace('\\','\\\\',$e[3]),' ',$e[4],')");';
				}
				echo '}else{alert("there are some errors, you should activate Firebug to see them");}</script>';
			}else{
				echo '<div id="jelixerror" style="position:absolute;left:0px;top:0px;border:3px solid red; background-color:#f39999;color:black;">';
				echo $this->getFormatedErrorMsg();
				echo '<p><a href="#" onclick="document.getElementById(\'jelixerror\').style.display=\'none\';return false;">fermer</a></p></div>';
			}
		}
		echo implode("\n",$this->_bodyBottom);
		if(count($GLOBALS['gJCoord']->logMessages)){
			if(count($GLOBALS['gJCoord']->logMessages['response'])){
				echo '<ul id="jelixlog">';
				foreach($GLOBALS['gJCoord']->logMessages['response'] as $m){
					echo '<li>',htmlspecialchars($m),'</li>';
				}
				echo '</ul>';
			}
			if(count($GLOBALS['gJCoord']->logMessages['firebug'])){
				echo '<script type="text/javascript">if(console){';
				foreach($GLOBALS['gJCoord']->logMessages['firebug'] as $m){
					echo 'console.debug("',str_replace(array('"',"\n","\r","\t"),array('\"','\\n','\\r','\\t'),$m),'");';
				}
				echo '}else{alert("there are log messages, you should activate Firebug to see them");}</script>';
			}
		}
		echo '</body></html>';
		return true;
	}
	protected function doAfterActions(){
		$this->_commonProcess();
	}
	protected function _commonProcess(){
	}
	final public function outputErrors(){
		if($this->_headSent < 1){
			 if(!$this->_httpHeadersSent){
				header("HTTP/1.0 500 Internal Server Error");
				header('Content-Type: text/html;charset='.$this->_charset);
			 }
			echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">', "\n<html>";
		}
		if($this->_headSent < 2){
			echo '<head><title>Errors</title></head><body>';
		}
		if($this->hasErrors()){
			echo $this->getFormatedErrorMsg();
		}else{
			echo '<p style="color:#FF0000">Unknow Error</p>';
		}
		echo '</body></html>';
	}
	protected function getFormatedErrorMsg(){
		$errors='';
		foreach( $GLOBALS['gJCoord']->errorMessages  as $e){
		   $errors .=  '<p style="margin:0;"><b>['.$e[0].' '.$e[1].']</b> <span style="color:#FF0000">'.htmlspecialchars($e[2], ENT_NOQUOTES, $this->_charset)."</span> \t".$e[3]." \t".$e[4]."</p>\n";
		}
		return $errors;
	}
	function addContent($content, $beforeTpl = false){
	  if($beforeTpl){
		$this->_bodyTop[]=$content;
	  }else{
		 $this->_bodyBottom[]=$content;
	  }
	}
	final public function addLink($href, $rel, $type, $title=''){
		$this->_Link[$href] = array($rel, $type, $title);
	}
	final public function addJSLink($src, $params=array(), $forIE=false){
		if($forIE){
			if(!isset($this->_JSIELink[$src])){
				$this->_JSIELink[$src] = $params;
			}
		}else{
			if(!isset($this->_JSLink[$src])){
				$this->_JSLink[$src] = $params;
			}
		}
	}
	final public function addCSSLink($src, $params=array(), $forIE=false){
		if($forIE){
			if(!isset($this->_CSSIELink[$src])){
				if(!is_bool($forIE) && !empty($forIE))
					$params['_ieCondition'] = $forIE;
				$this->_CSSIELink[$src] = $params;
			}
		}else{
			if(!isset($this->_CSSLink[$src])){
				$this->_CSSLink[$src] = $params;
			}
		}
	}
	final public function addStyle($selector, $def=null){
		if(!isset($this->_Styles[$selector])){
			$this->_Styles[$selector] = $def;
		}
	}
	final public function addHeadContent($content){
		$this->_Others[] = $content;
	}
	final public function addJSCode($code){
		$this->_JSCode[] = $code;
	}
	final public function addMetaKeywords($content){
		$this->_MetaKeywords[] = $content;
	}
	final public function addMetaDescription($content){
		$this->_MetaDescription[] = $content;
	}
	protected function outputDoctype(){
		if($this->_isXhtml){
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 '.($this->_strictDoctype?'Strict':'Transitional').'//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-'.($this->_strictDoctype?'strict':'transitional').'.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="',$this->_lang,'" lang="',$this->_lang,'">
';
		}else{
			echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01'.($this->_strictDoctype?'':' Transitional').'//EN" "http://www.w3.org/TR/html4/'.($this->_strictDoctype?'strict':'loose').'.dtd">', "\n";
			echo '<html lang="',$this->_lang,'">';
		}
	}
	final protected function outputHtmlHeader(){
		echo '<head>'."\n";
		echo '<meta content="text/html; charset='.$this->_charset.'" http-equiv="content-type"'.$this->_endTag;
		echo '<title>'.htmlspecialchars($this->title)."</title>\n";
		if(!empty($this->_MetaDescription)){
			$description = implode(' ',$this->_MetaDescription);
			echo '<meta name="description" content="'.htmlspecialchars($description).'" '.$this->_endTag;
		}
		if(!empty($this->_MetaKeywords)){
			$keywords = implode(',',$this->_MetaKeywords);
			echo '<meta name="keywords" content="'.htmlspecialchars($keywords).'" '.$this->_endTag;
		}
		foreach($this->_CSSLink as $src=>$params){
			$more = '';
			foreach($params as $param_name=>$param_value){
				$more .= $param_name.'="'. htmlspecialchars($param_value).'" ';
			}
			if(!isset($params['rel']))
				$more .='rel="stylesheet" ';
			echo  '<link type="text/css" href="',htmlspecialchars($src),'" ',$more,$this->_endTag;
		}
		foreach($this->_CSSIELink as $src=>$params){
			if(!isset($params['_ieCondition']))
			  $params['_ieCondition'] = 'IE' ;
			echo '<!--[if '.$params['_ieCondition'].' ]>';
			$more = '';
			foreach($params as $param_name=>$param_value){
				if($param_name=='_ieCondition')
				  continue ;
				$more .= $param_name.'="'. htmlspecialchars($param_value).'" ';
			}
			if(!isset($params['rel']))
				$more .='rel="stylesheet" ';
			echo  '<link type="text/css" href="',htmlspecialchars($src),'" ',$more,$this->_endTag;
			echo '<![endif]-->';
		}
		if($this->favicon != ''){
			$fav = htmlspecialchars($this->favicon);
			echo '<link rel="icon" type="image/x-icon" href="',$fav,'" ',$this->_endTag;
			echo '<link rel="shortcut icon" type="image/x-icon" href="',$fav,'" ',$this->_endTag;
		}
		foreach($this->_Link as $href=>$params){
			$more = '';
			if(!empty($params[2]))
				$more = 'title = "'.htmlspecialchars($params[2]).'"';
			echo '<link rel="',$params[0],'" type="',$params[1],'" href="',htmlspecialchars($href),'" ',$more,$this->_endTag;
		}
		foreach($this->_JSLink as $src=>$params){
			$more = '';
			foreach($params as $param_name=>$param_value){
				$more .= $param_name.'="'. htmlspecialchars($param_value).'" ';
			}
			echo '<script type="text/javascript" src="',htmlspecialchars($src),'" ',$more,'></script>',"\n";
		}
		if(count($this->_JSIELink)){
			echo '<!--[if IE]>';
			foreach($this->_JSIELink as $src=>$params){
				$more = '';
				foreach($params as $param_name=>$param_value){
					$more .= $param_name.'="'. htmlspecialchars($param_value).'" ';
				}
				echo '<script type="text/javascript" src="',htmlspecialchars($src),'" ',$more,'></script>',"\n";
			}
			echo '<![endif]-->';
		}
		if(count($this->_Styles)){
			echo '<style type="text/css">
            ';
			foreach($this->_Styles as $selector=>$value){
				if(strlen($value)){
					echo $selector.' {'.$value."}\n";
				}else{
					echo $selector, "\n";
				}
			}
			echo "\n </style>\n";
		}
		if(count($this->_JSCode)){
			echo '<script type="text/javascript">
// <![CDATA[
 '.implode("\n", $this->_JSCode).'
// ]]>
</script>';
		}
		echo implode("\n", $this->_Others), '</head>';
	}
	final public function clearHtmlHeader($what=null){
		$cleanable = array('CSSLink', 'CSSIELink', 'Styles', 'JSLink','JSIELink', 'JSCode', 'Others','MetaKeywords','MetaDescription');
		if($what==null)
			$what= $cleanable;
		foreach($what as $elem){
			if(in_array($elem, $cleanable)){
				$name = '_'.$elem;
				$this->$name = array();
			}
		}
	}
	final public function setXhtmlOutput($xhtml = true){
		$this->_isXhtml = $xhtml;
		if($xhtml)
			$this->_endTag = "/>\n";
		else
			$this->_endTag = ">\n";
	}
	final public function strictDoctype($val = true){
		$this->_strictDoctype = $val;
	}
	final public function isXhtml(){ return $this->_isXhtml;}
	final public function endTag(){ return $this->_endTag;}
}
