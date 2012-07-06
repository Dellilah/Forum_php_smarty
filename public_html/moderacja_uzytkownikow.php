<?php
	
	/**
     * Administracja : moderacja użytkowników
     *
     * @package moderacja_uzytkownikow.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	 session_start();
	 session_regenerate_id();
	 
	 include 'cms.h.php';
		
		//sprawdzanie uprawnień-admin/moderator
	 if(autoryzacja() && $_SESSION['uzytkownik']['typ']!='user'){
		$strona['zawartosc']='moderacja_uzytkownikow';
			
			//pobieramy dane użytkowników do moderacji- baz moderatorów i adminów, chyba, że jest to konto admina
		$strona['dane']['uzytkownicy']=array();
		if($_SESSION['uzytkownik']['typ']=='admin'){
			$strona['dane']['uzytkownicy']=pobierz_dane_z_bazy($sql,
											array('typ', 'id_uz', 'login', 'imie', 'nazwisko'),
											'uzytkownik_forum',
											array(),
											'ORDER BY `login`');
		}
		else{
			$strona['dane']['uzytkownicy']=pobierz_dane_z_bazy($sql,
											array('typ', 'id_uz', 'login', 'imie', 'nazwisko'),
											'uzytkownik_forum',
											array('typ' => 'user'),
											'ORDER BY `login`');
		}	
		if(!count($strona['dane']['uzytkownicy'])){
			$strona['status']['komunikaty']['bledy'][]='Brak użytkowników do wyświetlenia';
		}
	}
	else{
		$strona['status']['komunikaty']['bledy'][]='Moderacja dostępna tylko dla moderatora/administratora';
		$strona['zawartosc']='blad';
		header('Refresh: 5; url=http://wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP_SMARTY_plus_mod/CMS/public_html/glowna_watki.php');
	}
	
	wyswietl_strone($strona);
?>