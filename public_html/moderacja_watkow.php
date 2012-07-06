<?php
	
	/**
     * Administracja : moderacja wątków
     *
     * @package moderacja_watkow.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	 
	 session_start();
	 session_regenerate_id();
	 
	 include 'cms.h.php';
	 
		//sprawdzamy uprawnienia- zalogowany administrator/moderator
	 if(autoryzacja() && $_SESSION['uzytkownik']['typ']!='user'){
			
		$strona['zawartosc']='moderacja_watkow';
			//pobieramy dane dotyczące wątku
		if($strona['dane']['watki']=pobierz_dane_z_bazy($sql, 
					array('id_watek', 'nazwa', 'uzytkownik_forum_id_uz', 'data_zalozenia'),
					'watek')){
		
			if(!count($strona['dane']['watki'])){
				$strona['status']['komunikaty']['bledy'][]='Brak wątków do wyświetlenia';
			}
				
				//ustalenie nazwy autora po jego ID
			$i=count($strona['dane']['watki'])-1;
			while($i>=0){
				$strona['dane']['watki'][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['watki'][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['watki'][$i]['autor']) || !count($strona['dane']['watki'][$i]['autor'])){
						$strona['dane']['watki'][$i]['autor']='Konto użytkownika usunięto';
					}
				$i--;
			}
		}else{
		$strona['status']['komunikaty']['bledy'][]='Błąd połączenia z bazą';
		}
	}
	else{
		$strona['status']['komunikaty']['bledy'][]='Moderacja dostępna tylko dla administratora/moderatora';
		$strona['zawartosc']='blad';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
	}
	
	wyswietl_strone($strona);
?>