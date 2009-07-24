<?php 
 require_once('/home/patrick/boulot/jelix/Jelix-Locales-Interface-Test/test/lib/jelix/plugins/tpl/html/function.jurl.php');
function template_meta_302b9bb6f0ed985d4f44b0957930caf7($t){

}
function template_302b9bb6f0ed985d4f44b0957930caf7($t){
?><div id="header">
<?php echo $t->_vars['page_title']; ?>
</div>

<div id="main">
<?php echo $t->_vars['MAIN']; ?>
</div>

<div id="sidemenu">
Php version : <?php echo $t->_vars['versionphp']; ?><br/>
Jelix version: <?php echo $t->_vars['versionjelix']; ?><br/>

<h2>Tests menu</h2>
<?php if(count($t->_vars['modules'])):?>
    <ul>
        <li><a href="<?php jtpl_function_html_jurl( $t,'junittests~default:index');?>">Home</a></li>
        <li><a href="<?php jtpl_function_html_jurl( $t,'junittests~default:all');?>">Run all tests</a></li>
    </ul>

    <h3>Modules</h3>
    <ul>
    <?php foreach($t->_vars['modules'] as $t->_vars['module']=>$t->_vars['tests']):?>
        <li><?php echo $t->_vars['module']; ?>
            <ul>
                <li><a href="<?php jtpl_function_html_jurl( $t,'junittests~default:module', array('mod'=>$t->_vars['module']));?>">All tests</a></li>
        <?php foreach($t->_vars['tests'] as $t->_vars['test']):?>
                <li><a href="<?php jtpl_function_html_jurl( $t,'junittests~default:single', array('mod'=>$t->_vars['module'], 'test'=>$t->_vars['test'][1]));?>"><?php echo $t->_vars['test'][2]; ?></a>
        <?php endforeach;?>
            </ul>
        </li>
    <?php endforeach;?>
    </ul>
<?php else:?>
    <p>No availabled tests.</p>
<?php endif;?>

</div>

<div id="footer">
web page generated by <?php echo jLocale::get('jelix~jelix.framework.name'); ?>
</div><?php 
}
?>