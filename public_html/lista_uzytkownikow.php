<?php
	
	/**
     * Lista użytkowników
     *
     * @package lista_uzytkownikow.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
		
		//ustalenie strony do której ma wrócić użytkownik po zalogowaniu
	$_SESSION['ostatnia']='lista_uzytkownikow.php';
		
		//sprawdzanie uprawnień-dla zalogowanych
	if(autoryzacja()){
		$strona['zawartosc']='lista_uzytkownikow';
			//dane do nawigacji
		$strona['maks_liczba_rekordow_strona'] = 2;	
		$strona['ilosc_stron']
			= pobierz_ilosc_stron(&$sql, $strona['maks_liczba_rekordow_strona'], 'uzytkownik_forum');
		if(isset($_GET['strona']) && ctype_digit($_GET['strona'])) {
			$aktualna_strona = $_GET['strona'];
		}
		else {
			$aktualna_strona = 1;
		}
		  
		if(($strona['ilosc_stron']>0)) {
		 
			$strona['aktualna_strona']
				= wyznacz_numer_aktualnej_strony($strona['ilosc_stron'], $aktualna_strona);
				
				//pobranie porcji danych
			$strona['dane']['uzytkownicy']=array();
			if($strona['dane']['uzytkownicy']=pobierz_dane_z_bazy($sql,
											array('typ', 'id_uz', 'login', 'imie', 'nazwisko'),
											'uzytkownik_forum',
											array(),
											'ORDER BY `login` LIMIT ' . (($strona['aktualna_strona']-1)*$strona['maks_liczba_rekordow_strona']) . ',' . $strona['maks_liczba_rekordow_strona'])){
				
				if(!count($strona['dane']['uzytkownicy'])){
					$strona['status']['komunikaty']['bledy'][]='Brak użytkowników do wyświetlenia';
				}
					
			}
			else{
				$strona['status']['komunikaty']['bledy'][]='Błąd połączenia z bazą';
			}
			$strona['link']=$_SERVER['PHP_SELF'].'?strona=';
			
		}
	}
	wyswietl_strone($strona);
?>