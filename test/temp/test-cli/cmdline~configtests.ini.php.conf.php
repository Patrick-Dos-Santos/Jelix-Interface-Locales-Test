<?php $config = array (
  'startModule' => 'junittests',
  'startAction' => 'default:index',
  'locale' => 'en_EN',
  'charset' => 'UTF-8',
  'theme' => 'default',
  'timeZone' => 'Europe/Paris',
  'pluginsPath' => 'lib:../../common/plugins/',
  'modulesPath' => 'lib:../../common/modules/,lib:jelix-admin-modules/,lib:jelix-modules/,app:modules/,app:../../Jelix-Locales-Interface/',
  'checkTrustedModules' => '',
  'trustedModules' => '',
  'unusedModules' => 'jacldb',
  'dbProfils' => 'dbprofils.ini.php',
  'cacheProfiles' => 'cache.ini.php',
  'use_error_handler' => '1',
  'enableOldActionSelector' => '',
  'coordplugins' => 
  array (
    'auth' => 'cmdline/auth.coord.ini.php',
  ),
  'tplplugins' => 
  array (
    'defaultJformsBuilder' => 'html',
  ),
  'responses' => 
  array (
    'html' => 'myHtmlResponse',
    'redirect' => 'jResponseRedirect',
    'redirectUrl' => 'jResponseRedirectUrl',
    'binary' => 'jResponseBinary',
    'text' => 'jResponseText',
    'cmdline' => 'jResponseCmdline',
    'jsonrpc' => 'jResponseJsonrpc',
    'json' => 'jResponseJson',
    'xmlrpc' => 'jResponseXmlrpc',
    'xul' => 'jResponseXul',
    'xuloverlay' => 'jResponseXulOverlay',
    'xuldialog' => 'jResponseXulDialog',
    'xulpage' => 'jResponseXulPage',
    'rdf' => 'jResponseRdf',
    'xml' => 'jResponseXml',
    'zip' => 'jResponseZip',
    'rss2.0' => 'jResponseRss20',
    'atom1.0' => 'jResponseAtom10',
    'css' => 'jResponseCss',
    'ltx2pdf' => 'jResponseLatexToPdf',
    'tcpdf' => 'jResponseTcpdf',
    'soap' => 'jResponseSoap',
    'htmlfragment' => 'jResponseHtmlFragment',
    'htmlauth' => 'jResponseHtml',
    'html.path' => '/home/patrick/boulot/jelix/test/test/responses/myHtmlResponse.class.php',
    'redirect.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRedirect.class.php',
    'redirectUrl.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRedirectUrl.class.php',
    'binary.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseBinary.class.php',
    'text.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseText.class.php',
    'cmdline.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseCmdline.class.php',
    'jsonrpc.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseJsonrpc.class.php',
    'json.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseJson.class.php',
    'xmlrpc.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXmlrpc.class.php',
    'xul.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXul.class.php',
    'xuloverlay.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXulOverlay.class.php',
    'xuldialog.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXulDialog.class.php',
    'xulpage.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXulPage.class.php',
    'rdf.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRdf.class.php',
    'xml.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXml.class.php',
    'zip.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseZip.class.php',
    'rss2.0.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRss20.class.php',
    'atom1.0.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseAtom10.class.php',
    'css.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseCss.class.php',
    'ltx2pdf.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseLatexToPdf.class.php',
    'tcpdf.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseTcpdf.class.php',
    'soap.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseSoap.class.php',
    'htmlfragment.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseHtmlFragment.class.php',
    'htmlauth.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseHtml.class.php',
  ),
  '_coreResponses' => 
  array (
    'html' => 'jResponseHtml',
    'redirect' => 'jResponseRedirect',
    'redirectUrl' => 'jResponseRedirectUrl',
    'binary' => 'jResponseBinary',
    'text' => 'jResponseText',
    'cmdline' => 'jResponseCmdline',
    'jsonrpc' => 'jResponseJsonrpc',
    'json' => 'jResponseJson',
    'xmlrpc' => 'jResponseXmlrpc',
    'xul' => 'jResponseXul',
    'xuloverlay' => 'jResponseXulOverlay',
    'xuldialog' => 'jResponseXulDialog',
    'xulpage' => 'jResponseXulPage',
    'rdf' => 'jResponseRdf',
    'xml' => 'jResponseXml',
    'zip' => 'jResponseZip',
    'rss2.0' => 'jResponseRss20',
    'atom1.0' => 'jResponseAtom10',
    'css' => 'jResponseCss',
    'ltx2pdf' => 'jResponseLatexToPdf',
    'tcpdf' => 'jResponseTcpdf',
    'soap' => 'jResponseSoap',
    'htmlfragment' => 'jResponseHtmlFragment',
    'htmlauth' => 'jResponseHtml',
    'html.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseHtml.class.php',
    'redirect.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRedirect.class.php',
    'redirectUrl.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRedirectUrl.class.php',
    'binary.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseBinary.class.php',
    'text.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseText.class.php',
    'cmdline.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseCmdline.class.php',
    'jsonrpc.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseJsonrpc.class.php',
    'json.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseJson.class.php',
    'xmlrpc.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXmlrpc.class.php',
    'xul.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXul.class.php',
    'xuloverlay.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXulOverlay.class.php',
    'xuldialog.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXulDialog.class.php',
    'xulpage.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXulPage.class.php',
    'rdf.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRdf.class.php',
    'xml.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseXml.class.php',
    'zip.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseZip.class.php',
    'rss2.0.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseRss20.class.php',
    'atom1.0.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseAtom10.class.php',
    'css.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseCss.class.php',
    'ltx2pdf.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseLatexToPdf.class.php',
    'tcpdf.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseTcpdf.class.php',
    'soap.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseSoap.class.php',
    'htmlfragment.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseHtmlFragment.class.php',
    'htmlauth.path' => '/home/patrick/boulot/jelix/test/lib/jelix/core/response/jResponseHtml.class.php',
  ),
  'error_handling' => 
  array (
    'messageLogFormat' => '%date%\\t[%code%]\\t%msg%\\t%file%\\t%line%\\n',
    'logFile' => 'error.log',
    'email' => 'root@localhost',
    'emailHeaders' => 'Content-Type: text/plain; charset=UTF-8\\nFrom: webmaster@yoursite.com\\nX-Mailer: Jelix\\nX-Priority: 1 (Highest)\\n',
    'quietMessage' => 'Une erreur technique est survenue. Désolé pour ce désagrément.',
    'showInFirebug' => '',
    'default' => 'ECHO EXIT',
    'error' => 'ECHO EXIT',
    'warning' => 'ECHO',
    'notice' => 'ECHO',
    'strict' => 'ECHO',
    'exception' => 'ECHO',
  ),
  'compilation' => 
  array (
    'checkCacheFiletime' => '1',
    'force' => '',
  ),
  'urlengine' => 
  array (
    'engine' => 'basic_significant',
    'enableParser' => '1',
    'multiview' => '',
    'scriptNameServerVariable' => 'SCRIPT_NAME',
    'pathInfoInQueryParameter' => '',
    'basePath' => '/',
    'jelixWWWPath' => '/jelix/',
    'defaultEntrypoint' => 'index',
    'entrypointExtension' => '.php',
    'notfoundAct' => '',
    'simple_urlengine_https' => '',
    'significantFile' => 'urls.xml',
    'urlScript' => 'tests.php',
    'urlScriptPath' => '/',
    'urlScriptName' => 'ests.php',
    'urlScriptId' => 'ests',
    'urlScriptIdenc' => 'ests',
  ),
  'simple_urlengine_entrypoints' => 
  array (
    'index' => '@classic',
    'xmlrpc' => '@xmlrpc',
    'jsonrpc' => '@jsonrpc',
    'rdf' => '@rdf',
  ),
  'basic_significant_urlengine_entrypoints' => 
  array (
    'index' => '1',
    'xmlrpc' => '1',
    'jsonrpc' => '1',
    'rdf' => '1',
  ),
  'logfiles' => 
  array (
    'default' => 'messages.log',
  ),
  'mailer' => 
  array (
    'webmasterEmail' => 'root@localhost',
    'webmasterName' => '',
    'mailerType' => 'mail',
    'hostname' => '',
    'sendmailPath' => '/usr/sbin/sendmail',
    'filesDir' => 'mails/',
    'smtpHost' => 'localhost',
    'smtpPort' => '25',
    'smtpSecure' => '',
    'smtpHelo' => '',
    'smtpAuth' => '',
    'smtpUsername' => '',
    'smtpPassword' => '',
    'smtpTimeout' => '10',
  ),
  'acl' => 
  array (
    'driver' => '',
  ),
  'acl2' => 
  array (
    'driver' => '',
  ),
  'sessions' => 
  array (
    'start' => '1',
    'shared_session' => '',
    'name' => '',
    'storage' => '',
    'loadClasses' => '',
    '_class_to_load' => 
    array (
    ),
  ),
  'forms' => 
  array (
    'controls.datetime.input' => 'menulists',
    'controls.datetime.months.labels' => 'names',
    'datepicker' => 'default',
  ),
  'datepickers' => 
  array (
    'default' => 'jelix/js/jforms/datepickers/default/init.js',
  ),
  'htmleditors' => 
  array (
    'default.engine.name' => 'wymeditor',
    'default.engine.file' => 
    array (
      0 => 'jelix/jquery/jquery.js',
      1 => 'jelix/wymeditor/jquery.wymeditor.js',
    ),
    'default.config' => 'jelix/wymeditor/config/default.js',
    'default.skin.default' => 'jelix/wymeditor/skins/default/screen.css',
  ),
  'zones' => 
  array (
    'disableCache' => '',
  ),
  'classbindings' => 
  array (
  ),
  'enableTests' => '1',
  'locales' => 
  array (
    'langs' => 
    array (
      0 => 'en_EN',
      1 => 'fr_FR',
      2 => 'es_ES',
    ),
  ),
  'isWindows' => false,
  '_allBasePath' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/../../common/modules/',
    1 => '/home/patrick/boulot/jelix/test/lib/jelix-admin-modules/',
    2 => '/home/patrick/boulot/jelix/test/lib/jelix-modules/',
    3 => '/home/patrick/boulot/jelix/test/test/modules/',
    4 => '/home/patrick/boulot/jelix/test/test/../../Jelix-Locales-Interface/',
    5 => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/coord/',
    6 => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/tpl/',
    7 => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/jforms/',
    8 => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/db/',
  ),
  '_modulesPathList' => 
  array (
    'jelix' => '/home/patrick/boulot/jelix/test/lib/jelix/core-modules/jelix/',
    'utils' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/utils/',
    'upload' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/upload/',
    'jmessenger' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jmessenger/',
    'history' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/history/',
    'jcommunity' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jcommunity/',
    'emails' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/emails/',
    'jnewsletter' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jnewsletter/',
    'jmcms' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jmcms/',
    'jarticle' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jarticle/',
    'hfnusearch' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/hfnusearch/',
    'cms' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/cms/',
    'jcomments' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jcomments/',
    'jtags' => '/home/patrick/boulot/jelix/test/lib/../../common/modules/jtags/',
    'jauthdb_admin' => '/home/patrick/boulot/jelix/test/lib/jelix-admin-modules/jauthdb_admin/',
    'jacl2db_admin' => '/home/patrick/boulot/jelix/test/lib/jelix-admin-modules/jacl2db_admin/',
    'master_admin' => '/home/patrick/boulot/jelix/test/lib/jelix-admin-modules/master_admin/',
    'junittests' => '/home/patrick/boulot/jelix/test/lib/jelix-modules/junittests/',
    'jWSDL' => '/home/patrick/boulot/jelix/test/lib/jelix-modules/jWSDL/',
    'jauth' => '/home/patrick/boulot/jelix/test/lib/jelix-modules/jauth/',
    'jacl2db' => '/home/patrick/boulot/jelix/test/lib/jelix-modules/jacl2db/',
    'test' => '/home/patrick/boulot/jelix/test/test/modules/test/',
    'moduletest2' => '/home/patrick/boulot/jelix/test/test/modules/moduletest2/',
    'moduletest1' => '/home/patrick/boulot/jelix/test/test/modules/moduletest1/',
    'locales' => '/home/patrick/boulot/jelix/test/test/../../Jelix-Locales-Interface/locales/',
  ),
  '_pluginsPathList_auth' => 
  array (
    'class' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/auth/class/',
    'db' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/auth/db/',
    'lds' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/auth/lds/',
    'ldap' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/auth/ldap/',
  ),
  '_pluginsPathList_coord' => 
  array (
    'auth' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/auth/',
    'jacl' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/jacl/',
    'history' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/history/',
    'magicquotes' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/magicquotes/',
    'zendframework' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/zendframework/',
    'autolocale' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/autolocale/',
    'jacl2' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/coord/jacl2/',
    'bautolocale' => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/coord/bautolocale/',
  ),
  '_pluginsPathList_cache' => 
  array (
    'memcached' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/cache/memcached/',
    'db' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/cache/db/',
  ),
  '_tplpluginsPathList_common' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/tpl/common/',
    1 => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/tpl/common/',
  ),
  '_tplpluginsPathList_ltx2pdf' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/tpl/ltx2pdf/',
  ),
  '_tplpluginsPathList_xml' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/tpl/xml/',
  ),
  '_tplpluginsPathList_html' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/tpl/html/',
    1 => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/tpl/html/',
  ),
  '_tplpluginsPathList_text' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/tpl/text/',
  ),
  '_tplpluginsPathList_xul' => 
  array (
    0 => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/tpl/xul/',
  ),
  '_pluginsPathList_jforms' => 
  array (
    'htmllight' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/jforms/htmllight/',
    'html' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/jforms/html/',
    'myhtml' => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/jforms/myhtml/',
    'admin' => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/jforms/admin/',
    'emails' => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/jforms/emails/',
  ),
  '_pluginsPathList_urls' => 
  array (
    'basic_significant' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/urls/basic_significant/',
    'simple' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/urls/simple/',
    'significant' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/urls/significant/',
  ),
  '_pluginsPathList_acl' => 
  array (
    'db' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/acl/db/',
  ),
  '_pluginsPathList_db' => 
  array (
    'oci' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/db/oci/',
    'intuition' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/db/intuition/',
    'pgsql' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/db/pgsql/',
    'sqlite' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/db/sqlite/',
    'mysql' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/db/mysql/',
    'mssql' => '/home/patrick/boulot/jelix/test/lib/../../common/plugins/db/mssql/',
  ),
  '_pluginsPathList_acl2' => 
  array (
    'db' => '/home/patrick/boulot/jelix/test/lib/jelix/plugins/acl2/db/',
  ),
  '_trustedModules' => 
  array (
    0 => 'jelix',
    1 => 'utils',
    2 => 'upload',
    3 => 'jmessenger',
    4 => 'history',
    5 => 'jcommunity',
    6 => 'emails',
    7 => 'jnewsletter',
    8 => 'jmcms',
    9 => 'jarticle',
    10 => 'hfnusearch',
    11 => 'cms',
    12 => 'jcomments',
    13 => 'jtags',
    14 => 'jauthdb_admin',
    15 => 'jacl2db_admin',
    16 => 'master_admin',
    17 => 'junittests',
    18 => 'jWSDL',
    19 => 'jauth',
    20 => 'jacl2db',
    21 => 'test',
    22 => 'moduletest2',
    23 => 'moduletest1',
    24 => 'locales',
  ),
);
?>