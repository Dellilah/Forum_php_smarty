{*
      Szablon: Edycja postu
     
      @package edytuj_post.tpl
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
        <legend>Edytuj Post</legend>
        
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
            <input type="hidden" name="id_post" value="{$dane.id_post}" />
        </div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
	</form>