<?php /* Smarty version Smarty-3.0.7, created on 2011-07-02 21:55:30
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/wyszukaj_tresc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1932633964e0f77b2312380-20326530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13670b16a3b0e56309a3005def376f93747ee117' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/wyszukaj_tresc.tpl',
      1 => 1309533147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1932633964e0f77b2312380-20326530',
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
	
	<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>
">
    <fieldset>
        <legend>Wyszukaj</legend>
        
        <div>
            <label for="szukane">Wpisz format do wyszukania</label>
            <input type="text" id="szukane" name="szukane" size="20" maxlength="45" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['szukane'])){?><?php echo $_smarty_tpl->getVariable('dane')->value['szukane'];?>
<?php }?>" />
        </div>
		  <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['szukane'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['szukane'];?>

            </div>      
        <?php }?>
	</form>
		