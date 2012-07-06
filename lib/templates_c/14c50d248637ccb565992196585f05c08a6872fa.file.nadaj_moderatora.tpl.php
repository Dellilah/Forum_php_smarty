<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:41:51
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/nadaj_moderatora.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18404208134e0e3f1f499a97-24566907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14c50d248637ccb565992196585f05c08a6872fa' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/nadaj_moderatora.tpl',
      1 => 1309551401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18404208134e0e3f1f499a97-24566907',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1> Nadawanie Uprawnień Moderatora </h1>
<p> czy na pewno chcesz nadać uprawnienia?</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_uz" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_uz'];?>
">
	<input type="submit" value="nadaj prawa">
</form>