<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:29:16
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/glowna_watki.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10967568404e0e3c2c2a47a9-74224587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7a9161a7e2faba80b67c0d4378fdbb61414b806' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/glowna_watki.tpl',
      1 => 1309538375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10967568404e0e3c2c2a47a9-74224587',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	 
	 <div class="dodaj_watek">
		<a href="dodaj_watek.php"> Dodaj wątek </a> </div>
	<p id="nawigacja" align="center">
		<?php $_template = new Smarty_Internal_Template("nawigacja.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?></p>
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="5" align="center" valign="middle"><font size=5><font size=5><b>Forum Mieszane</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Autor </th> <th> Data założenia </th><th>Ostatni wpis</th> <th>Posty</th></tr> 
	<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy'])&&count($_smarty_tpl->getVariable('status')->value['komunikaty']['bledy'])){?>
			<?php  $_smarty_tpl->tpl_vars['komunikat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['komunikat']->key => $_smarty_tpl->tpl_vars['komunikat']->value){
?>
				<p><?php echo $_smarty_tpl->tpl_vars['komunikat']->value;?>
<p>
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
					<td align="center"> <?php echo $_smarty_tpl->tpl_vars['watek']->value['ostatni_autor'];?>
<br>
						<?php echo $_smarty_tpl->tpl_vars['watek']->value['ostatnia_data'];?>
<br>
						<?php echo $_smarty_tpl->tpl_vars['watek']->value['ostatni_fragment'];?>
... <a href="posty_w_watku.php?id_watek=<?php echo $_smarty_tpl->tpl_vars['watek']->value['id_watek'];?>
&ost=1"> >>> </a></td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['watek']->value['il_postow'];?>
</td>
					
				</tr>
				
			<?php }} ?>
	<?php }?>
	</table>