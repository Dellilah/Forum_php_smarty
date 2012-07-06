{*
      Szablon komunikatu błędu.
     
      @package blad.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/public_html/php/Projekt_PHP
*}
<h1>
    Błąd!
</h1>
<p>
    {foreach from=$status.komunikaty.bledy name=bledy item=komunikat}
            {$komunikat}
    <br />
    {/foreach}
</p>
<p> Za chwile nastąpi przekierowanie na stronę główną</p>