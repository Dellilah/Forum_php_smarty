<?php
	
	/**
     * Strona Główna
     *
     * @package glowna_watki.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
	
	$strona['zawartosc']='glowna_watki';
	$strona['dane']['watki']=array();
	$strona['maks_liczba_rekordow_strona'] = 4;
	
		//dane do nawigacji
	$strona['ilosc_stron']
        = pobierz_ilosc_stron(&$sql, $strona['maks_liczba_rekordow_strona'], 'watek');
	if(isset($_GET['strona']) && ctype_digit($_GET['strona'])) {
        $aktualna_strona = $_GET['strona'];
    }
    else {
        $aktualna_strona = 1;
    }
   
    if(($strona['ilosc_stron']>0)) {
       
        $strona['aktualna_strona']
            = wyznacz_numer_aktualnej_strony($strona['ilosc_stron'], $aktualna_strona);
			
			//pobranie danych dot. wątków
		if($strona['dane']['watki']=pobierz_dane_z_bazy($sql, 
					array('id_watek', 'nazwa', 'uzytkownik_forum_id_uz', 'data_zalozenia'),
					'watek',
					array(),
					'ORDER BY `data_zalozenia` LIMIT ' . (($strona['aktualna_strona']-1)*$strona['maks_liczba_rekordow_strona']) . ',' . $strona['maks_liczba_rekordow_strona'])){
		
			if(!count($strona['dane']['watki'])){
				$strona['status']['komunikaty']['bledy'][]='Brak wątków do wyświetlenia';
			}
				
					//ustalenie nazwy autora każdego wątku po jego ID
			$i=count($strona['dane']['watki'])-1;
			while($i>=0){
				$strona['dane']['watki'][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['watki'][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
					if(!isset($strona['dane']['watki'][$i]['autor']) || !count($strona['dane']['watki'][$i]['autor'])){
						$strona['dane']['watki'][$i]['autor']='Konto użytkownika usunięto';
					}
					
					//  Pobranie danych dotyczących ostatniego posta w wątku
				$ostatni_post=current(pobierz_dane_z_bazy($sql,
											array('*'),
											'post',
											array('watek_id_watek' => $strona['dane']['watki'][$i]['id_watek']),
											'ORDER BY `data_dodania` DESC LIMIT 1'));
				$strona['dane']['watki'][$i]['ostatni_autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $ostatni_post['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
				if(!isset($strona['dane']['watki'][$i]['ostatni_autor']) || !count($strona['dane']['watki'][$i]['ostatni_autor'])){
						$strona['dane']['watki'][$i]['ostatni_autor']='Konto użytkownika usunięto';
				}
				$strona['dane']['watki'][$i]['ostatnia_data']=$ostatni_post['data_dodania'];
				$strona['dane']['watki'][$i]['ostatni_fragment']=substr($ostatni_post['tresc'], 0, 15);
				$strona['dane']['watki'][$i]['il_postow']=current(current(pobierz_dane_z_bazy($sql,
																array('COUNT(*)'),
																'post', 
																array('watek_id_watek' => $strona['dane']['watki'][$i]['id_watek']))));
				$i--;
			}
			$strona['link']=$_SERVER['PHP_SELF'].'?strona=';
			
		}
	}
	else{
		$strona['status']['komunikaty']['bledy'][]='Błąd połączenia z bazą';
	}
	
	wyswietl_strone($strona);
?>
	
	
	
	