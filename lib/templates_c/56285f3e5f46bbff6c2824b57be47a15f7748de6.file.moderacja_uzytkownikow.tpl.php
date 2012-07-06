<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:49:11
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/moderacja_uzytkownikow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1411289754e0e3c7b0c54b7-99180847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56285f3e5f46bbff6c2824b57be47a15f7748de6' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/moderacja_uzytkownikow.tpl',
      1 => 1309553170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1411289754e0e3c7b0c54b7-99180847',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>



<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="5" align="center" valign="middle"><font size=5><b>Zarządzaj Użytkownikami</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"><th> #  <th> Login </th> <th> Imię </th> <th> Nazwisko </th> <th> Moderuj </th> </tr> 
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
					<td align="center" ><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['imie'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['nazwisko'];?>
</td>
					<td align="center"><?php if ($_SESSION['uzytkownik']['typ']=='admin'){?><a href="nadaj_moderatora.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['id_uz'];?>
"> Nadaj uprawnienienia moderatora</a>
										::<?php }?>
									   <a href="usun_konto?id_uz=<?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['id_uz'];?>
"> Usuń konto</a>
					</td>
				</tr>
		<?php }} ?>
		<?php }?>
	</table>