<?php 
 require_once('/home/patrick/boulot/jelix/Jelix-Locales-Interface-Test/test/lib/jelix/plugins/tpl/html/function.jurl.php');
function template_meta_e66bfacc8f63e8b5f3cc0e31b268ccab($t){

}
function template_e66bfacc8f63e8b5f3cc0e31b268ccab($t){
?><form action="<?php jtpl_function_html_jurl( $t,'locales~locales:savecreate');?>" method="post">
<input type="submit" />
<table>
    <tr>
        <th></th>
        <?php foreach($t->_vars['locales'] as $t->_vars['l']):?>
        <th><?php echo $t->_vars['l']; ?></th>
        <?php endforeach;?>
    </tr>
        <?php foreach($t->_vars['params_name'] as $t->_vars['id']=>$t->_vars['key']):?>
        <tr>
            <td class="key"><?php echo $t->_vars['key']; ?></td>
            <?php foreach($t->_vars['locales'] as $t->_vars['l']):?>
                        <td>
                            <input type="text" name="<?php echo $t->_vars['id']; ?>::<?php echo $t->_vars['l']; ?>"
                            <?php foreach($t->_vars['params_value'] as $t->_vars['param']=>$t->_vars['value']):?>
                                <?php if($t->_vars['param'] == $t->_vars['id'].$t->_vars['l']):?>
                                value="<?php echo $t->_vars['value']; ?>"
                                <?php endif;?>
                            <?php endforeach;?>
                            />
                        </td>
            <?php endforeach;?>
        </tr>
        <?php endforeach;?>
</table>
<input type="submit" />
</form><?php 
}
?>