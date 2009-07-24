<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package     jelix
* @subpackage  core_response
* @author      Laurent Jouanneau
* @contributor
* @copyright   2006-2008 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
final class jResponseRdf extends jResponse{
	protected $_type = 'rdf';
	protected $_acceptSeveralErrors=true;
	public $data;
	public $template;
	public $resNs="http://dummy/rdf#";
	public $resNsPrefix='row';
	public $resUriPrefix = "urn:data:row:";
	public $resUriRoot = "urn:data:row";
	public $asAttribute=array();
	public $asElement=array();
	protected $prologSent=false;
	public function output(){
		if($this->hasErrors()) return false;
		$this->_httpHeaders['Content-Type']='text/xml;charset='.$GLOBALS['gJConfig']->charset;
		$this->sendHttpHeaders();
		echo '<?xml version="1.0" encoding="'.$GLOBALS['gJConfig']->charset.'"?>';
		$this->prologSent = true;
		if($this->template !=''){
			$tpl= new jTpl();
			$tpl->assign('data',$this->data);
			$tpl->display($this->template);
		}else{
			$this->generateContent();
		}
		return true;
	}
	protected function generateContent(){
		$EOL="\n";
		echo '<RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/1999/02/22-rdf-syntax-ns#"'.$EOL;
		echo '  xmlns:',$this->resNsPrefix,'="',$this->resNs,'"  xmlns:NC="http://home.netscape.com/NC-rdf#">',$EOL;
		echo '<Bag RDF:about="'.$this->resUriRoot.'">'.$EOL;
		foreach($this->data as $dt){
			echo "<li>\n<Description ";
			if(is_object($dt))
				$dt=get_object_vars($dt);
			if(count($this->asAttribute) || count($this->asElement)){
				foreach($this->asAttribute as $name){
					echo $this->resNsPrefix,':',$name,'="',htmlspecialchars($dt[$name]),'" ';
				}
				if(count($this->asElement)){
					echo ">\n";
					foreach($this->asElement as $name){
						echo '<',$this->resNsPrefix,':',$name,'>',htmlspecialchars($dt[$name]),'</',$this->resNsPrefix,':',$name,">\n";
					}
					echo "</Description>\n</li>\n";
				}else
					echo "/>\n</li>\n";
			}else{
				if(count($dt)){
					echo ">\n";
					foreach($dt as $name=>$val){
						echo '<',$this->resNsPrefix,':',$name,'>',htmlspecialchars($val),'</',$this->resNsPrefix,':',$name,">\n";
					}
					echo "</Description>\n</li>\n";
				}else{
					echo "/>\n</li>\n";
				}
			}
		}
		echo "</Bag>\n</RDF>\n";
	}
	public function outputErrors(){
		global $gJCoord;
		$EOL="\n";
		if(!$this->_httpHeadersSent){
			header("HTTP/1.0 500 Internal Server Error");
			header("Content-Type: text/xml;charset=".$GLOBALS['gJConfig']->charset);
		}
		if(!$this->prologSent){
			echo '<?xml version="1.0" encoding="ISO-8859-1"?>'.$EOL;
		}
		echo '<RDF xmlns:RDF="http://www.w3.org/1999/02/22-rdf-syntax-ns#"'.$EOL;
		echo '  xmlns:err="http://jelix.org/ns/rdferr#"  xmlns:NC="http://home.netscape.com/NC-rdf#">'.$EOL;
		echo '<Bag RDF:about="urn:jelix:error">'.$EOL;
		if(count($gJCoord->errorMessages)){
			foreach($gJCoord->errorMessages as $e){
				echo "<li>\n";
				echo '<Description err:code="'.$e[1].'" err:type="'.$e[0].'" err:file="'.$e[3].'" err:line="'.$e[4].'">';
				echo '<err:message>'.htmlspecialchars($e[2]).'</err:message>';
				echo "</Description>\n";
				echo "</li>\n";
			}
		}else{
			echo "<li>\n";
			echo '<Description err:code="-1" err:type="error" err:file="" err:line="">';
			echo '<err:message>Unknow error</err:message>';
			echo "</Description>\n";
			echo "</li>\n";
		}
		echo "</Bag>\n";
		echo "</RDF>\n";
	}
}
