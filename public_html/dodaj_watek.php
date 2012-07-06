<?php
	
	/**
     * Dodawanie wątku
     *
     * @package dodaj_watek.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	$_SESSION['ostatnia']='dodaj_watek.php';
		
		//sprawdzenie stanu zalogowania - dodawanie wątków tylko dla zalogowanych
	if(autoryzacja()){	
		$strona['zawartosc']='dodaj_watek';
		$strona['status']['komunikaty']['bledy_formularza']=array();
		
			//sprawdzamy czy zostały wysłane dane z formularza POST
		if(isset($_POST) && count($_POST)){
			
			//pobieramy nazwę tworzonego wątka, oraz treśc postu, który od razu ma zostać dodany (wątek nie może być pusty)
			//sprawdzamy dane, jeżeli poprawne odczytujemy autora i dodajemy wpis
			$wzorzec=array('nazwa', 'tresc');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
					
			$wzorzec1=array('nazwa');
			$wzorzec2=array('tresc');
			sprawdz_dane_watek($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec1);
			sprawdz_dane_post($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec2);
			
			if(!count($strona['status']['komunikaty']['bledy_formularza'])){
				unset($strona['status']['komunikaty']['bledy_formularza']);
				$strona['dane']['uzytkownik_forum_id_uz']=$_SESSION['uzytkownik']['id_uz'];
				$pola=array('nazwa', 'uzytkownik_forum_id_uz');
				
					//jeżeli uda się dodać wątek sczytujemy jego id i dodajemy w tymże wątku posta
				if(dodaj_wpis($sql, 'watek', $strona['dane'], $pola)){
				
					$strona['dane']['watek_id_watek']=current(current(pobierz_dane_z_bazy($sql, array('id_watek'), 'watek', array('nazwa' => $strona['dane']['nazwa']))));
					
					$pola_post=array('tresc', 'uzytkownik_forum_id_uz', 'watek_id_watek');
					if(dodaj_wpis($sql, 'post', $strona['dane'], $pola_post)){
						$strona['status']['komunikaty']['operacje'][]='Dodawanie wątku wraz z postem powiodło się';
						$strona['zawartosc']='komunikat';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
					}
					else{
						$strona['status']['komunikaty']['bledy'][]='Nie udało się dodać POSTU';	
						$strona['zawartosc']='blad';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
					}
				}
				else{
					$strona['status']['komunikaty']['bledy'][]='Nie udało się dodać WĄTKU';	
					$strona['zawartosc']='blad';
				}
			}
		}	
	}
	
	wyswietl_strone($strona);
?>
			
		
		
		
	 