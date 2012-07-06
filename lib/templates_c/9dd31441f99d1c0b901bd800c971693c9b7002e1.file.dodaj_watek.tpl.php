<?php /* Smarty version Smarty-3.0.7, created on 2011-07-02 21:57:57
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/dodaj_watek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5907030354e0f7845efc041-93157092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dd31441f99d1c0b901bd800c971693c9b7002e1' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/dodaj_watek.tpl',
      1 => 1309532923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5907030354e0f7845efc041-93157092',
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
        <legend>Dodaj wątek</legend>
        <div>
            <label for="nazwa">Nazwa wątku:</label>
            <input type="text" id="nazwa" name="nazwa" size="30" maxlength="100" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['nazwa'])){?>
																							<?php echo $_smarty_tpl->getVariable('dane')->value['nazwa'];?>
<?php }?>" />
        </div>
		  <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['nazwa'])){?>
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['nazwa'];?>

            </div>      
        <?php }?>
        <div>
            <label for="tresc">Treść:</label>
            <textarea id="tresc" name="tresc" rows="10" cols="40"><?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['tresc'])){?>
																		<?php echo $_smarty_tpl->getVariable('dane')->value['tresc'];?>
<?php }?></textarea>
        </div>
		<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['tresc'])){?>
           <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['tresc'];?>

            </div>      
		<?php }?>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
</form>