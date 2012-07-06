{*
	 Szablon nadawania uprawnień moderatora- ostateczna decyzja
	 
	 @package nadaj_moderatora.tpl
	 @author Alicja Cyganiewicz
	 @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
	
*}
<h1> Nadawanie Uprawnień Moderatora </h1>
<p> czy na pewno chcesz nadać uprawnienia?</p>
<form action="{$smarty.server.PHP_SELF}" method="POST">
	<input type="radio" name="decyzja" value="tak"> Tak 
	<input type="radio" name="decyzja" value="nie" checked> Nie
	<input type="hidden" name="id_uz" value="{$dane.id_uz}">
	<input type="submit" value="nadaj prawa">
</form>