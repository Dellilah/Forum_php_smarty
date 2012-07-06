<?php
	
	/**
     * Administracja: Usuwanie konta użytkownika
     *
     * @package usun_konto.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
		
		//usunąć konto może jedynie zalogowany użytkownik
	if(autoryzacja()){
		$strona['zawartosc']='usun_konto';
		$strona['status']['komunikaty']['bledy']=array();
		
			//pobieramy ID konta do usunięcia
		if(isset($_GET) && count($_GET)){
			
			$wzorzec=array('id_uz');
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, $wzorzec);
				
				//sprawdzamy poprawność pobranego ID
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['pomocnicze']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
					//pobieramy dane z bazy o użytkowniku dla potwierdzenia decyzji
					$strona['dane']['uzytkownicy']=pobierz_dane_z_bazy($sql, array('*'), 'uzytkownik_forum', array('id_uz' => $strona['pomocnicze']['id_uz']));				
			}
			
		}
		elseif(isset($_POST) && count($_POST)){
          
			$wzorzec=array('id_uz', 'decyzja');
			$strona['dane']=pobierz_dane_z_formularza($_POST, $wzorzec);
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['dane']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			elseif($strona['dane']['decyzja']=='tak'){
				
					//sprawdzamy uprawnienia-użytkownik musi być właścicielem konta, bądź adminem/moderatorem
				if($strona['dane']['id_uz']!=$_SESSION['uzytkownik']['id_uz'] && $_SESSION['uzytkownik']['typ']=='user'){
					$strona['status']['komunikaty']['bledy'][]='Brak uprawnień do usuwania profilu';
					$strona['zawartosc']='blad';
					header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
				}
				else{	
						//sprawdzamy czy konto które chce usunąć jest kontem admina(nie można!), moeratora i czy użytkownik usuwający jest jego właścicielem
						//(jeden mod nie może usunąć konta innego,może to zrobić on sam lub administrator)
					$strona['dane']['typ']=ustal_pole_po_id($sql, 'typ','id_uz', $strona['dane']['id_uz'], 'uzytkownik_forum');
					if($strona['dane']['typ']=='admin'){
						$strona['status']['komunikaty']['bledy'][]='Nie można usunąć konta administratora';
						$strona['zawartosc']='blad';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
					}
					elseif($strona['dane']['typ']=='moderator' && $_SESSION['uzytkownik']['id_uz']!=$strona['pomocnicze']['id_uz'] && $_SESSION['uzytkownik']['typ']!='admin'){
						$strona['status']['komunikaty']['bledy'][]='Nie można usunąć konta moderatora- tylko administrator/właściciel konta';
						$strona['zawartosc']='blad';
						header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
					}
					else{
							//usuwamy dane uzytkownika i jeżeli to on-wylogowujemy
						if(usun_dane($sql, 'uzytkownik_forum', array('id_uz' => $strona['dane']['id_uz']))){
							$strona['status']['komunikaty']['operacje'][]='Konto użytkownika zostało usunięte';
							if($strona['dane']['id_uz']==$_SESSION['uzytkownik']['id_uz']){
								unset($_SESSION['uzytkownik']);
								session_destroy();
							}
							$strona['zawartosc']='komunikat';
							header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
						}
						else{
							$strona['status']['komunikaty']['bledy'][]='Nie udało się usunąć konta użytkownika';
							$strona['zawartosc']='blad';
							header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
						}
					}
				}	
			}
			else{
				$strona['status']['komunikaty']['operacje'][]='Konto nie zostało usunięte';
				$strona['zawartosc']='komunikat';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/administracja.php');
			}
		}
	}	
	wyswietl_strone($strona);
?>