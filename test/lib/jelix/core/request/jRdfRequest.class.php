<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package     jelix
* @subpackage  core_request
* @author      Laurent Jouanneau
* @contributor
* @copyright   2006-2008 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
class jRdfRequest extends jRequest{
	public $type = 'rdf';
	public $defaultResponseType = 'rdf';
	protected function _initParams(){
		$url  = jUrl::parseFromRequest($this, $_GET);
		$this->params = array_merge($url->params, $_POST);
	}
	public function isAllowedResponse($respclass){
		return('jResponseRdf' == $respclass);
	}
}
