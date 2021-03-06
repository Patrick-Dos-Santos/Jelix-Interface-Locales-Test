<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package      jelix
* @subpackage   jtpl_plugin
* @author       Julien Issler
* @contributor
* @copyright    2008 Julien Issler
* @link         http://www.jelix.org
* @licence      GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
function jtpl_function_text_formdatafull($tpl, $form){
	foreach($form->getControls() as $ctrlref=>$ctrl){
		if($ctrl->type == 'submit' || $ctrl->type == 'reset' || $ctrl->type == 'hidden' || $ctrl->type == 'captcha') continue;
		if(!$form->isActivated($ctrlref)) continue;
		echo $ctrl->label,' : ';
		$value = $ctrl->getDisplayValue($form->getData($ctrlref));
		if(is_array($value))
			echo join(',',$value);
		else if($ctrl->datatype instanceof jDatatypeHtml)
			echo strip_tags($value);
		else
			echo $value;
		echo "\n\n";
	}
}
