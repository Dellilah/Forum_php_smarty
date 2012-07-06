<?php
    /**
     * Sprawdzanie danych z zewnątrz
     *
     * @package sprawdzanie_danych.inc.php
     * @author Alicja Cyganiewicz
     * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */
	 
	 /**
	 * Sprawdzenie poprawności formularza dodawania wątku
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica pól pochodzących z formularza
	 * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
	 */
	function sprawdz_dane_watek(&$bledy_formularza, $formularz, $wzorzec) {
		   
		wymagaj_danych($bledy_formularza, $formularz, $wzorzec);
		sprawdz_pole_nazwa_watku($bledy_formularza, $formularz, 'nazwa');
	}

    /**
     * Funkcja sprawdza czy zostały wypełnione wymagane pola formularza
     *
     * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza
	 * @param array $formularz Tablica zawierająca pola formularza
     * @param array $wzorzec Tablica zawierająca informacje jakie pola w formularzu są wymagane
     */
    function wymagaj_danych(&$bledy_formularza, $formularz, $wzorzec ) {

        foreach ($wzorzec as $pole) {
            if ( !isset($formularz[$pole])
                || $formularz[$pole] == '' ) {
                blad_formularza($bledy_formularza, $pole, 'Powyższe pole jest wymagane.');
            }  
        }

    }
	
	/**
	* Funkcja sprawdzająca poprawnośc zawartości pola Nazwa [wątku]
	*
	* @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	* @param array $formularz Tablica pól pochodzących z formularza
	* @param string $pole Nazwa pola do sprawdzenia
	* @return boolean Wynik sprawdzania
	*/
	function sprawdz_pole_nazwa_watku(&$bledy_formularza, $formularz, $pole){
		
		if ( strlen($formularz[$pole]) < 2) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Nazwa jest za krótka.');
        return false;  
		}
		elseif ( strlen($formularz[$pole]) > 100) {
			blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Nazwa jest za długa.');
			return false;
		}
		elseif ( !preg_match('/^\S+(\S|\s)+$/', $formularz[$pole]) ) {
			blad_formularza($bledy_formularza, $pole, 'Pole Nazwa zawiera nieprawidłowe znaki.');
			return false;
		}
   
		return true;
   
	}
	
	/**
	 * Sprawdzenie poprawność pola Treść [postu].
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica z polami formularza
	 * @param string $pole Nazwa pola do sprawdzenia
	 * @return boolean Wynik sprawdzania
	 */
	function sprawdz_pole_tresc_postu(&$bledy_formularza, $formularz, $pole) {

		if ( strlen($formularz[$pole]) < 5 ) {
			blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Treść jest za krótka.');
			return false;
		}
		elseif ( strlen($formularz[$pole]) > 2000 ) {
			blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Treść jest za długa.');
			return false;
		}
		elseif ( !preg_match('/^\S+(\S|\s)+$/', $formularz[$pole]) ) {
			blad_formularza($bledy_formularza, $pole, 'Pole Treść zawiera nieprawidłowe znaki.');
			return false;
		}
		   
		return true;
		   
	}
	
	
    /**
     * Sprawdzenie poprawności formularza logowania.
     *
     * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
     * @param array $formularz Tablica pól pochodzących z formularza
     * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
     */
    function sprawdz_formularz_logowania(&$bledy_formularza, $formularz, $wzorzec) {
        wymagaj_danych($bledy_formularza, $formularz, $wzorzec );
        sprawdz_pole_login($bledy_formularza, $formularz, 'login');
        sprawdz_pole_haslo($bledy_formularza, $formularz, 'haslo');
    }
	
	 /**
     * Sprawdzenie poprawności Loginu
     *
     * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
     * @param array $formularz Tablica pól pochodzących z formularza
     * @param string $pole Nazwa pola do sprawdzenia
     * @return boolean Wynik sprawdzania pola
     */
    function sprawdz_pole_login(&$bledy_formularza, $formularz, $pole) {
       
        if ( strlen($formularz[$pole]) < 5 ) {
            blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Login użytkownika jest za krótka.');
            return false;
        }
        elseif ( strlen($formularz[$pole]) > 20 ) {
            blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Login użytkownika jest za długa.');
            return false;
        }      
        elseif ( !preg_match('/^[A-Za-z0-9]+$/', $pole) ) {
            blad_formularza($bledy_formularza, $pole, 'Pole Login użytkownika zawiera nieprawidłowe znaki.');
            return false;
        }
        else {
            return true;
        }
       
    }
		
	  
    /**
     * Sprawdzenie poprawności hasła.
     *
     * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
     * @param array $formularz Tablica pól pochodzących z formularza
     * @param string $pole Nazwa pola do sprawdzenia
     * @return boolean Wynik sprawdzania pola
     */
    function sprawdz_pole_haslo(&$bledy_formularza, $formularz, $pole) {
		
		wymagaj_danych($bledy_formularza, $formularz, array($pole));
       
        if ( strlen($formularz[$pole]) < 5 ) {
            blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Hasło jest za krótka.Hasło musi mieć >5 znaków');
            return false;
        }
        elseif ( strlen($formularz[$pole]) > 16 ) {
            blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Hasło jest za długa. Hasło musi mieć <16 znaków');
            return false;
        }      
        elseif ( !preg_match('/^[A-Za-z0-9]+$/', $formularz[$pole]) ) {
            blad_formularza($bledy_formularza, $pole, 'Pole Hasło zawiera nieprawidłowe znaki.');
            return false;
        }
        elseif ( !preg_match('/[0-9]+/', $formularz[$pole]) ) {
            blad_formularza($bledy_formularza, $pole, 'Pole Hasło musi zawierać co najmniej jedną cyfrę.');
            return false;
        }
        elseif ( !preg_match('/[A-Za-z]+/', $formularz[$pole]) ) {
            blad_formularza($bledy_formularza, $pole, 'Pole Hasło musi zawierać co najmniej jedną literę.');
            return false;
        }
        else {
            return true;
        }
       
    }
	
	/**
	* Porównanie pól
     *
     * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
     * @param array $formularz Tablica pól pochodzących z formularza
     * @param string $pole1 Nazwa pola1
	 * @param string $pole2 Nazwa pola2
     * @return boolean Wynik sprawdzania pola
     */
	 function porownaj_pola(&$bledy_formularza, $formularz, $pole1, $pole2){
		
		if(!($formularz[$pole1]==$formularz[$pole2])){
			blad_formularza($bledy_formularza, $pole2, 'Wartości pól '.$pole1.' i '.$pole2.' muszą być takie same');
			return false;
		}
	}
   
	
	/**
     * Sprawdzenie poprawności formularza rejestracji
     *
     * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
     * @param array $formularz Tablica pól pochodzących z formularza
     * @param array $wzorzec Tablica zawierająca informację o polach wymaganych w formularzu
     */
	 function sprawdz_dane_rejestracja(&$bledy_formularza, $formularz, $wzorzec){
		
		wymagaj_danych($bledy_formularza, $formularz, $wzorzec);
		sprawdz_pole_login($bledy_formularza, $formularz, 'login');
		sprawdz_pole_imie($bledy_formularza, $formularz, 'imie');
		sprawdz_pole_imie($bledy_formularza, $formularz, 'nazwisko');
		sprawdz_pole_mail($bledy_formularza, $formularz, 'mail');
		sprawdz_pole_domena($bledy_formularza, $formularz, 'domena');
		if(isset($formularz['podpis']) && $formularz['podpis']!=''){
			sprawdz_pole_podpis($bledy_formularza, $formularz, 'podpis');
		}
		sprawdz_pole_data($bledy_formularza, $formularz['dzien'], $formularz['miesiac'], $formularz['rok']);
		
		
	}
	
	/**
	 * Sprawdzenie poprawność pola imię
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica z polami formularza
	 * @param string $pole Nazwa pola do sprawdzenia
	 * @return boolean Wynik sprawdzania
	 */
	function sprawdz_pole_imie(&$bledy_formularza, $formularz, $pole) {

		if ( strlen($formularz[$pole]) < 3 ) {
			blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Imię jest za krótka.');
			return false;
		}
		elseif ( strlen($formularz[$pole]) > 45 ) {
			blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Imię jest za długa.');
			return false;
		}
		elseif ( !preg_match('/^[A-Za-ząćęłńóśźż]+$/', $formularz[$pole]) ) {
			blad_formularza($bledy_formularza, $pole, 'Pole Imię zawiera nieprawidłowe znaki.');
			return false;
		}
		   
		return true;
		   
	}
	
	/**
	 * Sprawdzenie poprawność pola mail
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica z polami formularza
	 * @param string $pole Nazwa pola do sprawdzenia
	 * @return boolean Wynik sprawdzania
	 */
	function sprawdz_pole_mail(&$bledy_formularza, $formularz, $pole) {

		if ( strlen($formularz[$pole]) < 2 ) {
			blad_formularza($bledy_formularza, 'email', 'Wprowadzona wartość w pole mail jest za krótka.');
			return false;
		}
		elseif ( strlen($formularz[$pole]) > 20 ) {
			blad_formularza($bledy_formularza, 'email', 'Wprowadzona wartość w pole mail jest za długa.');
			return false;
		}
		elseif ( !preg_match('/^[0-9a-zA-Z_.-]+$/', $formularz[$pole]) ) {
			blad_formularza($bledy_formularza, 'email', 'Pole mail zawiera nieprawidłowe znaki.');
			return false;
		}
		   
		return true;
		   
	}
	
	
	/**
	 * Sprawdzenie poprawność pola domena
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica z polami formularza
	 * @param string $pole Nazwa pola do sprawdzenia
	 * @return boolean Wynik sprawdzania
	 */
	function sprawdz_pole_domena(&$bledy_formularza, $formularz, $pole) {

		if ( strlen($formularz[$pole]) < 2 ) {
			blad_formularza($bledy_formularza, 'email', 'Wprowadzona wartość w pole domena jest za krótka.');
			return false;
		}
		elseif ( strlen($formularz[$pole]) > 20 ) {
			blad_formularza($bledy_formularza, 'email', 'Wprowadzona wartość w pole domena jest za długa.');
			return false;
		}
		elseif ( !preg_match('/^[0-9a-zA-Z.-]+\.[a-zA-Z]{2,4}$/', $formularz[$pole]) ) {
			blad_formularza($bledy_formularza, 'email', 'Pole domena zawiera nieprawidłowe znaki.');
			return false;
		}
		   
		return true;
		   
	}
	
	/**
	 * Sprawdzenie poprawność pola podpis
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica z polami formularza
	 * @param string $pole Nazwa pola do sprawdzenia
	 */
	function sprawdz_pole_podpis(&$bledy_formularza, $formularz, $pole) {

		if ( strlen($formularz[$pole]) > 250 ) {
			blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Podpis jest za długa.');
			return false;
		}
		elseif ( !preg_match('/^\S+(\S|\s)+$/', $formularz[$pole]) ) {
			blad_formularza($bledy_formularza, $pole, 'Pole Podpis zawiera nieprawidłowe znaki.');
			return false;
		}
		   
		return true;
		   
	}
	
	/**
	*	Sprawdzenie poprawności Daty
	*
	* @param array $bledy_formularza Tablica przechowująca błedy danych dla formularza
	* @param int $dzien Dzień daty
	* @param int $miesiac Miesiąc daty
	* @param int $rok Rok daty
	* @return boolean Wynik sprawdzania
	*/
	function sprawdz_pole_data(&$bledy_formularza, $dzien, $miesiac, $rok){
	
		if($miesiac==2){
			if((($rok%4)==0 && $dzien>29) || (($rok%4)!=0 && $dzien>28)){
				blad_formularza($bledy_formularza, 'dzien', 'Błędna data');
				return false;
			}
		}
		elseif(($miesiac==4 || $miesiac==6 || $miesiac==9 || $miesiac==11) && $dzien>30){
			blad_formularza($bledy_formularza, 'dzien', 'Błędna data');
				return false;
		}
		
		return true;
	}
	
		
	/**
	* Sprawdza występowanie danej w tabeli
	*
	* @param array $sql Konfiguracja połączenia z bazą danych  
	* @param string $tabela Tabela z danymi
	* @param string $pole Nazwa pola do sprawdzenia
	* @param mixed $dana Dana dosprawdzenia
	* @return boolean Wynik sprawdzania
	*/
	function sprawdz_wystepowanie_danej(&$sql, $tabela, $pole, $dana){
		
		$wynik=pobierz_dane_z_bazy($sql, array('*'), $tabela, array($pole => $dana));
		if(count($wynik)>0){
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	 * Sprawdzenie poprawności formularza dodawania postu
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica pól pochodzących z formularza
	 * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
	 */
	function sprawdz_dane_post(&$bledy_formularza, $formularz, $wzorzec) {
		   
		wymagaj_danych($bledy_formularza, $formularz, $wzorzec);
		sprawdz_pole_tresc_postu($bledy_formularza, $formularz, 'tresc');
		   
	}
	
	/**
	*  Sprawdzanie ID podanego z zewnątrz
	*
	* @param array $sql Konfiguracja połączenia z bazą
	* @param array $bledy Tablica błędów
	* @param string $pole_id Nazwa pola w tabeli zawierającego ID
	* @param mixed $id Id do sprawdzenia
	* @param string $tabela Tabela z której ID ma pochodzić
	*/
	function sprawdz_id(&$sql, &$bledy, $pole_id, $id, $tabela){
		if(!ctype_digit($id) || !sprawdz_wystepowanie_danej($sql, $tabela, $pole_id, $id)){
				blad_formularza($bledy, 'id', 'Błędny wybór');
		}
	}
	
	/**
	 * Sprawdzenie poprawności formularza wyszukiwania
	 *
	 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	 * @param array $formularz Tablica pól pochodzących z formularza
	 * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
	 */
	function sprawdz_dane_wyszukaj(&$bledy_formularza, $formularz, $wzorzec) {
		   
		wymagaj_danych($bledy_formularza, $formularz, $wzorzec);
		sprawdz_pole_szukaj($bledy_formularza, $formularz, 'szukane');
	}
	
	/**
	* Sprawdzenie poprawności pola wyszukiwania
	*
	* @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza  
	* @param array $formularz Tablica pól pochodzących z formularza
	* @param string $pole Nazwa pola do sprawdzenia
	*/
	function sprawdz_pole_szukaj(&$bledy_formularza, $formularz, $pole) {
       
        if ( strlen($formularz[$pole]) > 10 ) {
            blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole szukaj użytkownika jest za długa.');
            return false;
        }      
        elseif ( !preg_match('/^[A-Za-z0-9ąćęłńóśźż]+$/', $pole) ) {
            blad_formularza($bledy_formularza, $pole, 'Pole Login użytkownika zawiera nieprawidłowe znaki.');
            return false;
        }
        else {
            return true;
        }
       
    }