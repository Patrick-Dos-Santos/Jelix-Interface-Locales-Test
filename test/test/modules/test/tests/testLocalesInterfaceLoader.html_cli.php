<?php
class testLocalesInterfaceLoader extends UnitTestCase {

    
    function testEmptyLocaleManager() {
        $locales_manager = jClasses::createInstance('locales~localesInterfaceLoader');
        
        $expectedLocaleAttributesValue = array();
        $expectedLocaleAttributesName = array();
        
        $resultLocaleAttributesName = $locales_manager->getLocaleAttributesName();
        $resultLocaleAttributesValue = $locales_manager->getLocaleAttributesValues();

        $this->assertIdentical($expectedLocaleAttributesValue, $resultLocaleAttributesValue);
        $this->assertIdentical($expectedLocaleAttributesName, $resultLocaleAttributesName);
    }
    
    function testInitLocaleManager() {
        $test_locales_manager = jClasses::createInstance('test~localesInterfaceTester');
        $locales_manager = jClasses::createInstance('locales~localesInterfaceLoader');
        
        $locales_manager->initLocaleManager();

        $expectedLocaleAttributesValue = $test_locales_manager->getLocaleAttributesValues();
        $expectedLocaleAttributesName = $test_locales_manager->getLocaleAttributesName();
        
        
        $resultLocaleAttributesValue = $locales_manager->getLocaleAttributesValues();
        $resultLocaleAttributesName = $locales_manager->getLocaleAttributesName();
        
        $this->assertIdentical($expectedLocaleAttributesValue, $resultLocaleAttributesValue);
        $this->assertIdentical($expectedLocaleAttributesName, $resultLocaleAttributesName);
    }
    
    function testSession() {
       $test_locales_manager = jClasses::createInstance('test~localesInterfaceTester');
       $locales_manager = jClasses::createInstance('locales~localesInterfaceLoader');
        
       $locales_manager->initLocaleManager();
       $expectedSession = $test_locales_manager->getExpectedSession();
       
       foreach($expectedSession as $key=>$value) {
           $this->assertIdentical($value, $_SESSION[$key]);
       }
    }
    
}