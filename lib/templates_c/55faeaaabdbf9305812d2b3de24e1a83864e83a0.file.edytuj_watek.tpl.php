<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:50:33
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/edytuj_watek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7565972704e0e4129e3b034-50341681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55faeaaabdbf9305812d2b3de24e1a83864e83a0' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/edytuj_watek.tpl',
      1 => 1309532956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7565972704e0e4129e3b034-50341681',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

	
<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza'])&&count($_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza'])){?>
	
	<div id="blad"><b>
		Błędnie wypełniony formularz. Proszę poprawić zaznaczone pola.
	</b></div>
<?php }?>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
    <fieldset>
        <legend>Edytuj wątek</legend>
        <div>
            <label for="nazwa">Nazwa wątku:</label>
            <input type="text" id="nazwa" name="nazwa" size="30" maxlength="100" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['nazwa'])){?><?php echo $_smarty_tpl->getVariable('dane')->value['nazwa'];?>
<?php }?>" />
        </div>
		  <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['nazwa'])){?>

            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['nazwa'];?>

            </div>      
        <?php }?>
        <div>
			<input type="hidden" name="id_watek" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_watek'];?>
" />
		</div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
</form>