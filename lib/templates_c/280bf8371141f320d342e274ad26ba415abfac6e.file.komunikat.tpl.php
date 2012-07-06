<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:30:12
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/komunikat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16304839954e0e3c648751f2-60440340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '280bf8371141f320d342e274ad26ba415abfac6e' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/komunikat.tpl',
      1 => 1309532989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16304839954e0e3c648751f2-60440340',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<p>
    <?php  $_smarty_tpl->tpl_vars['komunikat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value['komunikaty']['operacje']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['komunikat']->key => $_smarty_tpl->tpl_vars['komunikat']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['komunikat']->value;?>

    <br />
    <?php }} ?>
	
</p>
<p> Za chwile nastąpi przekierowanie na stronę główną</p>