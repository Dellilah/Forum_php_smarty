{*
      Szablon : Lista użytkowników
     
      @package lista_uzytkownikow.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}	 
	<p id="nawigacja" align="center">
		{include file="nawigacja.tpl"}</p>
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><font size=5>Lista użytkowników <b> Forum Mieszanego </b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"><th> #  <th> Login </th> <th> Imię </th> <th> Nazwisko </th> </tr> 
	{if isset($status.komunikaty.bledy) && count($status.komunikaty.bledy)}
			{foreach from=$status.komunikaty.bledy name=bledy item=blad}
				<p>{$blad}</p>
			{/foreach}
	{else}
		{$i=0}
		{foreach from=$dane.uzytkownicy name=uzytkownik item=uzytkownik}
			{$i=$i+1}
				<tr>
					<td align="center">{$i} </td>
					<td align="center"><a href="pokaz_profil.php?id_uz={$uzytkownik.id_uz}">{$uzytkownik.login}</a></td>
					<td align="center" >{if $uzytkownik.typ=='admin'}
											<font color="red">
										{/if}
										{if $uzytkownik.typ=='moderator'}
											<font color="green">
										{/if}
										{$uzytkownik.imie}
										{if $uzytkownik.typ!='user'}
											</font>
										{/if}
										</td>
					<td align="center">{if $uzytkownik.typ=='admin'}
											<font color="red">
										{/if}
										{if $uzytkownik.typ=='moderator'}
											<font color="green">
										{/if}
										{$uzytkownik.nazwisko}
										{if $uzytkownik.typ!='user'}
											</font>
										{/if}
										</td>
											
				</tr>
		{/foreach}
	{/if}
	</table>