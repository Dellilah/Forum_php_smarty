<?php
	
	/**
	*	Obsługa nawigacji
	*
	* @package strony.inc.php
	* @author Alicja Cyganiewicz
	* @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
	*/
	
	/**
     * Ustalenie liczby wszystkich stron.
     *
     * @param array $sql Konfiguracja połączenia z bazą danych
     * @param integer $maks_liczba_rekordow_strona Maksymalna liczba rekordów jakie mogą zostać wyświetlone na pojedynczej stronie
	 * @param string $tabela Tabela w której liczymy
	 * @param array $warunki Tablica warunków liczenia
     * @return integer Ilość wszystkich stron, na których będą prezentowane wyniki zapytania
     */
    function pobierz_ilosc_stron(&$sql, $maks_liczba_rekordow_strona, $tabela, $warunki=array()) {
   
        $ilosc_stron = 0;
   
        $wynik = pobierz_dane_z_bazy($sql, array('COUNT(*)' => 'ile'), $tabela, $warunki);
       
        if(count($wynik)) {
            $wynik = current($wynik);
            $ilosc_stron = ceil($wynik['ile']/$maks_liczba_rekordow_strona);
        }
   
        return $ilosc_stron;
    }
	
	/**
     * Ustawienie aktualnego numeru strony na podstawie danych pochodzących z tablicy $_GET i liczby wszystkich stron.
     *
     * @param integer $ilosc_stron Ilość wszystkich stron, na których będą prezentowane wyniki zapytania
     * @param integer $numer_strony Numer strony jaki został pobrany z tablicy $_GET
     */
    function wyznacz_numer_aktualnej_strony($ilosc_stron, $numer_strony) {
       
        $aktualna_strona = 1;
       
        if(ctype_digit($numer_strony) && ($numer_strony>0) && ($numer_strony<=$ilosc_stron)) {
            $aktualna_strona = $numer_strony;
        }
       
        return $aktualna_strona;
       
    }
	
	