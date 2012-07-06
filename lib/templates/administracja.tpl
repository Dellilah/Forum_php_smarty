{*
      Panel administracyjny
     
      @package administracja.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}

<p align="center"> Panel Administracyjny </p>
<ul>
	<li><a href="moderacja_uzytkownikow.php"> Moderacja użytkowników (Lista użytkowników : {if $smarty.session.uzytkownik.typ=='admin'}nadaj prawa moderatora,{/if} usuń konto) </a></li>
	<li><a href="moderacja_watkow.php"> Moderacja wątków (Lista wątków: edytuj, usuń) </a></li>
	<li><a href="moderacja_postow.php"> Moderacja postow (Lista wszystkich postów: edytuj, usuń) </a></li>
</ul>