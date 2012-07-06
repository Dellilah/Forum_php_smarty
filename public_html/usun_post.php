<?php
	
	/**
     * Usuwanie postu
     *
     * @package usun_post.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	if(autoryzacja()){
		$strona['zawartosc']='usun_post';
		$strona['status']['komunikaty']['bledy']=array();
			
		if(isset($_GET['id_post'])){
			
				//pobieramy id postu do usunięcia
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, array('id_post'));
				
				//sprawdzamy czy istnieje w bazie ten post
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_post', $strona['pomocnicze']['id_post'], 'post');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
					//sprawdzamy uprawnienia do usuwania (autor/administrator/moderator), pobieramy id autora
				$strona['pomocnicze']['id_autor']=ustal_pole_po_id($sql, 'uzytkownik_forum_id_uz', 'id_post', $strona['pomocnicze']['id_post'], 'post');
				
				if($strona['pomocnicze']['id_autor']!=$_SESSION['uzytkownik']['id_uz'] && $_SESSION['uzytkownik']['typ']=='user'){
					$strona['status']['komunikaty']['bledy'][]='Brak uprawnień do usuwania tego postu';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				
					//pobieramy dane posta który przeznaczony jest do usunięcia (do wyświetlenia przy podejmowaniu decyzji)
				else{
					$wynik=pobierz_dane_z_bazy($sql, array('*'), 'post', array('id_post' => $strona['pomocnicze']['id_post']));
					$strona['dane']=current($wynik);
						//sprawdzamy ilosc postów w wątku
					$strona['ilosc_postow_w_watku']=current(pobierz_dane_z_bazy($sql, 
													array('COUNT(*)' => 'ile'),
													'post', array('watek_id_watek' => $strona['dane']['watek_id_watek'])));
				
						//ustalamy login autora
					$strona['dane']['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['autor']) || !count($strona['dane']['autor'])){
						$strona['dane']['autor']='Konto użytkownika usunięto';
					}
				}
			}
		}	
					//jeżeli zostały wysłane dane z formularza
		elseif(isset($_POST) && count($_POST)){
					
					//pobieramy decyzję użytkownika, id_posta do usunięcia oraz 
					//ilość postów w tym samym wątku (gdyby był to ostatni post należy również usunąć wątek)
			$wzorzec=array('decyzja', 'id_post', 'ilosc');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_post', $strona['dane']['id_post'], 'post');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			elseif($strona['dane']['decyzja']=='tak'){
					
					//jeżeli jest to ostatni post- sczytujemy id_watku,który również trzeba będzie usunąć
				if($strona['dane']['ilosc']==1){	
					$strona['dane']['watek_id']=ustal_pole_po_id($sql,
												'watek_id_watek',
												'id_post',
												$strona['dane']['id_post'],
												'post');
						//usuwamy cały wątek oraz post
					if(usun_dane($sql, 'watek', array('id_watek' => $strona['dane']['watek_id']))){
						if(usun_dane($sql, 'post', array('id_post' => $strona['dane']['id_post']))){
						$strona['status']['komunikaty']['operacje'][]='Usunięto pomyślnie POST i WĄTEK';
						$strona['zawartosc']='komunikat';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
						}
					}
				}
					//jeżeli nie nie jest to ostatni post- usuwamy jedynie konkretny wpis
				elseif(usun_dane($sql, 'post', array('id_post' => $strona['dane']['id_post']))){
					$strona['status']['komunikaty']['operacje'][]='Usunięto pomyślnie POST';
					$strona['zawartosc']='komunikat';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				else{
					$strona['status']['komunikaty']['bledy'][]='Nie udało się usunąć';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
			}
				//wycofanie się z usuwania (odp "nie")- powrót do strony głównej
			else{
				$strona['status']['komunikaty']['operacje'][]='Post nie został usunięty';
				$strona['zawartosc']='komunikat';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
		}
	}	
	wyswietl_strone($strona);
?>