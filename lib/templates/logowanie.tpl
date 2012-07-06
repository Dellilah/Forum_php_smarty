{*
      Szablon formularza logowania.
     
      @package logowanie.tpl
      @author Alicja Cyganiewicz
      @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     /
*}
{if isset($status.komunikaty.bledy_formularza)}

    <div>
        Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
    </div>
{/if}

<form method="post" action="{$smarty.server.PHP_SELF}">
    <fieldset>
        <legend>Logowanie</legend>
        <div>
            <label for="login">Login </label>
            <input type="text" id="login" name="login" size="20" maxlength="20" value="{if isset($dane.login)}{$dane.login}{/if}" />
        </div>
        {if isset($status.komunikaty.bledy_formularza.login)}
        
            <div>
                {$status.komunikaty.bledy_formularza.login}
            </div>      
        {/if}
        <div>
            <label for="haslo">Hasło:</label>
            <input type="password" id="haslo" name="haslo" size="16" maxlength="16"  />
        </div>
        {if isset($status.komunikaty.bledy_formularza.haslo)}
        
            <div>
                {$status.komunikaty.bledy_formularza.haslo}
            </div>      
        {/if}
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Zaloguj się" />
        </div>
    </fieldset>
</form>