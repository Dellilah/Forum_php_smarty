{*
	 Szablon usuwania postu
	 
	 @package usun_strone.tpl
	 @author Alicja Cyganiewicz
	 @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}
<h1> USUWANIE POSTU </h1>
<table width="100%" cellspacing="0" cellpadding="10">
<tr bgcolor="#C2DFFF"> <th> Autor </th> <th> Post </th> <th> Data dodania </th> </tr>
<tr> <td> {$dane.autor} </td> <td>{$dane.tresc}</td><td>{$dane.data_dodania}</td></tr>
</table>
<p> czy na pewno chcesz usunąć?</p>
<form action="{$smarty.server.PHP_SELF}" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_post" value="{$dane.id_post}">
	<input type="hidden" name="ilosc" value="{$ilosc_postow_w_watku.ile}">
	{if $ilosc_postow_w_watku.ile==1}
		<br>UWAGA! To jedyny post w tym wątku. Jego usunięcie spowoduje kasację wątku!
	{/if}
	<input type="submit" value="usuń">
</form>