<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:49:19
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/pokaz_profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17908665374e0e40dfae8b99-88718745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01adaf3a5de388824c9485766bae892e76fccc2a' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/pokaz_profil.tpl',
      1 => 1309533085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17908665374e0e40dfae8b99-88718745',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="2" align="center" valign="middle"><font size=5><b>Profil użytkownika</b></font></td>
	</tr>
	<tr><td bgcolor="#C2DFFF">LOGIN</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['login'];?>
</td></tr>
	<tr><td bgcolor="#C2DFFF">IMIĘ</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['imie'];?>
</td></tr>
	<tr><td bgcolor="#C2DFFF">NAZWISKO</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['nazwisko'];?>
</td></tr>
	<tr><td bgcolor="#C2DFFF">E-MAIL</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['email'];?>
</td></tr>
	<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['podpis'])&&$_smarty_tpl->getVariable('dane')->value['podpis']!=''){?>
		<tr><td bgcolor="#C2DFFF">PODPIS</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['podpis'];?>
</td></tr>
	<?php }?>
	<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['Data_ur'])&&$_smarty_tpl->getVariable('dane')->value['Data_ur']!='0000-00-00'){?>
		<tr><td bgcolor="#C2DFFF">DATA URODZENIA</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['Data_ur'];?>
</td></tr>
	<?php }?>
	<tr><<td bgcolor="#C2DFFF">Ilość postów</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['ilosc_postow'];?>

												<br><a href="szukaj_postow.php?id_uz=<?php echo $_smarty_tpl->getVariable('dane')->value['id_uz'];?>
">
													Znajdź posty użytkownika <?php echo $_smarty_tpl->getVariable('dane')->value['login'];?>
</td></tr>
	</table>
