<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:50:18
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/moderacja_watkow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3788367744e0e411a0caee8-78947600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edb0666f9f789c2e64b45a2acd2c6423d329a509' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/moderacja_watkow.tpl',
      1 => 1309533072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3788367744e0e411a0caee8-78947600',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>Zarządzaj Wątkami</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Autor </th> <th colspan="2"> Data założenia </th> </tr> 
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
		<?php  $_smarty_tpl->tpl_vars['watek'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['watki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['watek']->key => $_smarty_tpl->tpl_vars['watek']->value){
?>
	
				<tr>	
					<td align="center"><a href="posty_w_watku.php?id_watek=<?php echo $_smarty_tpl->tpl_vars['watek']->value['id_watek'];?>
"><?php echo $_smarty_tpl->tpl_vars['watek']->value['nazwa'];?>
</a></td>
					<td align="center"><a href="pokaz_profil.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['watek']->value['uzytkownik_forum_id_uz'];?>
"><?php echo $_smarty_tpl->tpl_vars['watek']->value['autor'];?>
</a></td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['watek']->value['data_zalozenia'];?>
</td>
					<td>
						<a href="edytuj_watek.php?id_watek=<?php echo $_smarty_tpl->tpl_vars['watek']->value['id_watek'];?>
"> Edytuj </a>::
						<a href="usun_watek.php?id_watek=<?php echo $_smarty_tpl->tpl_vars['watek']->value['id_watek'];?>
"> Usuń </a>
					</td>
					
				</tr>
		<?php }} ?>
	<?php }?>
	</table>