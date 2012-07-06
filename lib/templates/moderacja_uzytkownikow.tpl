{*
      Administracja : moderacja użytkowników
     
      @package moderacja_uzytkownikow.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
 *}


<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="5" align="center" valign="middle"><font size=5><b>Zarządzaj Użytkownikami</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"><th> #  <th> Login </th> <th> Imię </th> <th> Nazwisko </th> <th> Moderuj </th> </tr> 
	{if isset($status.komunikaty.bledy) && count($status.komunikaty.bledy)}
			{foreach from=$status.komunikaty.bledy item=blad}
				<p>{$blad}</p>
			{/foreach}
	{else}
		{$i=0}
		{foreach from=$dane.uzytkownicy item=uzytkownik}
				{$i=$i+1}
				
				<tr>
					<td align="center">{$i} </td>
					<td align="center"><a href="pokaz_profil.php?id_uz={$uzytkownik.id_uz}">{$uzytkownik.login}</a></td>
					<td align="center" >{$uzytkownik.imie}</td>
					<td align="center">{$uzytkownik.nazwisko}</td>
					<td align="center">{if $smarty.session.uzytkownik.typ=='admin'}<a href="nadaj_moderatora.php?id_uz={$uzytkownik.id_uz}"> Nadaj uprawnienienia moderatora</a>
										::{/if}
									   <a href="usun_konto?id_uz={$uzytkownik.id_uz}"> Usuń konto</a>
					</td>
				</tr>
		{/foreach}
		{/if}
	</table>