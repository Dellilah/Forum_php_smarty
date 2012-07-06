<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:29:17
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/logowanie.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19232233404e0e3c2ddec831-53236452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '848227ceedd9637ef5a4b4e86b513de8cf05d2bb' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/logowanie.tpl',
      1 => 1309533003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19232233404e0e3c2ddec831-53236452',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza'])){?>

    <div>
        Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
    </div>
<?php }?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
    <fieldset>
        <legend>Logowanie</legend>
        <div>
            <label for="login">Login </label>
            <input type="text" id="login" name="login" size="20" maxlength="20" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['login'])){?><?php echo $_smarty_tpl->getVariable('dane')->value['login'];?>
<?php }?>" />
        </div>
        <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['login'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['login'];?>

            </div>      
        <?php }?>
        <div>
            <label for="haslo">Hasło:</label>
            <input type="password" id="haslo" name="haslo" size="16" maxlength="16"  />
        </div>
        <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['haslo'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['haslo'];?>

            </div>      
        <?php }?>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Zaloguj się" />
        </div>
    </fieldset>
</form>