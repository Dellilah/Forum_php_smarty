{*
      Szablon: Wyświetlenie postów danego wątku
     
      @package posty_w_watku.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP

 *}
	 
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="3" align="center" valign="middle"><font size=5><b>POSTY UŻYTKOWNIKA</b> </font>{$dane.login}</td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Post </th> <th> Data dodania </th> </tr>
	{if isset($status.komunikaty.bledy) && count($status.komunikaty.bledy)}
			{foreach from=$status.komunikaty.bledy name=bledy item=blad}
				<p>{$blad}</p>
			{/foreach}
	{else}
		{foreach from=$dane.posty item=post}
				
				<tr>	
					<td><a href="posty_w_watku.php?id_watek={$post.watek_id_watek}">{$post.nazwa_watek}</a></td>
					<td><pre>{$post.tresc}</pre></td>
					<td>{$post.data_dodania}</td>
				</tr>
		{/foreach}
		{/if}
	</table>
