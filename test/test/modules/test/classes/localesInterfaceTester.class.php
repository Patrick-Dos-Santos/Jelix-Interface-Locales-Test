<?php
class localesInterfaceTester {
   
    
    public function getLocalesFiles() {

        $localesFiles = array();
        
        array_push($localesFiles, $this->createLocale('moduletest1', 'en_EN', 'locale_file.1.UTF-8.properties'));
        return $localesFiles;
       
    }
    
    private function createLocale($module, $locale, $locale_file_name) {
	    
        $content = localesFileManager::getFileContent($module, $locale, $locale_file_name);
        
	    $locale_file = jClasses::createInstance('locales~localesFile');
	    $locale_file->name = $locale_file_name;
		$locale_file->module = $module;
		$locale_file->locale = $locale;
		$locale_file->content = $content;
		
		return $locale_file;
	}
	
    public function getLocaleAttributesValues() {
	    $values = array();
	    
	    $values['0en_EN'] = 'value0';
	    $values['1en_EN'] = 'value1.value1.value2';
	    $values['2en_EN'] = 'somevalue';
	    $values['3en_EN'] = ' value3 value3 value3';
	    $values['4en_EN'] = "param4=param4=value4";
	    $values['5en_EN'] = '&amp;é~&quot;#{([-|èè_\ç^à@)]=}+*µ£$øIï])}';
	    $values['6en_EN'] = 'onevalue';
	    $values['6fr_FR'] = 'othervalue';
	    $values['7fr_FR'] = '';
	    $values['8fr_FR'] = '';
	    $values['9fr_FR'] = 'somevalue';
	    $values['10fr_FR'] = '';
	    $values['11fr_FR'] = 'param4=param4=';
	    $values['12fr_FR'] = '';
	    $values['13en_EN'] = 'value';

		return $values;
	}
	
	public function getLocaleAttributesName() {
	    $names = array();
	    
	    $names[0] = 'param0';
	    $names[1] = 'param1.param1.param1';
	    $names[2] = '"param2"';
	    $names[3] = 'param3 param3 param3 ';
	    $names[4] = 'param4';
	    $names[5] = 'param5';
	    $names[6] = 'oneparam';
	    $names[7] = 'param0';
	    $names[8] = 'param1.param1.param1';
	    $names[9] = '"param2"';
	    $names[10] = 'param3 param3 param3 ';
	    $names[11] = 'param4';
	    $names[12] = 'param5';
	    $names[13] = 'param';
		return $names;
	}
	
	public function getExpectedSession() {
	    $expectedSession = array();
	    
	    $expectedSession['id0'] = array('param0','moduletest1','multi.params.UTF-8.properties');
	    $expectedSession['id1'] = array('param1.param1.param1','moduletest1','multi.params.UTF-8.properties');
	    $expectedSession['id2'] = array('"param2"','moduletest1','multi.params.UTF-8.properties');
	    $expectedSession['id3'] = array('param3 param3 param3 ','moduletest1','multi.params.UTF-8.properties');
	    $expectedSession['id4'] = array('param4','moduletest1','multi.params.UTF-8.properties');
	    $expectedSession['id5'] = array('param5','moduletest1','multi.params.UTF-8.properties');
	    $expectedSession['id6'] = array('oneparam','moduletest1','one param locale file.UTF-8.properties');
	    $expectedSession['id7'] = array('param0','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $expectedSession['id8'] = array('param1.param1.param1','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $expectedSession['id9'] = array('"param2"','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $expectedSession['id10'] = array('param3 param3 param3 ','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $expectedSession['id11'] = array('param4','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $expectedSession['id12'] = array('param5','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $expectedSession['id13'] = array('param','moduletest2','localefileinen.UTF-8.properties');
	    
	    return $expectedSession;
	}
	
    public function createLocaleFiles() {
		$test_locales_manager = jClasses::createInstance('test~localesInterfaceTester');
		$locales_interface_reader = jClasses::createInstance('locales~localesInterfaceReader');
        $this->storeInSession();
		$params = $this->getParams();
        $locales_interface_reader->createLocaleFiles($params);   
	}
	
	private function getParams() {
	    $params['useless'] = 'useless';
	    $params['useless2:useless2'] = 'useless';
	    
	    $params['0::en_EN'] = '0en';
	    $params['1::en_EN'] = '1en';
	    $params['2::en_EN'] = '2en';
	    $params['3::en_EN'] = '3en';
	    $params['4::en_EN'] = '4en';
	    $params['5::en_EN'] = '5en';
	    $params['6::en_EN'] = '6en';
	    $params['7::en_EN'] = '7en';
	    $params['8::en_EN'] = '8en';
	    $params['9::en_EN'] = '9en';
	    $params['10::en_EN'] = '10en';
	    $params['11::en_EN'] = '11en';
	    $params['12::en_EN'] = '12en';
	    $params['13::en_EN'] = '13en';
	    
	    $params['0::fr_FR'] = '';
	    $params['1::fr_FR'] = '1en';
	    $params['2::fr_FR'] = '2fr';
	    $params['3::fr_FR'] = '3fr';
	    $params['4::fr_FR'] = '4fr';
	    $params['5::fr_FR'] = '5fr';
	    $params['6::fr_FR'] = '6fr';
	    $params['7::fr_FR'] = '7fr';
	    $params['8::fr_FR'] = '8fr';
	    $params['9::fr_FR'] = '9fr';
	    $params['10::fr_FR'] = '10fr';
	    $params['11::fr_FR'] = '11fr';
	    $params['12::fr_FR'] = '12fr';
	    $params['13::fr_FR'] = '13fr';
	    
	    $params['0::es_ES'] = '0es';
	    $params['1::es_ES'] = '1es';
	    $params['2::es_ES'] = '2es';
	    $params['3::es_ES'] = '3es';
	    $params['4::es_ES'] = '4es';
	    $params['5::es_ES'] = '5es';
	    $params['6::es_ES'] = '6es';
	    $params['7::es_ES'] = '7es';
	    $params['8::es_ES'] = '8es';
	    $params['9::es_ES'] = '9es';
	    $params['10::es_ES'] = '10es';
	    $params['11::es_ES'] = '11es';
	    $params['12::es_ES'] = '12es';
	    $params['13::es_ES'] = '13es';
	    
	    return $params;
	}
	
    private function storeInSession() {	    
	    $_SESSION['id0'] = array('param0','moduletest1','multi.params.UTF-8.properties');
	    $_SESSION['id1'] = array('param1.param1.param1','moduletest1','multi.params.UTF-8.properties');
	    $_SESSION['id2'] = array('"param2"','moduletest1','multi.params.UTF-8.properties');
	    $_SESSION['id3'] = array('param3 param3 param3 ','moduletest1','multi.params.UTF-8.properties');
	    $_SESSION['id4'] = array('param4','moduletest1','multi.params.UTF-8.properties');
	    $_SESSION['id5'] = array('param5','moduletest1','multi.params.UTF-8.properties');
	    $_SESSION['id6'] = array('oneparam','moduletest1','one param locale file.UTF-8.properties');
	    $_SESSION['id7'] = array('param0','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $_SESSION['id8'] = array('param1.param1.param1','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $_SESSION['id9'] = array('"param2"','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $_SESSION['id10'] = array('param3 param3 param3 ','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $_SESSION['id11'] = array('param4','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $_SESSION['id12'] = array('param5','moduletest1','sameparamsdifferentfile.UTF-8.properties');
	    $_SESSION['id13'] = array('param','moduletest2','localefileinen.UTF-8.properties');
	}
	
	public function getLocalesPath($module, $locale) {
	    return JELIX_APP_PATH.'/modules/'.$module.'/locales/'.$locale.'/';
	}
	    
	public function getModuleTest1EnContent() {
	    
	    $content['emptylocalefile.UTF-8.properties'] = "\n";
	    $content['multi.params.UTF-8.properties']            =  "param0=0en\n"
	    											           ."param1.param1.param1=1en\n"
	    											           ."\"param2\"=2en\n"
	    											           ."param3 param3 param3 =3en\n"
	    												       ."param4=4en\n"
	    												       ."param5=5en";
	    												       
	    $content['one param locale file.UTF-8.properties']   =   "oneparam=6en";
	    
	    $content['sameparamsdifferentfile.UTF-8.properties'] =   "param0=7en\n"
	    														."param1.param1.param1=8en\n"
	    														."\"param2\"=9en\n"
	    														."param3 param3 param3 =10en\n"
	    														."param4=11en\n"
	    														."param5=12en";
	    
	    return $content;
	}
	
    public function getModuleTest1EsContent() {
	    
	    $content['multi.params.UTF-8.properties']            =  "param0=0es\n"
	    											           ."param1.param1.param1=1es\n"
	    											           ."\"param2\"=2es\n"
	    											           ."param3 param3 param3 =3es\n"
	    												       ."param4=4es\n"
	    												       ."param5=5es";
	    												       
	    $content['one param locale file.UTF-8.properties']   =   "oneparam=6es";
	    
	    $content['sameparamsdifferentfile.UTF-8.properties'] =   "param0=7es\n"
	    														."param1.param1.param1=8es\n"
	    														."\"param2\"=9es\n"
	    														."param3 param3 param3 =10es\n"
	    														."param4=11es\n"
	    														."param5=12es";
	    
	    return $content;
	}
	
    public function getModuleTest1FrContent() {
        	    
	    $content['multi.params.UTF-8.properties']            =  "param0=\n"
	    											           ."param1.param1.param1=1en\n"
	    											           ."\"param2\"=2fr\n"
	    											           ."param3 param3 param3 =3fr\n"
	    												       ."param4=4fr\n"
	    												       ."param5=5fr";
	    												       
	    $content['one param locale file.UTF-8.properties']   =   "oneparam=6fr";
	    
	    $content['sameparamsdifferentfile.UTF-8.properties'] =   "param0=7fr\n"
	    														."param1.param1.param1=8fr\n"
	    														."\"param2\"=9fr\n"
	    														."param3 param3 param3 =10fr\n"
	    														."param4=11fr\n"
	    														."param5=12fr";
	    
	    return $content;
	}
	
    public function getModuleTest2EnContent() {
	    $moduletest2_files['localefileinen.UTF-8.properties'] = 'param=13en';
	}
	
     public function getModuleTest2EsContent() {
	    $moduletest2_files['localefileinen.UTF-8.properties'] = 'param=13es';
	}
	
     public function getModuleTest2FrContent() {
	    $moduletest2_files['localefileinen.UTF-8.properties'] = 'param=13fr';
	}
		
}