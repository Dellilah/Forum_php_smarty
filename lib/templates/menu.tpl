{*
      Pasek nawigacyjny, menu
     
      @package menu.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
   *}

	<a href="wyszukaj_tresc.php"> Szukaj</a> ::
	<a href="lista_uzytkownikow.php"> Użytkownicy</a> ::
	<a href="edytuj_profil.php?id_uz={if isset($smarty.session.uzytkownik.id_uz)}{$smarty.session.uzytkownik.id_uz}{/if}"> Profil</a> ::
	{if isset($smarty.session.uzytkownik)}
			Jesteś zalogowany jako <b>
				{$smarty.session.uzytkownik.login}</b>
			<a href="wylogowanie.php"> Wyloguj </a> 
			{if $smarty.session.uzytkownik.typ!='user'}
			:: <a href="administracja.php"> Panel Administracyjny </a>
			{/if}
	{else}
			Nie jesteś zalogowany
			<a href="logowanie.php"> Zaloguj </a> 
			lub
			<a href="rejestracja.php"> Zarejestruj </a>
	{/if}
