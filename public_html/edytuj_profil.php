<?php
	 
	/**
	 *	Edycja profilu
	 *
     * @package edytuj_profil.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	$strona['zawartosc']='edytuj_profil';
	if(autoryzacja()){
					
		$strona['status']['komunikaty']['bledy']=array();			
		if(isset($_GET['id_uz']) && count($_GET)){
			
			$wzorzec=array('id_uz');
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, $wzorzec);
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['pomocnicze']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				
			}
			else{
				//sprawdz uprawnienia do edycji profilu
				 if($strona['pomocnicze']['id_uz']!=$_SESSION['uzytkownik']['id_uz']){
					$strona['status']['komunikaty']['bledy'][]='Brak uprawnień do edycji tego profilu';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				 }
				 else{
					$strona['dane']=current(pobierz_dane_z_bazy($sql, array('*'), 'uzytkownik_forum', array('id_uz' => $_SESSION['uzytkownik']['id_uz'])));
					$strona['dane']['poprzedni_email']=$strona['dane']['email'];
						//rozdzielamy z powrotem maila na 2 części
					$strona['pomocnicze']['email']=explode('@',$strona['dane']['email']);
					$strona['dane']['mail']=$strona['pomocnicze']['email'][0];
					$strona['dane']['domena']=$strona['pomocnicze']['email'][1];
						//rozdzielamy datę
					if(isset($strona['dane']['Data_ur'])){
						$strona['pomocnicze']['data']=explode('-',$strona['dane']['Data_ur']);
						$strona['dane']['rok']=$strona['pomocnicze']['data'][0];
						$strona['dane']['miesiac']=$strona['pomocnicze']['data'][1];
						$strona['dane']['dzien']=$strona['pomocnicze']['data'][2];
					}
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
				}
			}
		}
			//pobieramy nowe dane do wpisania w bazę 
		elseif(isset($_POST) && count($_POST)){
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
			$strona['status']['komunikaty']['bledy_formularza']=array();
			$wzorzec=array('id_uz', 'poprzedni_email', 'login', 'haslo', 'haslopowt', 'imie', 'nazwisko', 'mail', 'domena', 'podpis', 'dzien', 'miesiac', 'rok','usuwanie');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
			if(isset($strona['dane']['usuwanie']) && $strona['dane']['usuwanie']=='tak'){
				header('Location:usun_konto.php?id_uz='.$strona['dane']['id_uz']);
			}
			else{
				$wzorzec_wymagane=array('imie', 'nazwisko', 'mail', 'domena');
				sprawdz_dane_rejestracja($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec_wymagane);

				//jeżeli użytkownik decyduje sie na zmianę hasła
				if(isset($strona['dane']['haslo']) && $strona['dane']['haslo']!=''){
					sprawdz_pole_haslo($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], 'haslo');
					sprawdz_pole_haslo($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], 'haslopowt');
					porownaj_pola($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], 'haslo', 'haslopowt');
				}
				
				if(!isset($strona['status']['komunikaty']['bledy_formularza']['email'])){
					$strona['dane']['email']=$strona['dane']['mail'].'@'.$strona['dane']['domena'];
					if($strona['dane']['poprzedni_email']!=$strona['dane']['email'] && sprawdz_wystepowanie_danej($sql, 'uzytkownik_forum', 'email', $strona['dane']['email'])){
						blad_formularza($strona['status']['komunikaty']['bledy_formularza'], 'email', 'Użytkownik o podanym mailu jest już zarejestrowany');
					}
				}
				
				if(!count($strona['status']['komunikaty']['bledy_formularza'])){
					
					unset($strona['status']['komunikaty']['bledy_formularza']);
							
					if($strona['dane']['rok']!='' && $strona['dane']['dzien']!='' && $strona['dane']['miesiac']!=''){
						$strona['dane']['Data_ur']=$strona['dane']['rok'].'-'.$strona['dane']['miesiac'].'-'.$strona['dane']['dzien'];
					}
					else{
						$strona['dane']['Data_ur']='0000-00-00';
					}
					
						//jeżeli zmieniamy hasło
					if(isset($strona['dane']['haslo']) && $strona['dane']['haslo']!=''){
						if(aktualizuj($sql, 'uzytkownik_forum', array('imie' => $strona['dane']['imie'], 
																'nazwisko' => $strona['dane']['nazwisko'],
																'haslo' => $strona['dane']['haslo'],
																'email' => $strona['dane']['email'],
																'podpis' => $strona['dane']['podpis'],
																'Data_ur' => $strona['dane']['Data_ur']), array('id_uz' => $strona['dane']['id_uz']))){
						$strona['status']['komunikaty']['operacje'][]='Pomyślna aktualizacja';
						$strona['zawartosc']='komunikat';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
						}
						else{
							$strona['status']['komunikaty']['bledy'][]='Nie udało się';
							$strona['zawartosc']='blad';
							header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
						}						
					}elseif(aktualizuj($sql, 'uzytkownik_forum', array('imie' => $strona['dane']['imie'], 
																'nazwisko' => $strona['dane']['nazwisko'],
																'email' => $strona['dane']['email'],
																'podpis' => $strona['dane']['podpis'],
																'Data_ur' => $strona['dane']['Data_ur']), array('id_uz' => $strona['dane']['id_uz']))){
						$strona['status']['komunikaty']['operacje'][]='Pomyślna aktualizacja';
						$strona['zawartosc']='komunikat';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
					}
					else{
						$strona['status']['komunikaty']['bledy'][]='Nie udało się';
						$strona['zawartosc']='blad';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
					}
				}
			}
		}
		else{
			blad_formularza($strona['status']['komunikaty']['bledy'], '', 'Nie wybrano uzytkownika do moderacji');
			$strona['zawartosc']='blad';
			header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
		
		}
	}
	else{
		$strona['status']['komunikaty']['operacje'][]='Dostępne tylko dla zalogowanych użytkowników';
		$strona['zawartosc']='komunikat';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
	}
	
	wyswietl_strone($strona);
?>