{*
     
      @package glowna_watki.tpl
      Strona główna- wąt
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     
*}	 
	 <div class="dodaj_watek">
		<a href="dodaj_watek.php"> Dodaj wątek </a> </div>
	<p id="nawigacja" align="center">
		{include file="nawigacja.tpl"}</p>
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="5" align="center" valign="middle"><font size=5><font size=5><b>Forum Mieszane</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Autor </th> <th> Data założenia </th><th>Ostatni wpis</th> <th>Posty</th></tr> 
	{if isset($status.komunikaty.bledy) && count($status.komunikaty.bledy)}
			{foreach from=$status.komunikaty.bledy name=bledy item=komunikat}
				<p>{$komunikat}<p>
			{/foreach}
	{else}
			{foreach from=$dane.watki item=watek}
				
				<tr>	
					<td align="center"><a href="posty_w_watku.php?id_watek={$watek.id_watek}">{$watek.nazwa}</a></td>
					<td align="center"><a href="pokaz_profil.php?id_uz={$watek.uzytkownik_forum_id_uz}">{$watek.autor}</a></td>
					<td align="center">{$watek.data_zalozenia}</td>
					<td align="center"> {$watek.ostatni_autor}<br>
						{$watek.ostatnia_data}<br>
						{$watek.ostatni_fragment}... <a href="posty_w_watku.php?id_watek={$watek.id_watek}&ost=1"> >>> </a></td>
					<td align="center">{$watek.il_postow}</td>
					
				</tr>
				
			{/foreach}
	{/if}
	</table>