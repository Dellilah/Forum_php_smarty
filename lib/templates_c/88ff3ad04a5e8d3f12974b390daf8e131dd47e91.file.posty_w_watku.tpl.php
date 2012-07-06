<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:50:20
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/posty_w_watku.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3691277024e0e411c24a383-47460095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88ff3ad04a5e8d3f12974b390daf8e131dd47e91' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/posty_w_watku.tpl',
      1 => 1309538425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3691277024e0e411c24a383-47460095',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	 
	 <div class="dodaj_post">
		<a href="dodaj_post.php?id_watek=<?php echo $_smarty_tpl->getVariable('pomocnicze')->value['id_watek'];?>
"> Dodaj Post </a> </div>
	
	<p id="nawigacja" align="center">
		<?php $_template = new Smarty_Internal_Template("nawigacja.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?></p>
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"> <font size=5><b><?php echo $_smarty_tpl->getVariable('pomocnicze')->value['watek_nazwa'];?>
</b></font></td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Autor </th> <th colspan="2"> Post </th> <th> Data dodania </th> </tr>
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
					<td><a href="pokaz_profil.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['post']->value['uzytkownik_forum_id_uz'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['autor'];?>
</a></td>
					<td><pre><?php echo $_smarty_tpl->tpl_vars['post']->value['tresc'];?>
</pre></td>
					<td><?php if (isset($_SESSION['uzytkownik'])&&($_SESSION['uzytkownik']['login']==$_smarty_tpl->tpl_vars['post']->value['autor']||$_SESSION['uzytkownik']['typ']=='admin')){?>
							<a href="edytuj_post.php?id_post=<?php echo $_smarty_tpl->tpl_vars['post']->value['id_post'];?>
"> edytuj </a> ::
							<a href="usun_post.php?id_post=<?php echo $_smarty_tpl->tpl_vars['post']->value['id_post'];?>
"> usuń </a> 
						<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['post']->value['data_dodania'];?>
</td>
				</tr>
		<?php }} ?>
	<?php }?>
	</table>
