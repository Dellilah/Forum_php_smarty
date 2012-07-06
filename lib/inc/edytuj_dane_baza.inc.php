<?php
	
	/**
	*	Edycja danych w bazie
	*
	* @package edytuj_dane_baza.inc.php
	* @author Alicja Cyganiewicz
	* @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
	
	/**
	* Funkcja aktualizująca
	* 
	* @param array $sql Konfiguracja połączenia z bazą danych
	* @param string $tabela Tabela do aktualizacji
	* @param array $pola Tablica pól do aktualizacji wraz z nowymi wartościami
	* @param array $warunki Tablica warunków aktualizacji
	* @return boolean Wynik operacji aktualizacji
	*/
	function aktualizuj(&$sql, $tabela, $pola, $warunki=array()){
		
		if(!sql_polacz($sql)){
			return false;
		}
		else{
			$pola=sql_przygotuj_dane($pola);
			$zapytanie=tworz_update($tabela, $pola, $warunki);
			if($wynik=sql_zapytanie($zapytanie)){
				return true;
			}
			else{
				return false;
			}
		}
	}
	
	/**
	* Funkcja tworząca poprawne zapytanie typu UPDATE
	*
	* @param string $tabela Tabela do edycji
	* @param array $pola Tablica pól do edycji
	* @param array $warunki	Tablica warunków
	* @return string Gotowe zapytanie UPDATE
	*/
	function tworz_update($tabela, $pola, $warunki=array()){
		
		$sql_pola='';
				
		foreach($pola as $klucz => $wartosc){
				if($sql_pola=='')
				{   if($klucz=='haslo'){
							$sql_pola='`'.$klucz.'`=MD5(\''.$wartosc.'\')';
					}
					else{
					$sql_pola='`'.$klucz.'`=\''.$wartosc.'\'';
					}
				}
				else{
					if($klucz=='haslo'){
						$sql_pola.=',`'.$klucz.'`=MD5(\''.$wartosc.'\')';
					}
					else{
						$sql_pola.=',`'.$klucz.'`=\''.$wartosc.'\'';
					}
				}
		}
		$sql_warunki='';
		if(count($warunki)){
			foreach($warunki as $klucz => $wartosc){
				if($sql_warunki==''){
					$sql_warunki=$klucz.'=\''.$wartosc.'\'';
				}
				else{
					$sql_warunki.=' AND '.$klucz.'=\''.$wartosc.'\'';
				}
			}
		}
		
		$zapytanie='UPDATE '.$tabela.' SET '.$sql_pola.' WHERE '.$sql_warunki;
		
		return $zapytanie;
	}
	
	
	/**
	* Funkcja usuwająca dane z bazy
	*
	* @param array $sql Konfiguracja połączenia z bazą danych
	* @param string $tabela Tabela do aktualizacji
	* @param array $warunki Tablica warunków usuwania
	* @return boolean	Wynik usuwania danych z bazy
	*/
	function usun_dane(&$sql, $tabela, $warunki){
		
		if(!sql_polacz($sql)){
			return false;
		}
		else{
			$zapytanie=tworz_delete($tabela, $warunki);
			if($wynik=sql_zapytanie($zapytanie)){
				return true;
			}
			else{
				return false;
			}
		}
	}
	
	/**
	* Funkcja tworząca poprawne zapytanie typu INSERT
    *
	* @param string $tabela Tabela do aktualizacji
	* @param array $warunki Tablica warunków usuwania
	* @return string Gotowe zapytanie DELETE
	*/
	function tworz_delete($tabela, $warunki){
		
		$sql_warunki='';
		if(count($warunki)){
			foreach($warunki as $klucz => $wartosc){
				if($sql_warunki==''){
					$sql_warunki=$klucz.'=\''.$wartosc.'\'';
				}
				else{
					$sql_warunki.=' AND '.$klucz.'=\''.$wartosc.'\'';
				}
			}
		}
		
		$zapytanie='DELETE FROM `'.$tabela.'` WHERE '.$sql_warunki;
		return $zapytanie;
	}
	