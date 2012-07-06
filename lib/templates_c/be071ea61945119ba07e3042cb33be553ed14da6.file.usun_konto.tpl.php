<?php /* Smarty version Smarty-3.0.7, created on 2011-07-02 00:20:57
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/usun_konto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15056412364e0e48495871a5-77293304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be071ea61945119ba07e3042cb33be553ed14da6' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/usun_konto.tpl',
      1 => 1309533129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15056412364e0e48495871a5-77293304',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1> Usuwanie Konta użytkownika</h1>
	<table width="100%" cellspacing="0" cellpadding="10">
	<tr bgcolor="#C2DFFF"><th> Login </th> <th> Imię </th> <th> Nazwisko </th> </tr> 
	<?php  $_smarty_tpl->tpl_vars['uzytkownik'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['uzytkownicy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['uzytkownik']->key => $_smarty_tpl->tpl_vars['uzytkownik']->value){
?>
				<tr>
					
					<td align="center"><a href="pokaz_profil.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['id_uz'];?>
"><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['login'];?>
 </a></td>
					<td align="center" ><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['imie'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['nazwisko'];?>
</td>
				</tr>
		<?php }} ?>
	</table>

<p> czy na pewno chcesz usunąć użytkownika z bazy? Jego posty oraz wątki nie zostaną usunięte</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_uz" value="<?php echo $_smarty_tpl->getVariable('pomocnicze')->value['id_uz'];?>
">
	<input type="submit" value="usuń konto">
</form>