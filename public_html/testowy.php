<?php
	/**
	*	Skrypt do testów
	*
	* @package testowy.php
	* @author Alicja Cyganiewicz
	*/
	session_start();
	session_regenerate_id();
	
	include 'cms.h.php';
		$strona['dane']['watki']=pobierz_dane_z_bazy($sql, array('nazwa', 'id_watek'), 'watek');
		foreach($strona['dane']['watki'] as $watek){
			$nazwa=$watek['nazwa']
			$strona['dane']['posty'][$nazwa]=pobierz_dane_z_bazy($sql, array('*'),'post', array('watek_id_watek'=>$watek['id_watek']));
		}
		
	$strona['test']=current($strona['dane']['posty']);
	$strona['zawartosc']='testowy';
	
	wyswietl_strone($strona);
?>