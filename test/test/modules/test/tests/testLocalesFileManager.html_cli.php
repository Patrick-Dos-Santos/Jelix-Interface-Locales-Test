<?php
jClasses::inc("locales~localesFileManager");

class localesLocalesFileManager extends UnitTestCase {
    
    function testListLocalesDirectories() {
        $module = 'moduletest1';
        $expected = array('en_EN', 'fr_FR');
        $result = localesFileManager::listLocalesDirectories($module);
        
        $this->assertIdentical($expected, $result);
	}
	
	function testWrongModuleListLocalesDirectories() {
	    $module = 'nonexisting';
	    $expected = array();
	    $result = localesFileManager::listLocalesDirectories($module);
        
        $this->assertIdentical($expected, $result);
	}
	
	function testGetLocalesFromConf() {
	    $expected = array('en_EN', 'fr_FR', 'es_ES');
	    $result = localesFileManager::getLocalesFromConf();
	    $this->assertIdentical($expected, $result);
	}
	
	function testIdenticalListModules() {
	    $expected = array('moduletest1', 'moduletest2', 'test');
	    $result = localesFileManager::listModules();
	    $this->assertIdentical($expected, $result);
	}
	
	function testWrongModuleListLocalesFiles() {
	    $module = 'nonexisting';
	    $locale = 'en_EN';
	    
	    $expected = array();
	    $result = localesFileManager::listLocalesFiles($module, $locale);
	    $this->assertIdentical($expected, $result);
	}
	
    function testWrongLocaleListLocalesFiles() {
	    $module = 'moduletest1';
	    $locale = 'nonexisting';
	    
	    $expected = array();
	    $result = localesFileManager::listLocalesFiles($module, $locale);
	    $this->assertIdentical($expected, $result);
	}
	
    function testIdenticalListLocalesFiles() {
	    $module = 'moduletest1';
	    $locale = 'en_EN';
	    
	    $expected = array('emptylocalefile.UTF-8.properties', 
	    					'multi.params.UTF-8.properties', 
	    					'one param locale file.UTF-8.properties');
	    $result = localesFileManager::listLocalesFiles($module, $locale);
	    $this->assertIdentical($expected, $result);
	}
	
	function testEmptyListLocalesFiles() {
	    $module = 'test';
	    $locale = 'fr_FR';
	    
	    $expected = array();
	    $result = localesFileManager::listLocalesFiles($module, $locale);
	    $this->assertIdentical($expected, $result);
	}
	
	function testWrongModuleGetFileContent() {
	    $module = 'nonexisting';
	    $locale = 'en_EN';
	    $file = 'multi.params.UTF-8.properties';
	    
	    $expected = '';
	    $result = localesFileManager::getFileContent($module, $locale, $file);
	    $this->assertIdentical($expected, $result);
	}
	
    function testWrongLocaleGetFileContent() {
	    $module = 'moduletest1';
	    $locale = 'nonexisting';
	    $file = 'alocalefile.UTF-8.properties';
	    
	    $expected = '';
	    $result = localesFileManager::getFileContent($module, $locale, $file);
	    $this->assertIdentical($expected, $result);
	}
	
    function testWrongFileGetFileContent() {
	    $module = 'moduletest1';
	    $locale = 'en_EN';
	    $file = 'nonexisting';
	    
	    $expected = '';
	    $result = localesFileManager::getFileContent($module, $locale, $file);
	    $this->assertIdentical($expected, $result);
	}
	
	function testIdenticalGetFileContent() {
	    $module = 'moduletest1';
	    $locale = 'en_EN';
	    $file = 'multi.params.UTF-8.properties';
	    //TODO tester avec des multi lignes
	    $expected = "param0=value0"."\n".
                    "param1.param1.param1=value1.value1.value2"."\n".
					"\"param2\"=somevalue"."\n".
                    "param3 param3 param3 = value3 value3 value3"."\n".
                    "param4=param4=param4=value4"."\n".
	                "param5=&é~\"#{([-|èè_\ç^à@)]=}+*µ£\$øIï])}"."\n";
	    $result = localesFileManager::getFileContent($module, $locale, $file);
	    $this->assertIdentical($expected, $result);
	}

    function testEmptyGetFileContent() {
	    $module = 'moduletest1';
	    $locale = 'en_EN';
	    $file = 'locale. file_".UTF-8.properties';
	    
	    $expected = "";
	    $result = localesFileManager::getFileContent($module, $locale, $file);
	    $this->assertIdentical($expected, $result);
	}
	
	function testIdenticalGetLocalesFileDirectory() {
	    $module = 'module';
	    $locale = 'locale';
	    
	    $expected = JELIX_APP_PATH.'modules/module/locales/locale/';
	    
	    $result = localesFileManager::getLocaleFileDirectory($module, $locale);
	    $this->assertIdentical($expected, $result);
	}
	
	function testGetModuleDirectory() {
	    $expected = JELIX_APP_PATH.'modules/';
	    $result = localesFileManager::getModuleDirectory();
	    $this->assertIdentical($expected, $result);
	}	
}