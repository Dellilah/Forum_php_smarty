<?php
	
	/**
     * Usuwanie wątku
     *
     * @package usun_watek.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
		
		//sprawdzenie uprawnień- moderator/admin
	if(autoryzacja() && $_SESSION['uzytkownik']['typ']!='user'){
		$strona['zawartosc']='usun_watek';
		$strona['status']['komunikaty']['bledy']=array();
			
			//sprawdzamy czy został wybrany wątek
		if(isset($_GET['id_watek'])){
				
				//sprawdzamy poprawność wybranego wątku
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, array('id_watek'));
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_watek', $strona['pomocnicze']['id_watek'], 'watek');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
			
					//pobieramy dane wątka i zamieszczone w nim posty do wyświetlenia użytkownikowi przed usunięciem
				$wynik=pobierz_dane_z_bazy($sql, array('*'), 'watek', array('id_watek' => $strona['pomocnicze']['id_watek']));
				$strona['dane']=current($wynik);
				$strona['dane']['posty']=pobierz_dane_z_bazy($sql, array('id_post', 'data_dodania', 'tresc', 'uzytkownik_forum_id_uz'), 'post', array('watek_id_watek' => $strona['pomocnicze']['id_watek']));
				$i=count($strona['dane']['posty'])-1;
				while($i>=0){
					$strona['dane']['posty'][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['posty'][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['posty'][$i]['autor']) || !count($strona['dane']['posty'][$i]['autor'])){
						$strona['dane']['posty'][$i]['autor']='Konto użytkownika usunięto';
					}
					$i--;
				}
			}
		}
			//sprawdzamy decyzję dotyczącą usunięcią wątka, oraz ponownie wybrany wątek
		elseif(isset($_POST) && count($_POST)){
			$wzorzec=array('decyzja', 'id_watek');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);	
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_watek', $strona['dane']['id_watek'], 'watek');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}			
			elseif($strona['dane']['decyzja']=='tak'){
					//usuwamy dane wątka oraz zawarte w nim posty
				if(usun_dane($sql, 'watek', array('id_watek' => $strona['dane']['id_watek'])) && usun_dane($sql, 'post', array('watek_id_watek' => $strona['dane']['id_watek']))){
					$strona['status']['komunikaty']['operacje'][]='Usunięto pomyślnie';
					$strona['zawartosc']='komunikat';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				else{
					$strona['status']['komunikaty']['bledy'][]='Nie udało się usunąć';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
			}
			else{
				$strona['status']['komunikaty']['operacje'][]='Post nie został usunięty';
				$strona['zawartosc']='komunikat';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
		}
	}
	else{
		$strona['status']['komunikaty']['bledy'][]='Moderacja dostępna tylko dla administratora/moderatora';
		$strona['zawartosc']='blad';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
	}
	wyswietl_strone($strona);
?>