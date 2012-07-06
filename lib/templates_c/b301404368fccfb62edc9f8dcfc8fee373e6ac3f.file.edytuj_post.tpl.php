<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:49:35
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/edytuj_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1636239124e0e40efb75173-65270483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b301404368fccfb62edc9f8dcfc8fee373e6ac3f' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/edytuj_post.tpl',
      1 => 1309538772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1636239124e0e40efb75173-65270483',
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
        <legend>Edytuj Post</legend>
        
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
            <input type="hidden" name="id_post" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_post'];?>
" />
        </div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Wyślij" />
        </div>
    </fieldset>
	</form>