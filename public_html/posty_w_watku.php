<?php
	
	/**
     * Wyświetlenie postów danego wątku
     *
     * @package posty_w_watku.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	$strona['zawartosc']='posty_w_watku';
	$strona['maks_liczba_rekordow_strona'] = 4;
	$strona['status']['komunikaty']['bledy']=array();
	
		//pobieramy ID wątka do wyświetlenia postów, oraz sprawdzamy jego poprawność
	if(isset($_GET['id_watek'])){
				
		$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, array('id_watek'));
		sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_watek', $strona['pomocnicze']['id_watek'], 'watek');
		if(count($strona['status']['komunikaty']['bledy'])){
			$strona['zawartosc']='blad';
			header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
		}
		else{	
				//zmienna	$_SESSION['ostatnia'] pozwoli na przekierowanie użytkownika
				//ustalamy dane go nawigacji
			$_SESSION['ostatnia']='posty_w_watku.php?id_watek='.$strona['pomocnicze']['id_watek'];
			$strona['ilosc_stron']
				= pobierz_ilosc_stron(&$sql, $strona['maks_liczba_rekordow_strona'], 'post', array('watek_id_watek' => $strona['pomocnicze']['id_watek']));
			if(isset($_GET['strona']) && ctype_digit($_GET['strona'])) {
				$aktualna_strona = $_GET['strona'];
			}
			else {
				$aktualna_strona = 1;
			}
			
			if(($strona['ilosc_stron']>0)) {
			   
				$strona['aktualna_strona']
					= wyznacz_numer_aktualnej_strony($strona['ilosc_stron'], $aktualna_strona);
					
					//jeżeli użytkownik chce przejść do ostatniego postu- ostatnia strona z danymi 
				if(isset($_GET['ost'])){
					$strona['aktualna_strona']=$strona['ilosc_stron'];
				}
					//pobieramy określona porcję danych
				$strona['dane']['posty']=pobierz_dane_z_bazy($sql, 
									array('id_post', 'data_dodania', 'tresc', 'uzytkownik_forum_id_uz'),
									'post', 
									array('watek_id_watek' => $strona['pomocnicze']['id_watek']),
									'ORDER BY `data_dodania` LIMIT ' . (($strona['aktualna_strona']-1)*$strona['maks_liczba_rekordow_strona']) . ',' . $strona['maks_liczba_rekordow_strona']);
				if(!count($strona['dane']['posty'])){
				$strona['status']['komunikaty']['bledy'][]='Brak postów do wyświetlenia';
				}
					//ustalamy loginy autorów
				$i=count($strona['dane']['posty'])-1;
				while($i>=0){
					$strona['dane']['posty'][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['posty'][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['posty'][$i]['autor']) || !count($strona['dane']['posty'][$i]['autor'])){
						$strona['dane']['posty'][$i]['autor']='Konto użytkownika usunięto';
					}
					$i--;
				}
					//ustalamy nazwę wątku po ID do wyświetlenia na górze strony
				$strona['pomocnicze']['watek_nazwa']=ustal_pole_po_id($sql, 'nazwa', 'id_watek', $strona['pomocnicze']['id_watek'], 'watek');
			
			}
		$strona['link']=$_SERVER['PHP_SELF'].'?id_watek='.$strona['pomocnicze']['id_watek'].'&strona=';
		}		
	}
	else{
		header('Location:glowna_watki.php');
	}
	
	wyswietl_strone($strona);
?>