<?php

    /**
     * Zalogowanie użytkownika.
     *
     * @package logowanie.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
    session_start();
    session_regenerate_id();

    include 'cms.h.php';

    $strona['zawartosc'] = 'logowanie';
	
		//pobieramy dane do logowania, sprawdzmay ich poprawność
    if ( isset($_POST) && count($_POST)  ) {
       
        $wzorzec = array('login', 'haslo');
        $strona['dane'] = pobierz_dane_z_formularza($_POST, $wzorzec);
       
        $strona['status']['komunikaty']['bledy_formularza'] = array();

        sprawdz_formularz_logowania($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec);

        if (!count($strona['status']['komunikaty']['bledy_formularza'])) {
           
            unset($strona['status']['komunikaty']['bledy_formularza']);

            $dane_uzytkownika = loguj_uzytkownika($sql, $strona['dane']);
           
            if(count($dane_uzytkownika)) {

					// autoryzacja powiodła się, a zatem rejestrujemy dane w sesji:
                $_SESSION['uzytkownik'] = $dane_uzytkownika;
               
					// i przekierowujemy użytkownika do strony z której trafił na logowanie, bądź na główną
				if(isset($_SESSION['ostatnia'])){
					$powrot=$_SESSION['ostatnia'];
				}
				else{
					$powrot='glowna_watki.php';
				}
				header('Location:'.$powrot);
                exit;
               
            }
            else {
                $strona['status']['komunikaty']['bledy'][] = 'Nieprawidłowe dane autoryzacyjne.';
                $strona['zawartosc'] = 'blad';   
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
            }
           
        }

    }

    wyswietl_strone($strona);
?>