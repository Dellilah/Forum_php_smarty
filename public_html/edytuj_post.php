<?php
	
	/**
     * Edycja postu
     *
     * @package edytuj_post.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
		//sprawdzenie stanu zalogowania - edycja postów tylko dla zalogowanych
	if(autoryzacja()){
		$strona['zawartosc']='edytuj_post';
		$strona['status']['komunikaty']['bledy']=array();
			
			//sprawdzamy czy zostało podane id posta do edycji, oraz czy występuje w bazie
		if(isset($_GET['id_post'])){
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, array('id_post'));
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_post', $strona['pomocnicze']['id_post'], 'post');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
				
				//sprawdzamy uprawnienia do edycji(autor/administrator/moderator)-
				//ustalamy id autora po id postu, sprawdzmy czy zgadza się z danymi zalogowanego
				//jeżeli są uprawnienia pobieramy dane postu, które będziemy chcieli edytować (muszą pojawić sie w formularzu edycji)
				$strona['pomocnicze']['id_autor']=ustal_pole_po_id($sql, 'uzytkownik_forum_id_uz', 'id_post', $strona['pomocnicze']['id_post'], 'post');
				if($strona['pomocnicze']['id_autor']!=$_SESSION['uzytkownik']['id_uz'] && $_SESSION['uzytkownik']['typ']=='user'){
					$strona['status']['komunikaty']['bledy'][]='Brak uprawnień do edycji tego postu';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				else{
					$wynik=pobierz_dane_z_bazy($sql, array('*'), 'post', array('id_post' => $strona['pomocnicze']['id_post']));
					$strona['dane']=current($wynik);
				}
			}
		}
			//sprawdzamy i pobieramy dane z formularza POST - tresc wyedytowana, oraz id_edytowanego posta
			//sprawdzamy dane, jeżeli poprawne- dokonujemy atualizacji
		elseif(isset($_POST) && count($_POST)){
			$strona['status']['komunikaty']['bledy_formularza']=array();
			$wzorzec=array('tresc', 'id_post');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);	
						
			sprawdz_dane_post($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec);
			if(!count($strona['status']['komunikaty']['bledy_formularza'])){
				unset($strona['status']['komunikaty']['bledy_formularza']);
				if(aktualizuj($sql, 'post', array('tresc' => $strona['dane']['tresc']), array('id_post' => $strona['dane']['id_post']))){
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
	
	wyswietl_strone($strona);
?>