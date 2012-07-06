<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:29:16
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5929544884e0e3c2c2513e6-14882709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d2c3bd1e48dc47e14e03d8b0d4eb17b5ee9f254' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/menu.tpl',
      1 => 1309552040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5929544884e0e3c2c2513e6-14882709',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


	<a href="wyszukaj_tresc.php"> Szukaj</a> ::
	<a href="lista_uzytkownikow.php"> Użytkownicy</a> ::
	<a href="edytuj_profil.php?id_uz=<?php if (isset($_SESSION['uzytkownik']['id_uz'])){?><?php echo $_SESSION['uzytkownik']['id_uz'];?>
<?php }?>"> Profil</a> ::
	<?php if (isset($_SESSION['uzytkownik'])){?>
			Jesteś zalogowany jako <b>
				<?php echo $_SESSION['uzytkownik']['login'];?>
</b>
			<a href="wylogowanie.php"> Wyloguj </a> 
			<?php if ($_SESSION['uzytkownik']['typ']!='user'){?>
			:: <a href="administracja.php"> Panel Administracyjny </a>
			<?php }?>
	<?php }else{ ?>
			Nie jesteś zalogowany
			<a href="logowanie.php"> Zaloguj </a> 
			lub
			<a href="rejestracja.php"> Zarejestruj </a>
	<?php }?>
