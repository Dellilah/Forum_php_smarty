<?php

	/**
     * Obsługa dodawania treści w bazie
     *
     * @package dodaj_do_bazy.inc.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
	 
	 /**
	 * Funkcja pozwalająca na dodanie elementu do bazy 
	 *
	 * @param array $sql Konfiguracja połączenia z bazą danych
	 * @param string $tabela Tabela docelowa
	* @param array $dane Tablica danych do wpisania
	* @param array $pola Tablica pól do których wstawiamy dane
	 * @return boolean	Wynik operacji
	 */
	 function dodaj_wpis(&$sql, $tabela, $dane, $pola=array()){
		
		if(sql_polacz($sql)){
			$dane=sql_przygotuj_dane($dane);
			$zapytanie=tworz_insert($tabela, $dane, $pola);
			
			if(sql_zapytanie($zapytanie)){
				return true;
			}
			else return false;
		}
		else{
			return false;
		}
	}
	
	/**
	*
	* Funkcja tworząca poprawne zapytanie typu INSERT
	*
	* @param string $tabela Tabela docelowa
	* @param array $dane Tablica danych do wpisania
	* @param array $pola Tablica pól do których wstawiamy dane
	* @return string Gotowe zapytanie INSERT
	*/
	function tworz_insert($tabela, $dane, $pola=array()){
		
		$sql_pola='';
		$sql_kolumny='';
		if(count($pola)){
			foreach($pola as $pole){
				if($sql_kolumny==''){
					$sql_kolumny=$pole;
				}
				else{
					$sql_kolumny.=', '.$pole;
				}
				if($sql_pola==''){
					if($pole=='haslo'){
						$sql_pola='MD5(\''.$dane[$pole].'\')';
					}else{
					$sql_pola='\''.$dane[$pole].'\'';
					}
				}
				else {
					if($pole=='haslo'){
						$sql_pola.=', MD5(\''.$dane[$pole].'\')';
					}else{
					$sql_pola.=', \''.$dane[$pole].'\'';
					}
				}
			}
		}
		
		else{
			foreach($dane as $klucz => $wartosc){
				
				if($sql_pola==''){
					if($klucz=='haslo'){
						$sql_pola='MD5(\''.$wartosc.'\')';
					}else{
					$sql_pola='\''.$wartosc.'\'';
					}
				}
				else {
					if($klucz=='haslo'){
						$sql_pola.=', MD5(\''.$wartosc.'\')';
					}else{
					$sql_pola.=', \''.$wartosc.'\'';
					}
				}
			}
		}
		if($sql_kolumny!=''){
			$zapytanie='INSERT INTO '.$tabela.' ('.$sql_kolumny.') VALUES ('.$sql_pola.')';
		}
		else{
			$zapytanie='INSERT INTO '.$tabela.' VALUES ('.$sql_pola.')';
		}
		
		return $zapytanie;
	}

		
	 