{*
     Administracja : moderacja watkow
     
      @package moderacja_watkow.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
  *}
<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>Zarządzaj Wątkami</b></font></td>
	</tr>
	<tr bgcolor="#C2DFFF"> <th> Wątek </th> <th> Autor </th> <th colspan="2"> Data założenia </th> </tr> 
	{if isset($status.komunikaty.bledy) && count($status.komunikaty.bledy)}
			{foreach from=$status.komunikaty.bledy item=blad}
				<p>{$blad}</p>
			{/foreach}
	{else}
		{foreach from=$dane.watki item=watek}
	
				<tr>	
					<td align="center"><a href="posty_w_watku.php?id_watek={$watek.id_watek}">{$watek.nazwa}</a></td>
					<td align="center"><a href="pokaz_profil.php?id_uz={$watek.uzytkownik_forum_id_uz}">{$watek.autor}</a></td>
					<td align="center">{$watek.data_zalozenia}</td>
					<td>
						<a href="edytuj_watek.php?id_watek={$watek.id_watek}"> Edytuj </a>::
						<a href="usun_watek.php?id_watek={$watek.id_watek}"> Usuń </a>
					</td>
					
				</tr>
		{/foreach}
	{/if}
	</table>