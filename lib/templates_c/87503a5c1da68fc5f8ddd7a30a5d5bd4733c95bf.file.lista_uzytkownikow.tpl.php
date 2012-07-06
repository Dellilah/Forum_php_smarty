<?php /* Smarty version Smarty-3.0.7, created on 2011-07-02 22:03:26
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/lista_uzytkownikow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15077541544e0f786ee26904-68620920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87503a5c1da68fc5f8ddd7a30a5d5bd4733c95bf' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/lista_uzytkownikow.tpl',
      1 => 1309633384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15077541544e0f786ee26904-68620920',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	 
	<p id="nawigacja" align="center">
		<?php $_template = new Smarty_Internal_Template("nawigacja.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?></p>
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><font size=5>Lista użytkowników <b> Forum Mieszanego </b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"><th> #  <th> Login </th> <th> Imię </th> <th> Nazwisko </th> </tr> 
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
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?>
		<?php  $_smarty_tpl->tpl_vars['uzytkownik'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['uzytkownicy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['uzytkownik']->key => $_smarty_tpl->tpl_vars['uzytkownik']->value){
?>
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?>
				<tr>
					<td align="center"><?php echo $_smarty_tpl->getVariable('i')->value;?>
 </td>
					<td align="center"><a href="pokaz_profil.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['id_uz'];?>
"><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['login'];?>
</a></td>
					<td align="center" ><?php if ($_smarty_tpl->tpl_vars['uzytkownik']->value['typ']=='admin'){?>
											<font color="red">
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['uzytkownik']->value['typ']=='moderator'){?>
											<font color="green">
										<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['imie'];?>

										<?php if ($_smarty_tpl->tpl_vars['uzytkownik']->value['typ']!='user'){?>
											</font>
										<?php }?>
										</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['uzytkownik']->value['typ']=='admin'){?>
											<font color="red">
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['uzytkownik']->value['typ']=='moderator'){?>
											<font color="green">
										<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['nazwisko'];?>

										<?php if ($_smarty_tpl->tpl_vars['uzytkownik']->value['typ']!='user'){?>
											</font>
										<?php }?>
										</td>
											
				</tr>
		<?php }} ?>
	<?php }?>
	</table>