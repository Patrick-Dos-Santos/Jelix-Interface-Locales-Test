<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
 * Plugin from smarty project and adapted for jtpl
 * @package    jelix
 * @subpackage jtpl_plugin
 * @author        Smarty team
 * @contributor   Yannick Le Guédart <yannick at over-blog dot com>
 * @copyright  2001-2003 ispi of Lincoln, Inc., Yannick Le Guédart
 * @link http://smarty.php.net/
 * @link http://jelix.org/
 * @licence    GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
 */
function jtpl_modifier_common_date_format( $string, $format="%b %e, %Y",
									$default_date=null){
	if(substr(PHP_OS,0,3) == 'WIN'){
		$_win_from = array('%e',  '%T',	   '%D');
		$_win_to   = array('%#d', '%H:%M:%S', '%m/%d/%y');
		$format	= str_replace($_win_from, $_win_to, $format);
	}
	if($string != ''){
		return strftime($format, strtotime($string));
	} elseif(isset($default_date) && $default_date != ''){
		return strftime($format, strtotime($default_date));
	} else{
		return '';
	}
}
