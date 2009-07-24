<?php
class testLocalesInterfaceReader extends UnitTestCase {
	
	public function testModuletest1En() {
	    
	    $localesInterfaceTester = jClasses::createInstance('test~localesInterfaceTester');
		$localesInterfaceTester->createLocaleFiles();
		
		$files_path = $localesInterfaceTester->getLocalesPath('moduletest1', 'en_EN');
	    $files_content = $localesInterfaceTester->getModuleTest1EnContent();
	    
		foreach ($files_content as $file=>$expected_content) {
		    $path = $files_path.$file;
		    $result = jFile::read($path);
		    $this->assertIdentical($expected_content, $result);
		}
	}
	
    public function testModuletest1Fr() {
	    
	    $localesInterfaceTester = jClasses::createInstance('test~localesInterfaceTester');
		$localesInterfaceTester->createLocaleFiles();
		
		$files_path = $localesInterfaceTester->getLocalesPath('moduletest1', 'fr_FR');
	    $files_content = $localesInterfaceTester->getModuleTest1FrContent();
	    
		foreach ($files_content as $file=>$expected_content) {
		    $path = $files_path.$file;
		    $result = jFile::read($path);
		    $this->assertIdentical($expected_content, $result);
		}
	}
	
    public function testModuletest1Es() {
	    
	    $localesInterfaceTester = jClasses::createInstance('test~localesInterfaceTester');
		$localesInterfaceTester->createLocaleFiles();
		
		$files_path = $localesInterfaceTester->getLocalesPath('moduletest1', 'es_ES');
	    $files_content = $localesInterfaceTester->getModuleTest1EsContent();
	    
		foreach ($files_content as $file=>$expected_content) {
		    $path = $files_path.$file;
		    $result = jFile::read($path);
		    $this->assertIdentical($expected_content, $result);
		}
	}
	
    public function testModuletest2En() {
	    
	    $localesInterfaceTester = jClasses::createInstance('test~localesInterfaceTester');
		$localesInterfaceTester->createLocaleFiles();
		
		$files_path = $localesInterfaceTester->getLocalesPath('moduletest1', 'en_EN');
	    $files_content = $localesInterfaceTester->getModuleTest1EnContent();
	    
		foreach ($files_content as $file=>$expected_content) {
		    $path = $files_path.$file;
		    $result = jFile::read($path);
		    $this->assertIdentical($expected_content, $result);
		}
	}
	
    public function testModuletest2Es() {
	    
	    $localesInterfaceTester = jClasses::createInstance('test~localesInterfaceTester');
		$localesInterfaceTester->createLocaleFiles();
		
		$files_path = $localesInterfaceTester->getLocalesPath('moduletest1', 'es_ES');
	    $files_content = $localesInterfaceTester->getModuleTest1EsContent();
	    
		foreach ($files_content as $file=>$expected_content) {
		    $path = $files_path.$file;
		    $result = jFile::read($path);
		    $this->assertIdentical($expected_content, $result);
		}
	}
	
    public function testModuletest2Fr() {
	    
	    $localesInterfaceTester = jClasses::createInstance('test~localesInterfaceTester');
		$localesInterfaceTester->createLocaleFiles();
		
		$files_path = $localesInterfaceTester->getLocalesPath('moduletest1', 'fr_FR');
	    $files_content = $localesInterfaceTester->getModuleTest1FrContent();
	    
		foreach ($files_content as $file=>$expected_content) {
		    $path = $files_path.$file;
		    $result = jFile::read($path);
		    $this->assertIdentical($expected_content, $result);
		}
	}
}