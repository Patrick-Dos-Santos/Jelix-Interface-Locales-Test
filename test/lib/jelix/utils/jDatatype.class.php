<?php
/* comments & extra-whitespaces have been removed by jBuildTools*/
/**
* @package     jelix
* @subpackage  utils
* @author      Laurent Jouanneau
* @contributor Julien Issler
* @copyright   2006-2008 Laurent Jouanneau
* @copyright   2008 Julien Issler
* @link        http://www.jelix.org
* @licence     http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/
interface jIFilteredDatatype{
	public function getFilteredValue();
}
abstract class jDatatype{
	protected $hasFacets= false;
	protected $facets = array();
	public function addFacet($type,$value=null){
		if(in_array($type, $this->facets)){
			$this->hasFacets = true;
			$this->_addFacet($type,$value);
		}
	}
	public function getFacet($type){
		if(in_array($type, $this->facets)){
			return $this->$type;
		}
		return null;
	}
	protected function _addFacet($type,$value){
		$this->$type = $value;
	}
	public function check($value){
		return true;
	}
}
class jDatatypeString extends jDatatype{
	protected $length=null;
	protected $minLength=null;
	protected $maxLength=null;
	protected $pattern=null;
	protected $facets = array('length','minLength','maxLength', 'pattern');
	public function check($value){
		if($this->hasFacets){
			$len = iconv_strlen($value, $GLOBALS['gJConfig']->charset);
			if($this->length !== null && $len != $this->length)
				return false;
			if($this->minLength !== null && $len < $this->minLength)
				return false;
			if($this->maxLength !== null && $len > $this->maxLength)
				return false;
			if($this->pattern !== null && !preg_match($this->pattern,$value))
				return false;
		}
		return true;
	}
}
class jDatatypeHtml extends jDatatype implements jIFilteredDatatype{
	protected $length=null;
	protected $minLength=null;
	protected $maxLength=null;
	protected $facets = array('length','minLength','maxLength');
	protected $newValue;
	public function check($value){
		if($this->hasFacets){
			$len = iconv_strlen($value, $GLOBALS['gJConfig']->charset);
			if($this->length !== null && $len != $this->length)
				return false;
			if($this->minLength !== null && $len < $this->minLength)
				return false;
			if($this->maxLength !== null && $len > $this->maxLength)
				return false;
		}
		$this->newValue = jFilter::cleanHtml($value);
		return is_string($this->newValue);
	}
	public function getFilteredValue(){
		return $this->newValue;
	}
}
class jDatatypeBoolean extends jDatatype{
	public function check($value){ return jFilter::isBool($value);}
}
class jDatatypeDecimal extends jDatatype{
	protected $maxValue=null;
	protected $minValue=null;
	protected $facets = array('maxValue', 'minValue');
	public function check($value){ return jFilter::isFloat($value, $this->minValue, $this->maxValue);}
	protected function _addFacet($type,$value){
		if($type == 'maxValue' || $type == 'minValue'){
			$this->$type = floatval($value);
		}
	}
}
class jDatatypeInteger extends jDatatypeDecimal{
	public function check($value){ return jFilter::isInt($value, $this->minValue, $this->maxValue);}
	protected function _addFacet($type,$value){
		if($type == 'maxValue' || $type == 'minValue'){
			$this->$type = intval($value);
		}
	}
}
class jDatatypeHexadecimal extends jDatatypeDecimal{
	public function check($value){
		if(substr($value,0,2) != '0x') $value='0x'.$value;
		return jFilter::isHexInt($value, $this->minValue, $this->maxValue);
	}
	protected function _addFacet($type,$value){
		if($type == 'maxValue' || $type == 'minValue'){
			$this->$type = intval($value,16);
		}
	}
}
class jDatatypeDateTime extends jDatatype{
	protected $facets = array('maxValue', 'minValue');
	protected $maxValue;
	protected $minValue;
	private $dt;
	protected $format=21;
	protected $_date_format = 'Y-m-d H:i:s';
	public function check($value){
		$this->dt = new jDateTime();
		if(!$this->dt->setFromString($value,$this->format)) return false;
		if($this->maxValue !== null){
			if($this->dt->compareTo($this->maxValue) == 1) return false;
		}
		if($this->minValue !== null){
			if($this->dt->compareTo($this->minValue) == -1) return false;
		}
		return true;
	}
	protected function _addFacet($type,$value){
		if($type == 'maxValue' || $type == 'minValue'){
			if(!preg_match('#^\d{4}-\d{2}-\d{2} (\d{2}:\d{2}(:\d{2})?)?$#',$value))
				$value = date($this->_date_format,strtotime($value));
			$this->$type = new jDateTime();
			$this->$type->setFromString($value,$this->format);
		}
		else
			parent::_addFacet($type,$value);
	}
	public function getFormat(){ return $this->format;}
}
class jDatatypeTime extends jDatatypeDateTime{
	protected $format=22;
}
class jDatatypeDate extends jDatatypeDateTime{
	protected $format=20;
	protected $_date_format = 'Y-m-d';
}
class jDatatypeLocaleDateTime extends jDatatypeDateTime{
	protected $format=11;
}
class jDatatypeLocaleDate extends jDatatypeDateTime{
	protected $format=10;
}
class jDatatypeLocaleTime extends jDatatypeDateTime{
	protected $format=12;
}
class jDatatypeUrl extends jDatatype{
	protected $schemeRequired=true;
	protected $hostRequired=true;
	protected $pathRequired=null;
	protected $queryRequired=null;
	protected $facets = array('schemeRequired','hostRequired','pathRequired', 'queryRequired');
	public function check($value){
		return jFilter::isUrl($value, $this->schemeRequired, $this->hostRequired, $this->pathRequired, $this->queryRequired);
	}
}
class jDatatypeIPv4 extends jDatatype{
	public function check($value){
		return jFilter::isIPv4($value);
	}
}
class jDatatypeIPv6 extends jDatatype{
	public function check($value){
		return jFilter::isIPv6($value);
	}
}
class jDatatypeEmail extends jDatatype{
	public function check($value){
		return jFilter::isEmail($value);
	}
}
