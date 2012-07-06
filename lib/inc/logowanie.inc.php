<?php
    /**
     * Funkcje do logowania, dodanie użytkownika
     *
     * @package logowanie.inc.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

    /**
     * Logowanie użytkownika w systemie.
     *
     * @param array $sql Konfiguracja połączenia z bazą danych  
     * @param array $dane Tablica z danymi pochodzącymi z formularza logowania
     * @return array Wynik autoryzacji
     */
    function loguj_uzytkownika(&$sql, $dane) {

        $wynik
            = pobierz_dane_z_bazy($sql, array('*'), 'uzytkownik_forum', array('login' => $dane['login'], '(haslo=md5(\''.$dane['haslo'].'\'))' => 1));      
       
        if(count($wynik)!=1) {
            return array();
        }
        else {
            return current($wynik);
        }

    }
	
	/**
     * Sprawdzenie czy użytkownik jest zalogowany.
     *
     * @return mixed Wynik operacji
     */
     function autoryzacja() {
       
        if ( isset($_SESSION['uzytkownik'])  && count($_SESSION['uzytkownik']) ) {
            return true;    
        }
        else {
            // przekierowujemy użytkownika na stronę logowania:
            header('Location:logowanie.php');
            exit;
        }
       
     }
	