<?php
	
	/**
     * Administracja -moderacja postów danego wątku
     *
     * @package moderacja_postow.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';

		//sprawdzanie uprawnień-admin/moderator
	if(autoryzacja() && $_SESSION['uzytkownik']['typ']!='user'){
		$strona['zawartosc']='moderacja_postow';
		
		$strona['dane']['watki']=pobierz_dane_z_bazy($sql, array('nazwa', 'id_watek'), 'watek');
			
			//pobranie informacji o postach w wątku oraz ich autorach
		foreach($strona['dane']['watki'] as $watek){
			$nazwa=$watek['nazwa'];
			$strona['dane']['posty'][$nazwa]=pobierz_dane_z_bazy($sql, array('*'),'post', array('watek_id_watek'=>$watek['id_watek']));
				$i=count($strona['dane']['posty'][$nazwa])-1;
				while($i>=0){
					$strona['dane']['posty'][$nazwa][$i]['autor']=ustal_pole_po_id($sql, 'login', 'id_uz', $strona['dane']['posty'][$nazwa][$i]['uzytkownik_forum_id_uz'], 'uzytkownik_forum');
						//na wypadek skasowanego profilu autora
					if(!isset($strona['dane']['posty'][$nazwa][$i]['autor']) || !count($strona['dane']['posty'][$nazwa][$i]['autor'])){
						$strona['dane']['posty'][$nazwa][$i]['autor']='Konto użytkownika usunięto';
					}
					$i--;
				}

		}
	}
	
	wyswietl_strone($strona);
?>
	
	