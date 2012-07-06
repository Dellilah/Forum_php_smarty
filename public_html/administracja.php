<?php

	/**
     * Panel Administracyjny
     *
     * @package administracja.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
		//sprawdzenie dostępu do panelu administracyjnego
	$_SESSION['ostatnia']='administracja.php';
	if(autoryzacja() && $_SESSION['uzytkownik']['typ']!='user'){
		$strona['zawartosc']='administracja';
	}
	else{
		$strona['status']['komunikaty']['bledy'][]='Panel administracyjny dostępny jest jedynie dla administratorów/moderatorów';
		$strona['zawartosc']='blad';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
	}
	
	wyswietl_strone($strona);
?>