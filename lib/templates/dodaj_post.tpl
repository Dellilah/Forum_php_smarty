{*
      Szablon formularza: Dodawanie Postu
     
      @package dodaj_post.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
*}    
	
{if $status.komunikaty.bledy_formularza && count($status.komunikaty.bledy_formularza)}
	<div id="blad"><b>
		Błędnie wypełniony formularz. Proszę poprawić zaznaczone pola.
	</b></div>
{/if}
	
	<form method="post" action="{$smarty.server.PHP_SELF}">
    <fieldset>
        <legend>Dodaj Post</legend>
        
        <div>
            <label for="tresc">Treść:</label>
            <textarea id="tresc" name="tresc" rows="10" cols="40">{if isset($dane.tresc)}
																	{$dane.tresc}{/if}</textarea>
        </div>
		{if isset($status.komunikaty.bledy_formularza.tresc)}
			
            <div>
              {$status.komunikaty.bledy_formularza.tresc}
            </div>      
        {/if}
		 <div>
            <input type="hidden" name="id_watek" value="{$pomocnicze.id_watek}" />
        </div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
	</form>