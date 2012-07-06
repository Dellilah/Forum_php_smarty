<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:49:21
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/szukaj_postow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14926755074e0e40e1a7e686-09685381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54c32567881c6972543daf8ee7b72707013027a3' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/szukaj_postow.tpl',
      1 => 1309533121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14926755074e0e40e1a7e686-09685381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

	 
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="3" align="center" valign="middle"><font size=5><b>POSTY UŻYTKOWNIKA</b> </font><?php echo $_smarty_tpl->getVariable('dane')->value['login'];?>
</td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Post </th> <th> Data dodania </th> </tr>
	<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy'])&&count($_smarty_tpl->getVariable('status')->value['komunikaty']['bledy'])){?>
			<?php  $_smarty_tpl->tpl_vars['blad'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['blad']->key => $_smarty_tpl->tpl_vars['blad']->value){
?>
				<p><?php echo $_smarty_tpl->tpl_vars['blad']->value;?>
</p>
			<?php }} ?>
	<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['posty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>
				
				<tr>	
					<td><a href="posty_w_watku.php?id_watek=<?php echo $_smarty_tpl->tpl_vars['post']->value['watek_id_watek'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['nazwa_watek'];?>
</a></td>
					<td><pre><?php echo $_smarty_tpl->tpl_vars['post']->value['tresc'];?>
</pre></td>
					<td><?php echo $_smarty_tpl->tpl_vars['post']->value['data_dodania'];?>
</td>
				</tr>
		<?php }} ?>
		<?php }?>
	</table>
