<?php
	/**
     * Obsługa bazy danych.
     *
     * @package baza_danych.inc.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
	 
    /**
     * Utworzenie połączenia i wybór bazy danych.
     *
     * @param array $sql Tablica parametrów dla połączenia z bazą danych
     * @return mixed Wynik tworzenia połączenia.
     */
    function sql_polacz(&$sql) {

        if (!($sql['uchwyt'] = @mysql_connect($sql['host'], $sql['uzytkownik'], $sql['haslo']))) {
            return false;
        }
        elseif ( !@mysql_select_db($sql['baza']) ) {
            return false;
        }
        else {
            mysql_query('SET NAMES utf-8');
			mysql_query ('SET CHARACTER_SET utf8_unicode_ci');
            return $sql['uchwyt'];
        }
    }

    /**
     * Przygotowanie danych do zapisu do bazy.
     *
     * @param array $dane Tablica pól jakie mają zostać zapisane do bazy danych
     * @return array Tablica danych przygotowanych do zapisu do bazy
     */
    function sql_przygotuj_dane(&$dane) {
       
        $dane_do_zapisu = array();
       
        foreach ($dane as $klucz => $wartosc) {
            $dane_do_zapisu[$klucz] = mysql_real_escape_string($wartosc);
        }

        return $dane_do_zapisu;

    }

    /**
     * Wykonanie zapytania do bazy danych.
     *
     * @param string $zapytanie Zapytanie do bazy danych
     * @return integer Wynik zapytania do bazy danych
     */
    function sql_zapytanie($zapytanie) {
       
        if (!($wynik = @mysql_query($zapytanie))) {
            return false;
        }
        else {
            return $wynik;
        }

    } 