<?php
	 
	 /**
	 *	Pobieranie danych profilu
	 *
     * @package pokaz_profil.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	if(autoryzacja()){
		$strona['zawartosc']='pokaz_profil';
		$strona['status']['komunikaty']['bledy']=array();
			
			//pobieramy i sprawdzamy ID użytkownika do pobrania profilu
		if(isset($_GET) && count($_GET)){
			$wzorzec=array('id_uz');
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, $wzorzec);
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['pomocnicze']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
					//pobieramy dane o użytkowniku
				$strona['dane']=current(pobierz_dane_z_bazy($sql, array('*'), 'uzytkownik_forum', array('id_uz' => $strona['pomocnicze']['id_uz'])));
				if(!count($strona['dane'])){
					$strona['status']['komunikaty']['bledy'][]='Błąd pobierania danych';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
					//określamy ilośc napisanych przez niego postów
				$ilosc_postow=current(pobierz_dane_z_bazy($sql, array('COUNT(*)'=>'ilosc_postow'), 'post', array('uzytkownik_forum_id_uz' => $strona['dane']['id_uz'])));
				$strona['dane']['ilosc_postow']=$ilosc_postow['ilosc_postow'];
			}
		}
		else{
			$strona['status']['komunikaty']['bledy'][]='Nie wybrano użytkownika';
			$strona['zawartosc']='blad';
			header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
		}
	}
	
	wyswietl_strone($strona);
?>
		
	
					