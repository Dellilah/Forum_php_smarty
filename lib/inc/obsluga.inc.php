<?php
	/**
     * Podstawowa obsługa aplikacji.
     *
     * @package obsluga.inc.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
	 
	 /**
     * Pobranie zmiennych z formularza oraz przygotowanie do przetworzenia przez skrypt.
     *
     * @param array $formularz Tablica zawierająca dane pochodzące z formularza
     * @param array $wzorzec Tablica zawierająca informacje jakie pola w formularzu mają zostać przetworzone
     * @return array Tablica przetworzonych pól
     */
    function pobierz_dane_z_formularza(&$formularz, $wzorzec) {
   
        $dane = array();
   
        foreach ($wzorzec as $pole) {
            if ( isset($formularz[$pole])
                && $formularz[$pole] != '' ) {
                $dane[$pole] = trim($formularz[$pole]);
            }
            else {
                $dane[$pole] = '';
            }
        }
       
        return $dane;
   
    }
		
	/**
	 * Wstawienie do tablicy błędów formularza informacji o błędnie wypełnionym polu wraz z opisem.
	 *
	 * @param array $bledy_formularza Tablica zawierająca ewentualne błędy formularza
	 * @param string $pole Nazwa błędnie wypełnionego pola
	 * @param string $opis_bledu Opis błedu
	 */
	function blad_formularza(&$bledy_formularza, $pole, $opis_bledu='Nieprawidłowa wartość w powyższym polu') {
		$bledy_formularza = $bledy_formularza + array($pole => $opis_bledu);
	}
	
	