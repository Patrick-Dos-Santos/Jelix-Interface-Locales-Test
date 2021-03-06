<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
 * @package     jelix
 * @subpackage  jtpl_plugin
 * @author      Thibault PIRONT < nuKs >
 * @copyright   2007 Thibault PIRONT
 * @link        http://jelix.org/
 * @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
 */
function jtpl_function_common_counter_reset($tpl, $name = ''){
	if( empty($name) && $name !== '0'){
		$name = 'default';
	}
	if(!isset($tpl->_privateVars['counterArray']))
		return;
	if( !isset($tpl->_privateVars['counterArray'][$name]))
		return;
	$tpl->_privateVars['counterArray'][$name] = array( 'type' => '0', 'start' => 1, 'incr' => 1);
}
