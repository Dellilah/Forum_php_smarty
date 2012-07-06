{*
      Szablon : Profil użytkownika
     
      @package pokaz_profil.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}

	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="2" align="center" valign="middle"><font size=5><b>Profil użytkownika</b></font></td>
	</tr>
	<tr><td bgcolor="#C2DFFF">LOGIN</td><td>{$dane.login}</td></tr>
	<tr><td bgcolor="#C2DFFF">IMIĘ</td><td>{$dane.imie}</td></tr>
	<tr><td bgcolor="#C2DFFF">NAZWISKO</td><td>{$dane.nazwisko}</td></tr>
	<tr><td bgcolor="#C2DFFF">E-MAIL</td><td>{$dane.email}</td></tr>
	{if isset($dane.podpis) && $dane.podpis!=''}
		<tr><td bgcolor="#C2DFFF">PODPIS</td><td>{$dane.podpis}</td></tr>
	{/if}
	{if isset($dane.Data_ur) && $dane.Data_ur!='0000-00-00'}
		<tr><td bgcolor="#C2DFFF">DATA URODZENIA</td><td>{$dane.Data_ur}</td></tr>
	{/if}
	<tr><<td bgcolor="#C2DFFF">Ilość postów</td><td>{$dane.ilosc_postow}
												<br><a href="szukaj_postow.php?id_uz={$dane.id_uz}">
													Znajdź posty użytkownika {$dane.login}</td></tr>
	</table>
