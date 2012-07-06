{*
	Komunikat operacji.
     
      @package komunikat.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}
<p>
    {foreach from=$status.komunikaty.operacje name=komunikat item=komunikat}
            {$komunikat}
    <br />
    {/foreach}
	
</p>
<p> Za chwile nastąpi przekierowanie na stronę główną</p>