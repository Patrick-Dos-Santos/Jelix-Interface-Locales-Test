<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package     jelix
* @subpackage  forms
* @author      Laurent Jouanneau
* @contributor
* @copyright   2006-2009 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/
require_once(JELIX_LIB_PATH.'forms/jFormsBase.class.php');
class jForms{
	const ID_PARAM = '__forms_id__';
	const DEFAULT_ID = 0;
	const ERRDATA_INVALID = 1;
	const ERRDATA_REQUIRED = 2;
	private function __construct(){}
	public static function create($formSel, $formId=null){
		$sel = new jSelectorForm($formSel);
		jIncluder::inc($sel);
		$c = $sel->getClass();
		if($formId === null)
			$formId = self::DEFAULT_ID;
		$fid = is_array($formId) ? serialize($formId) : $formId;
		if(!isset($_SESSION['JFORMS'][$formSel][$fid])){
			$dc = $_SESSION['JFORMS'][$formSel][$fid]= new jFormsDataContainer($formSel, $formId);
			if($formId == self::DEFAULT_ID){
				$dc->refcount = 1;
			}
		}
		else{
			$dc = $_SESSION['JFORMS'][$formSel][$fid];
			if($formId == self::DEFAULT_ID)
				$dc->refcount++;
		}
		$form = new $c($sel->toString(), $dc, true);
		return $form;
	}
	static public function get($formSel, $formId=null){
		global $gJCoord;
		if($formId === null)
			$formId= self::DEFAULT_ID;
		$fid = is_array($formId) ? serialize($formId) : $formId;
		if(!isset($_SESSION['JFORMS'][$formSel][$fid])){
			return null;
		}
		$sel = new jSelectorForm($formSel);
		jIncluder::inc($sel);
		$c = $sel->getClass();
		$form = new $c($sel->toString(), $_SESSION['JFORMS'][$formSel][$fid],false);
		return $form;
	}
	static public function fill($formSel,$formId=null){
		$form = self::get($formSel,$formId);
		if($form)
			$form->initFromRequest();
		return $form;
	}
	static public function destroy($formSel, $formId=null){
		global $gJCoord;
		if($formId === null)  $formId = self::DEFAULT_ID;
		if(is_array($formId)) $formId = serialize($formId);
		if(isset($_SESSION['JFORMS'][$formSel][$formId])){
			if($formId == self::DEFAULT_ID){
				if((--$_SESSION['JFORMS'][$formSel][$formId]->refcount) > 0){
				  $_SESSION['JFORMS'][$formSel][$formId]->clear();
					return;
				}
			}
			unset($_SESSION['JFORMS'][$formSel][$formId]);
		}
	}
	static public function clean($formSel='', $life=86400){
		if(!isset($_SESSION['JFORMS'])) return;
		if($formSel==''){
			foreach($_SESSION['JFORMS'] as $sel=>$f){
				self::clean($sel, $life);
			}
		} else if(isset($_SESSION['JFORMS'][$formSel])){
			$t = time();
			foreach($_SESSION['JFORMS'][$formSel] as $id=>$cont){
				if($t-$cont->updatetime > $life)
					unset($_SESSION['JFORMS'][$formSel][$id]);
			}
		}
	}
}
