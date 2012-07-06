{*
      Szablon : Wynik wyszukiwania
     
      @package wynik_wyszukiwania.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}
<h2>Wynik wyszukiwania dla {$dane.szukane}</h2>
<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>POSTY</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Autor </th><th> Post </th> <th colspan="2"> Data dodania </th> </tr>
	{if !isset($dane.posty) || !count($dane.posty)}
		<tr> <td colspan="4">Brak Postów spełniających kryteria </td></tr> 
	{else} 
			{foreach from=$dane.posty item=post}
			
			<tr>	
				<td><a href="pokaz_profil.php?id_uz={$post.uzytkownik_forum_id_uz}">{$post.autor}</a></td>
				<td><pre>{$post.tresc}</pre></td>
				<td colspan="2">{$post.data_dodania}</td>
			</tr>
			{/foreach}
	{/if}
	<tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>WĄTKI</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Autor </th> <th colspan="2"> Data założenia </th> </tr> 
	{if !isset($dane.watki) || !count($dane.watki)}
			<tr> <td colspan="3">Brak Wątków spełniających kryteria </td></tr>
	{else}
		{foreach from=$dane.watki item=watek}
				<tr>	
					<td align="center"><a href="posty_w_watku.php?id_watek={$watek.id_watek}">{$watek.nazwa}</a></td>
					<td align="center"><a href="pokaz_profil.php?id_uz={$watek.uzytkownik_forum_id_uz}">{$watek.autor}</a></td>
					<td align="center">{$watek.data_zalozenia}</td>
				</tr>
		{/foreach}
	{/if}
	<tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>UŻYTKOWNICY</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"><th> #  <th> Login </th> <th> Imię </th> <th> Nazwisko </th> </tr> 
	{if !isset($smarty.session.uzytkownik)}
		<tr><td colspan="4"> Wgląd tylko dla zalogowanych użytkowników </td></tr>
	{else}
		{if !isset($dane.uzytkownicy) || !count($dane.uzytkownicy)}
			<tr> <td colspan="4">Brak Użytkowników spełniających kryteria </td></tr>
		{else}
			{$i=0}
			{foreach from=$dane.uzytkownicy item=uzytkownik}
				{$i=$i+1}
				
				<tr>
					<td align="center">{$i}</td>
					<td align="center"><a href="pokaz_profil.php?id_uz={$uzytkownik.id_uz}">{$uzytkownik.login}</a></td>
					<td align="center">{$uzytkownik.imie}</td>
					<td align="center">{$uzytkownik.nazwisko}</td>
				</tr>
			{/foreach}
		{/if}
	{/if}
			
	</table>
	
	