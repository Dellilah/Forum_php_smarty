<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:49:59
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/usun_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11288215014e0e41074f9542-33206569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e3acc97dc89a1519362479e2893f550cfda6b06' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/usun_post.tpl',
      1 => 1309533133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11288215014e0e41074f9542-33206569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1> USUWANIE POSTU </h1>
<table width="100%" cellspacing="0" cellpadding="10">
<tr bgcolor="#C2DFFF"> <th> Autor </th> <th> Post </th> <th> Data dodania </th> </tr>
<tr> <td> <?php echo $_smarty_tpl->getVariable('dane')->value['autor'];?>
 </td> <td><?php echo $_smarty_tpl->getVariable('dane')->value['tresc'];?>
</td><td><?php echo $_smarty_tpl->getVariable('dane')->value['data_dodania'];?>
</td></tr>
</table>
<p> czy na pewno chcesz usunąć?</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_post" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_post'];?>
">
	<input type="hidden" name="ilosc" value="<?php echo $_smarty_tpl->getVariable('ilosc_postow_w_watku')->value['ile'];?>
">
	<?php if ($_smarty_tpl->getVariable('ilosc_postow_w_watku')->value['ile']==1){?>
		<br>UWAGA! To jedyny post w tym wątku. Jego usunięcie spowoduje kasację wątku!
	<?php }?>
	<input type="submit" value="usuń">
</form>