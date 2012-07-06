<?php /* Smarty version Smarty-3.0.7, created on 2011-07-02 21:57:17
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/dodaj_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3727184564e0f781d6dde46-35249754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20802ea4a9281cf2d6bf141536149d82eec2b3a8' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/dodaj_post.tpl',
      1 => 1309532915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3727184564e0f781d6dde46-35249754',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    
	
<?php if ($_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']&&count($_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza'])){?>
	<div id="blad"><b>
		Błędnie wypełniony formularz. Proszę poprawić zaznaczone pola.
	</b></div>
<?php }?>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
    <fieldset>
        <legend>Dodaj Post</legend>
        
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
            <input type="hidden" name="id_watek" value="<?php echo $_smarty_tpl->getVariable('pomocnicze')->value['id_watek'];?>
" />
        </div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
	</form>