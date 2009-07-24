<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package     jelix
* @subpackage  core_response
* @author      Laurent Jouanneau
* @contributor Loic Mathaud (fix bug)
* @copyright   2005-2009 Laurent Jouanneau, 2007 Loic Mathaud
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
final class jResponseRedirectUrl extends jResponse{
	protected $_type = 'redirectUrl';
	public $url = '';
	public $temporary = true;
	public function toReferer($defaultUrl=''){
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != ''){
			$this->url = $_SERVER['HTTP_REFERER'];
			return true;
		}
		else{
			$this->url = $defaultUrl;
			return false;
		}
	}
	public function output(){
		if($this->url =='')
			throw new jException('jelix~errors.repredirect.empty.url');
		if($this->hasErrors())
			return false;
		if($this->temporary)
			$this->setHttpStatus(303, 'Redirection');
		else
			$this->setHttpStatus(301, 'Redirection');
		$this->sendHttpHeaders();
		header('location: '.$this->url);
		return true;
	}
	public function outputErrors(){
		 include_once(JELIX_LIB_CORE_PATH.'response/jResponseHtml.class.php');
		 $resp = new jResponseHtml();
		 $resp->outputErrors();
	}
}
