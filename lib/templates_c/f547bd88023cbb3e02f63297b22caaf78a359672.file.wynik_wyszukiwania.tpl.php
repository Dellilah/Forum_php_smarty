<?php /* Smarty version Smarty-3.0.7, created on 2011-07-02 21:55:33
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/wynik_wyszukiwania.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18001862114e0f77b5d94603-64962356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f547bd88023cbb3e02f63297b22caaf78a359672' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/wynik_wyszukiwania.tpl',
      1 => 1309533142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18001862114e0f77b5d94603-64962356',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h2>Wynik wyszukiwania dla <?php echo $_smarty_tpl->getVariable('dane')->value['szukane'];?>
</h2>
<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>POSTY</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Autor </th><th> Post </th> <th colspan="2"> Data dodania </th> </tr>
	<?php if (!isset($_smarty_tpl->getVariable('dane',null,true,false)->value['posty'])||!count($_smarty_tpl->getVariable('dane')->value['posty'])){?>
		<tr> <td colspan="4">Brak Postów spełniających kryteria </td></tr> 
	<?php }else{ ?> 
			<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['posty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>
			
			<tr>	
				<td><a href="pokaz_profil.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['post']->value['uzytkownik_forum_id_uz'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['autor'];?>
</a></td>
				<td><pre><?php echo $_smarty_tpl->tpl_vars['post']->value['tresc'];?>
</pre></td>
				<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['post']->value['data_dodania'];?>
</td>
			</tr>
			<?php }} ?>
	<?php }?>
	<tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>WĄTKI</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Autor </th> <th colspan="2"> Data założenia </th> </tr> 
	<?php if (!isset($_smarty_tpl->getVariable('dane',null,true,false)->value['watki'])||!count($_smarty_tpl->getVariable('dane')->value['watki'])){?>
			<tr> <td colspan="3">Brak Wątków spełniających kryteria </td></tr>
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
				</tr>
		<?php }} ?>
	<?php }?>
	<tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>UŻYTKOWNICY</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"><th> #  <th> Login </th> <th> Imię </th> <th> Nazwisko </th> </tr> 
	<?php if (!isset($_SESSION['uzytkownik'])){?>
		<tr><td colspan="4"> Wgląd tylko dla zalogowanych użytkowników </td></tr>
	<?php }else{ ?>
		<?php if (!isset($_smarty_tpl->getVariable('dane',null,true,false)->value['uzytkownicy'])||!count($_smarty_tpl->getVariable('dane')->value['uzytkownicy'])){?>
			<tr> <td colspan="4">Brak Użytkowników spełniających kryteria </td></tr>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['imie'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['uzytkownik']->value['nazwisko'];?>
</td>
				</tr>
			<?php }} ?>
		<?php }?>
	<?php }?>
			
	</table>
	
	