<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package    jelix
* @subpackage jtpl_plugin
* @author     Aubanel MONNIER
* @copyright  2007 Aubanel MONNIER
* @link       http://www.jelix.org
* @licence    GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/
function jtpl_modifier_ltx2pdf_latex($string)
{
	return str_replace(array('#','$','%','^','&','_','{','}','~'), array('\\#','\\$','\\%','\\^','\\&','\\_','\\{','\\}','\\~'), str_replace('\\','\\textbackslash',$string));
}
