{*
	 Szablon usuwania wątku
	 
	 @package usun_watek.tpl
	 @author Alicja Cyganiewicz
	 @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}
<h1> USUWANIE WĄTKU WRAZ Z ZAWARTOŚCIĄ </h1>
<table width="100%" cellspacing="0" cellpadding="10">
    <tr>
	<td bgcolor="#009999" colspan="4" align="center" valign="middle"><font size=5><b>{$dane.nazwa}</b></font></td>
	</tr>

	<tr bgcolor="#C2DFFF"> <th> Autor </th> <th> Post </th> <th> Data dodania </th> </tr>
	{if isset($dane.posty) && count($dane.posty)}
			{foreach from=$dane.posty item=post}

				<tr>	
					<td>{$post.autor}</td>
					<td><pre>{$post.tresc}</pre></td>
					<td>{$post.data_dodania}</td>
				</tr>
			{/foreach}
	{/if}
	</table>
<p> czy na pewno chcesz usunąć?</p>
<form action="{$smarty.server.PHP_SELF}" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_watek" value="{$dane.id_watek}">
	<input type="submit" value="usuń">
</form>