{*
	 Administracja : usuwanie konta użytkownika - decyzja
	 
	 @package usun_konto.tpl
	 @author Alicja Cyganiewicz
	 @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}
<h1> Usuwanie Konta użytkownika</h1>
	<table width="100%" cellspacing="0" cellpadding="10">
	<tr bgcolor="#C2DFFF"><th> Login </th> <th> Imię </th> <th> Nazwisko </th> </tr> 
	{foreach from=$dane.uzytkownicy item=uzytkownik}
				<tr>
					
					<td align="center"><a href="pokaz_profil.php?id_uz={$uzytkownik.id_uz}">{$uzytkownik.login} </a></td>
					<td align="center" >{$uzytkownik.imie}</td>
					<td align="center">{$uzytkownik.nazwisko}</td>
				</tr>
		{/foreach}
	</table>

<p> czy na pewno chcesz usunąć użytkownika z bazy? Jego posty oraz wątki nie zostaną usunięte</p>
<form action="{$smarty.server.PHP_SELF}" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_uz" value="{$pomocnicze.id_uz}">
	<input type="submit" value="usuń konto">
</form>