<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:30:31
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/administracja.tpl" */ ?>
<?php /*%%SmartyHeaderCode:741243924e0e3c77f29859-00255529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4ab3147b888d1f8b71cf4dc2bcaf372d518cf07' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/administracja.tpl',
      1 => 1309551496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '741243924e0e3c77f29859-00255529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<p align="center"> Panel Administracyjny </p>
<ul>
	<li><a href="moderacja_uzytkownikow.php"> Moderacja użytkowników (Lista użytkowników : <?php if ($_SESSION['uzytkownik']['typ']=='admin'){?>nadaj prawa moderatora,<?php }?> usuń konto) </a></li>
	<li><a href="moderacja_watkow.php"> Moderacja wątków (Lista wątków: edytuj, usuń) </a></li>
	<li><a href="moderacja_postow.php"> Moderacja postow (Lista wszystkich postów: edytuj, usuń) </a></li>
</ul>