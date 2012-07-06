<?php
	
	/**
     * Wyszukanie postow uzytkownika
     *
     * @package szukaj_postow.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
		//wyszukiwanie postów użytkownika- jedynie dla zalogowanych
	if(autoryzacja()){
		$strona['zawartosc']='szukaj_postow';
		$strona['status']['komunikaty']['bledy']=array();
			
			//pobieramy ID użytkownika, którego posty chcemy znaleźć oraz sprawdzamy jego poprawnośc
		if(isset($_GET) && count($_GET)){
			
			$wzorzec=array('id_uz');
			$strona['pomocnicze']=pobierz_dane_z_formularza($_GET, $wzorzec);
			sprawdz_id(&$sql, $strona['status']['komunikaty']['bledy'], 'id_uz', $strona['pomocnicze']['id_uz'], 'uzytkownik_forum');
			if(count($strona['status']['komunikaty']['bledy'])){
				$strona['zawartosc']='blad';
				header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
			}
			else{
					//ustalamy login autora, oraz pobieramy dane dotyczące jego postów + wątki w których się znajdują
				$strona['dane']['login']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['pomocnicze']['id_uz'], 'uzytkownik_forum');
				$strona['dane']['posty']=pobierz_dane_z_bazy($sql, array('*'), 'post',array('uzytkownik_forum_id_uz' => $strona['pomocnicze']['id_uz']));
				if(!isset($strona['dane']['posty']) || !count($strona['dane']['posty'])){
					$strona['status']['komunikaty']['bledy'][]='Brak postów tego uzytkownika';
				}
				$i=count($strona['dane']['posty'])-1;
				while($i>=0){
					$strona['dane']['posty'][$i]['nazwa_watek']=ustal_pole_po_id($sql, 'nazwa', 'id_watek', $strona['dane']['posty'][$i]['watek_id_watek'], 'watek');
					$i--;
				}
			}	
		}
		else{
			$strona['status']['komunikaty']['bledy'][]='Brak użytkownika';
			$strona['zawartosc']='blad';
			header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
		}
			
	}	
	wyswietl_strone($strona);
?>
	