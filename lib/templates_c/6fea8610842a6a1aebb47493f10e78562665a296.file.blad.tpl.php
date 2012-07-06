<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:29:27
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/blad.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8466376014e0e3c37e40a39-04164474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fea8610842a6a1aebb47493f10e78562665a296' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/blad.tpl',
      1 => 1309532910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8466376014e0e3c37e40a39-04164474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1>
    Błąd!
</h1>
<p>
    <?php  $_smarty_tpl->tpl_vars['komunikat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['komunikat']->key => $_smarty_tpl->tpl_vars['komunikat']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['komunikat']->value;?>

    <br />
    <?php }} ?>
</p>
<p> Za chwile nastąpi przekierowanie na stronę główną</p>