{*
      Szablon: Wyświetlenie postów danego wątku
     
      @package posty_w_watku.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
  *}	 
	 <div class="dodaj_post">
		<a href="dodaj_post.php?id_watek={$pomocnicze.id_watek}"> Dodaj Post </a> </div>
	
	<p id="nawigacja" align="center">
		{include file="nawigacja.tpl"}</p>
	<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"> <font size=5><b>{$pomocnicze.watek_nazwa}</b></font></td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Autor </th> <th colspan="2"> Post </th> <th> Data dodania </th> </tr>
	{if isset($status.komunikaty.bledy) && count($status.komunikaty.bledy)}
			{foreach from=$status.komunikaty.bledy item=blad}
				<p>{$blad}</p>
			{/foreach}
	{else}
		{foreach from=$dane.posty item=post}
				
				<tr>	
					<td><a href="pokaz_profil.php?id_uz={$post.uzytkownik_forum_id_uz}">{$post.autor}</a></td>
					<td><pre>{$post.tresc}</pre></td>
					<td>{if isset($smarty.session.uzytkownik) && ($smarty.session.uzytkownik.login==$post.autor || $smarty.session.uzytkownik.typ=='admin')}
							<a href="edytuj_post.php?id_post={$post.id_post}"> edytuj </a> ::
							<a href="usun_post.php?id_post={$post.id_post}"> usuń </a> 
						{/if}</td>
					<td>{$post.data_dodania}</td>
				</tr>
		{/foreach}
	{/if}
	</table>
