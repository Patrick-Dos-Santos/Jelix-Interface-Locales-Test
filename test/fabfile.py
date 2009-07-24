# coding=utf-8

config.test_locales_path="test/modules/test/locales"
config.test1_locales_path="test/modules/moduletest1/locales"
config.test2_locales_path="test/modules/moduletest2/locales"

config.fr="fr_FR"
config.en="en_EN"

def cleantest():    
    # remove all locales folders
    local("rm -rf ./$(test_locales_path)/*")
    local("rm -rf ./$(test1_locales_path)/*")
    local("rm -rf ./$(test2_locales_path)/*")
    
    # create all the locales directories
    local("mkdir ./$(test1_locales_path)/$(en)")
    local("mkdir ./$(test1_locales_path)/$(fr)")
    local("mkdir ./$(test2_locales_path)/$(en)")
    local("chmod -R 777 ./$(test1_locales_path)/$(en)")
    local("chmod -R 777 ./$(test1_locales_path)/$(fr)")
    local("chmod -R 777 ./$(test2_locales_path)/$(en)")
    
    local("echo >> ./$(test1_locales_path)/$(en)/emptylocalefile.UTF-8.properties_temp")
    
    local("echo 'param0=value0' >>./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    local("echo 'param1.param1.param1=value1.value1.value2' >>./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    local("echo '\"param2\"=somevalue' >>./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    local("echo 'param3 param3 param3 = value3 value3 value3' >>./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    local("echo 'param4=param4=param4=value4' >>./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    local("echo 'param5=&é~\"#{([-|èè_\ç^à@)]=}+*µ£$øIï])}' >>./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    
    
    local("echo 'oneparam=onevalue' >>./$(test1_locales_path)/$(en)/one\ param\ \"locale\"\ file.UTF-8.properties_temp")
    local("echo 'oneparam=othervalue' >>./$(test1_locales_path)/$(fr)/one\ param\ \"locale\"\ file.UTF-8.properties_temp")
    
    local("echo 'param0=' >>./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    local("echo 'param1.param1.param1=' >>./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    local("echo '\"param2\"=somevalue' >>./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    local("echo 'param3 param3 param3' = >>./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    local("echo 'param4=param4=param4=' >>./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    local("echo 'param5=' >>./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    
    local("echo param=value >./$(test2_locales_path)/$(en)/localefileinen.UTF-8.properties_temp")
    
    local("iconv -t=UTF-8 ./$(test1_locales_path)/$(en)/emptylocalefile.UTF-8.properties_temp > ./$(test1_locales_path)/$(en)/emptylocalefile.UTF-8.properties")
    local("iconv -t=UTF-8 ./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp > ./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties")
    local("iconv -t=UTF-8 ./$(test1_locales_path)/$(en)/one\ param\ \"locale\"\ file.UTF-8.properties_temp > ./$(test1_locales_path)/$(en)/one\ param\ \"locale\"\ file.UTF-8.properties")
    local("iconv -t=UTF-8 ./$(test1_locales_path)/$(fr)/one\ param\ \"locale\"\ file.UTF-8.properties_temp > ./$(test1_locales_path)/$(fr)/one\ param\ \"locale\"\ file.UTF-8.properties")
    local("iconv -t=UTF-8 ./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp > ./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties")
    local("iconv -t=UTF-8 ./$(test2_locales_path)/$(en)/localefileinen.UTF-8.properties_temp > ./$(test2_locales_path)/$(en)/localefileinen.UTF-8.properties")
    
    local("rm -f ./$(test1_locales_path)/$(en)/emptylocalefile.UTF-8.properties_temp")
    local("rm -f ./$(test1_locales_path)/$(en)/multi.params.UTF-8.properties_temp")
    local("rm -f ./$(test1_locales_path)/$(en)/one\ param\ \"locale\"\ file.UTF-8.properties_temp")
    local("rm -f ./$(test1_locales_path)/$(fr)/one\ param\ \"locale\"\ file.UTF-8.properties_temp")
    local("rm -f ./$(test1_locales_path)/$(fr)/sameparamsdifferentfile.UTF-8.properties_temp")
    local("rm -f ./$(test2_locales_path)/$(en)/localefileinen.UTF-8.properties_temp")
    
    
    


    

    
