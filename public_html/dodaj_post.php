<?php
	
	/**
     * Dodawanie postu
     *
     * @package dodaj_post.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
			
		//sprawdzenie stanu zalogowania - dodawanie postów tylko dla zalogowanych
	if(autoryzacja()){	
		$strona['zawartosc']='dodaj_post';
		$strona['status']['komunikaty']['bledy_formularza']=array();
		$strona['status']['komunikaty']['bledy']=array();
		
			//sprawdzamy czy zostały wysłane dane z formularza POST
		if(isset($_POST) && count($_POST)){
			
			//pobieramy id wątka do którego wpisujemy post, oraz treśc postu, sprawdzamy dane, jeżeli poprawne
			//odczytujemy autora i dodajemy wpis
			$wzorzec=array('tresc', 'id_watek');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
	
			sprawdz_dane_post($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec);
			
			if(!count($strona['status']['komunikaty']['bledy_formularza'])){
				unset($strona['status']['komunikaty']['bledy_formularza']);
				$pola=array('tresc', 'uzytkownik_forum_id_uz', 'watek_id_watek');
				$strona['dane']['uzytkownik_forum_id_uz']=$_SESSION['uzytkownik']['id_uz'];
				$strona['dane']['watek_id_watek']=$strona['dane']['id_watek'];
				
				if(dodaj_wpis($sql, 'post', $strona['dane'], $pola)){
					$strona['status']['komunikaty']['operacje'][]='Dodawanie postu powiodło się';
					$strona['zawartosc']='komunikat';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				else{
					$strona['status']['komunikaty']['bledy'][]='Nie udało się dodać POSTU';	
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
			}
		}
			//jeżeli nic nie przyszło z POST-a to sprawdzamy, czy został przesłany wątek
			//do którego chcemy dodać wpis i czy istnieje on w bazie
		elseif(isset($_GET['id_watek'])){
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, array('id_watek'));
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_watek', $strona['pomocnicze']['id_watek'], 'watek');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
		}
		else{
			header('Location:glowna_watki.php');
		}
	}
	
	wyswietl_strone($strona);
?>
