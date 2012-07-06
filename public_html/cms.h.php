<?php
    /**
     * Skrypt odpowiedzialny za załączenie wszystkich niezbędnych bibliotek.
     *
     * @package cms.h.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

    // konfiguracja developerska:
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors','on');
	ini_set('default_charset', 'utf-8');
   
    // załączenie bibliotek:
    include dirname(dirname(__FILE__)) . '/lib/inc/konfiguracja.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/szablony.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/obsluga.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/baza_danych.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/wyswietl_z_bazy.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/sprawdzanie_danych.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/dodaj_do_bazy.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/logowanie.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/edytuj_dane_baza.inc.php';
	include dirname(dirname(__FILE__)) . '/lib/inc/strony.inc.php';
?>