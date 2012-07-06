<?php
	 
	 /**
	 *	Rejestracja Użytkownika
	 *
     * @package rejestracja.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	$strona['zawartosc']='rejestracja';
	
	$strona['dni']=array();
	$strona['miesiace']=array();
	$strona['lata']=array();
	for($i=1; $i<32; $i++){
		$strona['dni'][]=$i;
	}
	for($i=1; $i<13; $i++){
		$strona['miesiace'][]=$i;
	}
	for($i=2004; $i>1929; $i--){
		$strona['lata'][]=$i;
	}
	
	if(isset($_POST) && count($_POST)){
		
		$strona['status']['komunikaty']['bledy_formularza']=array();
		
		$wzorzec=array('login', 'haslo', 'haslopowt', 'imie', 'nazwisko', 'mail', 'domena', 'podpis', 'dzien', 'miesiac', 'rok');
		$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
		
			//wzorzec pól WYMAGANYCH
		$wzorzec_wymagane=array('login', 'imie', 'nazwisko', 'mail', 'domena');
			//sprawdzamy poprawnosc wprowadzonych danych
		sprawdz_dane_rejestracja($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec_wymagane);
		sprawdz_pole_haslo($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], 'haslo');
		sprawdz_pole_haslo($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], 'haslopowt');
		porownaj_pola($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], 'haslo', 'haslopowt');
		
			//sprawdzamy ich poprawnosc pod wzgledem unikatowości (e-mail, login)
		if(!isset($strona['status']['komunikaty']['bledy_formularza']['login'])){
			if(sprawdz_wystepowanie_danej($sql, 'uzytkownik_forum', 'login', $strona['dane']['login'])){
				blad_formularza($strona['status']['komunikaty']['bledy_formularza'], 'login', 'Użytkownik o podanym loginie jest już zarejestrowany');
			}
		}
		
		if(!isset($strona['status']['komunikaty']['bledy_formularza']['email'])){
				//scalamy email
			$strona['dane']['email']=$strona['dane']['mail'].'@'.$strona['dane']['domena'];
			if(sprawdz_wystepowanie_danej($sql, 'uzytkownik_forum', 'email', $strona['dane']['email'])){
				blad_formularza($strona['status']['komunikaty']['bledy_formularza'], 'email', 'Użytkownik o podanym mailu jest już zarejestrowany');
			}
		}	
			
		if(!count($strona['status']['komunikaty']['bledy_formularza'])){
				
			unset($strona['status']['komunkaty']['bledy_formularza']);
				
				//ustalamy listę pól do których będziemy wpisywali dane
			$pola=array('login', 'haslo', 'imie', 'nazwisko', 'email', 'typ');
			
			if($strona['dane']['rok']!='' && $strona['dane']['dzien']!='' && $strona['dane']['miesiac']!=''){
					//scalamy datę
				$strona['dane']['Data_ur']=$strona['dane']['rok'].'-'.$strona['dane']['miesiac'].'-'.$strona['dane']['dzien'];
				$pola[]='Data_ur';
			}
			if($strona['dane']['podpis']!=''){
				$pola[]='podpis';
			}
			
			$strona['dane']['typ']='user';
			
			if(dodaj_wpis($sql, 'uzytkownik_forum', $strona['dane'], $pola)){
				
				$strona['status']['komunikaty']['operacje'][]='Rejestracja użytkownika powiodła się!';
				$strona['zawartosc']='komunikat';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
				
				$strona['status']['komunikaty']['bledy'][]='Rejestracja użytkownika nie powiodła się.';
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
		}
	}
	
	wyswietl_strone($strona);
?>
		
			
			
			
		
