<?php
	
	/**
     * Edycja wątku
     *
     * @package edytuj_watek.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
		//sprawdzanie uprawnień -  administrator/moderator
	if(autoryzacja() && $_SESSION['uzytkownik']['typ']!='user'){
		
		$strona['status']['komunikaty']['bledy']=array();
		$strona['zawartosc']='edytuj_watek';
			
			//pobranie ID wątku do edycji i sprawdzenie jego poprawności
		if(isset($_GET['id_watek'])){
			
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, array('id_watek'));
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_watek', $strona['pomocnicze']['id_watek'], 'watek');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
						
					$wynik=pobierz_dane_z_bazy($sql, array('*'), 'watek', array('id_watek' => $strona['pomocnicze']['id_watek']));
					$strona['dane']=current($wynik);
			}		
		}
			//pobieramy podane dane do edycji wątku, sprawdzamy je
		elseif(isset($_POST) && count($_POST)){
			$strona['status']['komunikaty']['bledy_formularza']=array();
			$wzorzec=array('nazwa', 'id_watek');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);	
			sprawdz_dane_watek($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec);
			if(!count($strona['status']['komunikaty']['bledy_formularza'])){
				unset($strona['status']['komunikaty']['bledy_formularza']);
					//aktualizujemy dane
				if(aktualizuj($sql, 'watek', array('nazwa' => $strona['dane']['nazwa']), array('id_watek' => $strona['dane']['id_watek']))){
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
		$strona['status']['komunikaty']['bledy'][]='Brak uprawnień do edycji tego wątku';
		$strona['zawartosc']='blad';
	}

	wyswietl_strone($strona);
?>
		