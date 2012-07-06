<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:50:38
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/usun_watek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13586704874e0e412e1fefa0-36603658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01b4fe2099422df65a2929445c8c29c41d50ebd3' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/usun_watek.tpl',
      1 => 1309533138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13586704874e0e412e1fefa0-36603658',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1> USUWANIE WĄTKU WRAZ Z ZAWARTOŚCIĄ </h1>
<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b><?php echo $_smarty_tpl->getVariable('dane')->value['nazwa'];?>
</b></font></td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Autor </th> <th> Post </th> <th> Data dodania </th> </tr>
	<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['posty'])&&count($_smarty_tpl->getVariable('dane')->value['posty'])){?>
			<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['posty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>

				<tr>	
					<td><?php echo $_smarty_tpl->tpl_vars['post']->value['autor'];?>
</td>
					<td><pre><?php echo $_smarty_tpl->tpl_vars['post']->value['tresc'];?>
</pre></td>
					<td><?php echo $_smarty_tpl->tpl_vars['post']->value['data_dodania'];?>
</td>
				</tr>
			<?php }} ?>
	<?php }?>
	</table>
<p> czy na pewno chcesz usunąć?</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_watek" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_watek'];?>
">
	<input type="submit" value="usuń">
</form>