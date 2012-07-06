<?php
	
	/**
     * Przeszukiwanie zawartości bazy
     *
     * @package wyszukaj_tresc.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	$strona['zawartosc']='wyszukaj_tresc';
	
	if(isset($_GET) && count($_GET)){
		
		$strona['status']['komunikaty']['bledy_formularza']=array();
		$wzorzec=array('szukane');
		$strona['dane']=pobierz_dane_z_formularza($_GET, $wzorzec);
		
		sprawdz_dane_wyszukaj($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec);
		if(!count($strona['status']['komunikaty']['bledy_formularza'])){
			
			unset($strona['status']['komunikaty']['bledy_formularza']);
				//wyszukanie postów pasujących do wzroca, wraz z ustaleniem ich autorów
			$strona['dane']['posty']=wyszukaj_z_bazy($sql, array('*'), 'post', array('tresc'), $strona['dane']['szukane']);
			$i=count($strona['dane']['posty'])-1;
			while($i>=0){
				$strona['dane']['posty'][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['posty'][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['posty'][$i]['autor']) || !count($strona['dane']['posty'][$i]['autor'])){
						$strona['dane']['posty'][$i]['autor']='Konto użytkownika usunięto';
					}
				$i--;
			}
				//wyszukanie postów pasujących do wzroca, wraz z ustaleniem ich autorów
			$strona['dane']['watki']=wyszukaj_z_bazy($sql, array('*'), 'watek', array('nazwa'), $strona['dane']['szukane']);
			$i=count($strona['dane']['watki'])-1;
			while($i>=0){
				$strona['dane']['watki'][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['watki'][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['watki'][$i]['autor']) || !count($strona['dane']['watki'][$i]['autor'])){
						$strona['dane']['watki'][$i]['autor']='Konto użytkownika usunięto';
					}
				$i--;
			}
				//jeżeli użytkownik jest zalogowany - //wyszukanie użytkowników pasujących do wzroca
			if(isset($_SESSION['uzytkownik'])){
				$strona['dane']['uzytkownicy']=wyszukaj_z_bazy($sql, array('*'), 'uzytkownik_forum', array('login', 'imie', 'nazwisko', 'email'), $strona['dane']['szukane']);
			}
			$strona['zawartosc']='wynik_wyszukiwania';
		}
	}	
	wyswietl_strone($strona);
?>
	