{*
      Szablon formularza: Edycja wątku
     
      @package edytuj_watek.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
 *}
	
{if isset($status.komunikaty.bledy_formularza) && count($status.komunikaty.bledy_formularza)}
	
	<div id="blad"><b>
		Błędnie wypełniony formularz. Proszę poprawić zaznaczone pola.
	</b></div>
{/if}
	
	<form method="post" action="{$smarty.server.PHP_SELF}">
    <fieldset>
        <legend>Edytuj wątek</legend>
        <div>
            <label for="nazwa">Nazwa wątku:</label>
            <input type="text" id="nazwa" name="nazwa" size="30" maxlength="100" value="{if isset($dane.nazwa)}{$dane.nazwa}{/if}" />
        </div>
		  {if isset($status.komunikaty.bledy_formularza.nazwa)}

            <div>
                {$status.komunikaty.bledy_formularza.nazwa}
            </div>      
        {/if}
        <div>
			<input type="hidden" name="id_watek" value="{$dane.id_watek}" />
		</div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
</form>