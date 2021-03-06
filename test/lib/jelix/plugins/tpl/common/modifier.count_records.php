<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
 * Plugin to display count of a DbResultSet Object (how many records)
 * @package    jelix
 * @subpackage jtpl_plugin
 * @author     dandelionmood
 * @copyright  2007 dandelionmood
 * @link http://jelix.org/
 * @licence    GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
 */
function jtpl_modifier_common_count_records($DbResultSet)
{
	return $DbResultSet->rowCount();
}
