{*
      Szablon odpowiedzialny za wyświetlenie odnośników nawigacyjnych na liście stron.
     
      @package nawigacja.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}
    <nav align="center">
    {if $aktualna_strona>1}
    
            <a href="{$link}{$aktualna_strona-1}" title="poprzednia strona">
               poprzednia strona  
            </a>    
	{/if}
   
    {$aktualna_strona}
   
    {if $aktualna_strona<$ilosc_stron}
    
            <a href="{$link}{$aktualna_strona+1}" title="następna strona">
                następna strona
            </a>    
    {/if}
    </nav>