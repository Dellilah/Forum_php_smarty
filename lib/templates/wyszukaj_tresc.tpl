{*
      Formularz przeszukiwania bazy
     
      @package wyszukaj_tresc.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}

	{if isset($status.komunikaty.bledy_formularza) && count($status.komunikaty.bledy_formularza)}
	
	<div id="blad"><b>
		Błędnie wypełniony formularz. Proszę poprawić zaznaczone pola.
	</b></div>
{/if}
	
	<form method="get" action="{$smarty.server.PHP_SELF}">
    <fieldset>
        <legend>Wyszukaj</legend>
        
        <div>
            <label for="szukane">Wpisz format do wyszukania</label>
            <input type="text" id="szukane" name="szukane" size="20" maxlength="45" value="{if isset($dane.szukane)}{$dane.szukane}{/if}" />
        </div>
		  {if isset($status.komunikaty.bledy_formularza.szukane)}
        
            <div>
                {$status.komunikaty.bledy_formularza.szukane}
            </div>      
        {/if}
	</form>
		