<?php
    /**
     * Wylogowanie użytkownika.
     *
     * @package wylogowanie.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

    session_start();
    session_regenerate_id();

    include 'cms.h.php';
	
	if ( autoryzacja() ) {

        $strona['zawartosc'] = 'komunikat';
        $strona['status']['komunikaty']['operacje'][]
                    = 'Wylogowanie zakończone powodzeniem.';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');

        if ( isset($_SESSION['uzytkownik']) ) {
            unset($_SESSION['uzytkownik']);
            session_destroy();
        }

    }

    wyswietl_strone($strona);
?>