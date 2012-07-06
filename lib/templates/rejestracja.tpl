{*      Szablon formularza: Rejestracja użytkownika
     
      @package rejestracja.tpl
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
        <legend>Zarejestruj</legend>
        <div>
            <label for="login">Login użytkownika (5-20)</label>
            <input type="text" id="login" name="login" size="20" maxlength="20" value="{if isset($dane.login)}{$dane.login}{/if}" />
        </div>
		{if isset($status.komunikaty.bledy_formularza.login)}
        
            <div>
                {$status.komunikaty.bledy_formularza.login}
            </div>      
        {/if}
		
		<div>
            <label for="haslo">Hasło (5-16, cyfra, znak)</label>
            <input type="password" id="haslo" name="haslo" size="20" maxlength="16" />
        </div>
		 {if isset($status.komunikaty.bledy_formularza.haslo)}
        
            <div>
                {$status.komunikaty.bledy_formularza.haslo}
            </div>      
        {/if}
		
		<div>
            <label for="haslopowt">Powtórz Hasło </label>
            <input type="password" id="haslpowto" name="haslopowt" size="20" maxlength="16" />
        </div>
		  {if isset($status.komunikaty.bledy_formularza.haslopowt)}
        
            <div>
                {$status.komunikaty.bledy_formularza.haslopowt}
            </div>      
        {/if}
		
		<div>
            <label for="imie">Imię </label>
            <input type="text" id="imie" name="imie" size="20" maxlength="45" value="{if isset($dane.imie)}{$dane.imie}{/if}" />
        </div>
		  {if isset($status.komunikaty.bledy_formularza.imie)}
        
            <div>
                {$status.komunikaty.bledy_formularza.imie}
            </div>      
        {/if}
		<div>
            <label for="nazwisko">Nazwisko </label>
            <input type="text" id="login" name="nazwisko" size="20" maxlength="20" value="{if isset($dane.nazwisko)}{$dane.nazwisko}{/if}" />
        </div>
		  {if isset($status.komunikaty.bledy_formularza.nazwisko)}
        
            <div>
                {$status.komunikaty.bledy_formularza.nazwisko}
            </div>      
        {/if}
		
		<div>
            <label for="email">E-mail </label>
            <input type="text" id="mail" name="mail" size="20" maxlength="20" value="{if isset($dane.mail)}{$dane.mail}{/if}" />
			@
			<input type="text" id="domena" name="domena" size="20" maxlength="20" value="{if isset($dane.domena)}{$dane.domena}{/if}" />
        </div>
		{if isset($status.komunikaty.bledy_formularza.email)}
        
            <div>
                {$status.komunikaty.bledy_formularza.email}
            </div>      
        {/if}
		
        <div>
            <label for="podpis">Podpis (do 250)</label>
            <textarea id="podpis" name="podpis" rows="4" cols="40">{if isset($dane.podpis)}{$dane.podpis}{/if}</textarea>
         </div>
		{if isset($status.komunikaty.bledy_formularza.podpis)}
        
            <div>
                {$status.komunikaty.bledy_formularza.podpis}
            </div>      
        {/if}
		
		<div>
			<label for="data_ur"> Data urodzenia </label>
			
				<select name="dzien">
					<option {if !isset($dane.dzien)} selected {/if} value=""></option>
					{foreach from=$dni item=dzien}
					<option {if isset($dane.dzien) && $dane.dzien==$dzien}selected{/if} value="{$dzien}"> {$dzien} </option>
					{/foreach}
				</select>
				
				<select name="miesiac">
					<option {if !isset($dane.miesiac)} selected {/if} value=""></option>
					{foreach from=$miesiace item=miesiac}
					<option {if isset($dane.miesiac) && $dane.miesiac==$miesiac}selected{/if} value="{$miesiac}"> {$miesiac} </option>
					{/foreach}
				</select>
				
				<select name="rok">
					<option {if !isset($dane.rok)} selected {/if} value=""></option>
					{foreach from=$lata item=rok}
					<option {if isset($dane.rok) && $dane.rok==$rok}selected{/if} value="{$rok}"> {$rok} </option>
					{/foreach}
				</select>
			
		</div>
		{if isset($status.komunikaty.bledy_formularza.dzien)}
        
            <div>
                {$status.komunikaty.bledy_formularza.dzien}
            </div>      
        {/if}
		
		<div> Pola oznaczone  są obowiązkowe </div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Rejestruj" />
        </div>
    </fieldset>
</form>