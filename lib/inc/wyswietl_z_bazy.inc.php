<?php
	
	/**
	*	Obsługa wyświetlania zawartości bazy.
	*
	* @package wyswietl_z_bazy.inc.php
	* @author Alicja Cyganiewicz
	* @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
	*/
	
	/**
	* Pobranie listy elementów z bazy danych.
	*
	* @param array $sql Konfiguracja połączenia z bazą danych
	* @param array $pola Tablica pól do pobrania
	* @param string $tabela	Nazwa tabeli do pobrania danych
	* @param array $warunki Tablica warunków
	* @param string	$opcje	Dodatkowe opcje
	* @return mixed Fałsz lub tablica asocjacyjna danych pobranych z bazy
	*/
 	function pobierz_dane_z_bazy(&$sql, $pola, $tabela, $warunki=array(), $opcje=''){
		
		$dane=array();
		if(!sql_polacz($sql)){
			return false;
		}
		else{
			$zapytanie=tworz_zapytanie_select($pola, $tabela, $warunki, $opcje);
			if($wynik=sql_zapytanie($zapytanie)){
				while($wiersz=mysql_fetch_assoc($wynik)){
					foreach($wiersz as $klucz => $wartosc){
						$wiersz[$klucz]=$wartosc;
					}
					$dane[]=$wiersz;
				}
				mysql_free_result($wynik);
				return $dane;
			}
			else{
				return false;
			}

		}
	}
	
	/**
     * Funkcja odpowiedzialna za przygotowanie zapytania typu SELECT.
     *
     * @param array $pola Lista pól do pobrania z bazy danych
     * @param string $tabela Tabela, z której pobieramy dane
     * @param array $warunki Tablica warunków jakie muszą spełniać pobierane dane
     * @param string $opcje Dodatkowe opcje SQL
     * @return string Gotowe Zapytanie SELECT
     */
    function tworz_zapytanie_select($pola, $tabela, $warunki = array(), $opcje='') {
       
        $zapytanie = '';
       
        $pola_sql = '';
       
        foreach($pola as $klucz=>$wartosc) {
           
            if(is_int($klucz)) {
                $pole = $wartosc;
            }
            else {
                $pole = $klucz . ' AS ' . $wartosc;
            }
           
            if (!$pola_sql) {
                $pola_sql .= $pole;
            }
            else {
                $pola_sql .= ','.$pole;
            }          
           
        }
       
        $warunki_sql = '';
        $opcje_sql = ($opcje)?' '.$opcje:'';
       
        if (count($warunki)) {
           
            foreach($warunki as $klucz => $wartosc) {
                if ($warunki_sql) {
                    $warunki_sql .= ' AND ';
                    $warunki_sql .= $klucz . '=\'' . $wartosc . '\'';
                }
                else {
                    $warunki_sql .= $klucz . '=\'' . $wartosc . '\'';
                }                  
            }            
           
            $zapytanie = 'SELECT ' . $pola_sql . ' FROM ' . $tabela . ' WHERE ' . $warunki_sql . ' ' . $opcje_sql;
           
        }
        else {
            $zapytanie = 'SELECT ' . $pola_sql . ' FROM ' . $tabela . ' ' . $opcje_sql;
        }
       
        return trim($zapytanie);
       
    }
	
	/**
	*	Ustalenie wartości  danego pola tabeli po id rekordu
	*
	* @param array $sql Konfiguracja połączenia z bazą danych
	* @param string $pole Pole którego wartości poszukujemy
	* @param string $pole_id Nazwa pola ID w danej tabeli
	* @param int $id ID jako kryterium wyszukiwania
	* @param string	$tabela Tabela ze spisem użytkowników
	* @return mixed Wartość konkretnego pola dla podanego ID
	*/
	function ustal_pole_po_id(&$sql, $pole, $pole_id, $id, $tabela){
		
		$wynik=array();
		$wynik=pobierz_dane_z_bazy($sql, array($pole), $tabela, array($pole_id => $id));
		if(count($wynik)==1){
			$wynik=current($wynik);
			$wynik=$wynik[$pole];
		}
	
		return $wynik;
	}
	
	/**
	*	Wyszukaj dane z bazy
	*
	* @param array $sql Konfiguracja połączenia z bazą danych
	* @param array $pola Pola do pobrania
	* @param string $tabela Tabela do przeszukania
	* @param array $pola_szuk Pola do przeszukania
	* @param string $szukana Format szukania
	* @return mixed Wynik operacji
	*/
	function wyszukaj_z_bazy(&$sql, $pola, $tabela, $pola_szuk, $szukana){
		
		$dane=array();
		if(!sql_polacz($sql)){
			return false;
		}
		else{
			$zapytanie=tworz_select_wyszukaj($pola, $tabela, $pola_szuk, $szukana);
			if($wynik=sql_zapytanie($zapytanie)){
				while($wiersz=mysql_fetch_assoc($wynik)){
					foreach($wiersz as $klucz => $wartosc){
						$wiersz[$klucz]=$wartosc;
					}
					$dane[]=$wiersz;
				}
				mysql_free_result($wynik);
				return $dane;
			}
			else{
				return false;
			}

		}
	}
	
	/**
	* 	Przygotowanie zapytania typu select + wyszukiwanie
	*
	* @param array $pola Pola do pobrania
	* @param string $tabela Tabela do przeszukania
	* @param array $pola_szuk Pola do przeszukania
	* @param string $szukana Format szukania
	* @return string Gotowe zapytanie
	*/
	function tworz_select_wyszukaj($pola, $tabela, $pola_szuk, $szukana){
		
		$zapytanie = '';
       
        $pola_sql = '';
		$warunki_sql='';
		//$szukana=mysql_real_escape_string($szukana);
		
        foreach($pola as $klucz=>$wartosc) {
           
            if(is_int($klucz)) {
                $pole = $wartosc;
            }
            else {
                $pole = $klucz . ' AS ' . $wartosc;
            }
           
            if (!$pola_sql) {
                $pola_sql .= $pole;
            }
            else {
                $pola_sql .= ','.$pole;
            }          
           
        }
             
        if (count($pola_szuk)) {
           
            foreach($pola_szuk as $wartosc) {
                if ($warunki_sql) {
                    $warunki_sql .= ' OR ';
                    $warunki_sql .='`'.$wartosc.'` LIKE \'%' . $szukana . '%\'';
                }
                else {
                    $warunki_sql ='`'.$wartosc.'` LIKE \'%' . $szukana . '%\'';
                }                  
            }            
        }
        
		$zapytanie = 'SELECT ' . $pola_sql . ' FROM ' . $tabela . ' WHERE ' . $warunki_sql;
           
        return trim($zapytanie);
       
    }