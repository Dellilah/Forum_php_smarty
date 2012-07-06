<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:49:28
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/moderacja_postow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11153749024e0e40e8bc2d85-78098454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7ec930cec7cb7f15d5132f64b6149ac23c42e8b' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/moderacja_postow.tpl',
      1 => 1309533012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11153749024e0e40e8bc2d85-78098454',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	
	<table width="100%" cellspacing="0" cellpadding="10">
    <?php  $_smarty_tpl->tpl_vars['posty'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['klucz'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dane')->value['posty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['posty']->key => $_smarty_tpl->tpl_vars['posty']->value){
 $_smarty_tpl->tpl_vars['klucz']->value = $_smarty_tpl->tpl_vars['posty']->key;
?>
	<tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b><?php echo $_smarty_tpl->tpl_vars['klucz']->value;?>
</b></font> </td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Autor </th> <th colspan="2"> Post </th> <th> Data dodania </th> </tr>
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['posty']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>
				
				<tr>	
					<td><a href="pokaz_profil.php?id_uz=<?php echo $_smarty_tpl->tpl_vars['post']->value['uzytkownik_forum_id_uz'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['autor'];?>
</a></td>
					<td><pre><?php echo $_smarty_tpl->tpl_vars['post']->value['tresc'];?>
</pre></td>
					<td><a href="edytuj_post.php?id_post=<?php echo $_smarty_tpl->tpl_vars['post']->value['id_post'];?>
"> edytuj </a> ::
						<a href="usun_post.php?id_post=<?php echo $_smarty_tpl->tpl_vars['post']->value['id_post'];?>
"> usuń </a> 
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['post']->value['data_dodania'];?>
</td>
				</tr>
		<?php }} ?>
		<?php }} ?>
	</table>
