<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package    jelix
* @subpackage db_driver
* @author     Laurent Jouanneau
* @contributor Loic Mathaud <loic@mathaud.net>
* @copyright  2007 Laurent Jouanneau 2008 Loic Mathaud
* @link      http://www.jelix.org
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/
class sqliteDaoBuilder extends jDaoGenerator{
	protected $propertiesListForInsert = 'PrimaryFieldsExcludeAutoIncrement';
	protected function genSelectPattern($pattern, $table, $fieldname, $propname){
		if($pattern =='%s'){
			$field = $table.$this->_encloseName($fieldname).' as '.$this->_encloseName($propname);
		}else{
			$field = str_replace(array("'", "%s"), array("\\'",$table.$this->_encloseName($fieldname)),$pattern).' as '.$this->_encloseName($propname);
		}
		return $field;
	}
}
