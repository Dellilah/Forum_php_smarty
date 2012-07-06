<?php
	
	/**
     * Administracja : Nadawanie uprawnień moderatora
     *
     * @package nadaj_moderatora.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	 
	 session_start();
	 session_regenerate_id();
	 
	 include 'cms.h.php';
		//sprawdzamy uprawnienia- zalogowany administrator
	 if(autoryzacja() && $_SESSION['uzytkownik']['typ']=='admin'){
		$strona['zawartosc']='nadaj_moderatora';
		$strona['status']['komunikaty']['bledy']=array();
			
			//pobieramy ID użytkownika do nadania praw, sprawdzamy
		if(isset($_GET) && count($_GET)){
			
			$wzorzec=array('id_uz');
			$strona['dane']=pobierz_dane_z_formularza($_GET, $wzorzec);
			
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['dane']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
		}
			//pobieramy decyzję dotyczącą nadania użytkownikowi (ID) praw, sprawdzamy
		elseif(isset($_POST) && count($_POST)){
			
			$strona['status']['komunikaty']['bledy']=array();
          
			$wzorzec=array('id_uz', 'decyzja');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['dane']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
				//jeżeli nadanie potwierdzone- aktualizujemy TYP wskazanego użytkownika
			elseif($strona['dane']['decyzja']=='tak'){
				if(aktualizuj($sql, 'uzytkownik_forum', array('typ' => 'moderator'), array('id_uz' =>$strona['dane']['id_uz']))){
					$strona['status']['komunikaty']['operacje'][]='Pomyślne dodanie uprawnień';
                    $strona['zawartosc']='komunikat';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				else{
					$strona['status']['komunikaty']['bledy'][]='Nie udało się';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
			}
				//jeżeli decyzja nie zostaje potwierdzona- cofamy do panelu administracyjnego
			else{
				$strona['status']['komunikaty']['operacje'][]='Post nie został usunięty';
				$strona['zawartosc']='komunikat';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/administracja.php');
			}
		}
	}
	else{
		$strona['status']['komunikaty']['bledy'][]='Moderacja dostępna tylko dla administratora';
		$strona['zawartosc']='blad';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
	}
	
	wyswietl_strone($strona);
?>