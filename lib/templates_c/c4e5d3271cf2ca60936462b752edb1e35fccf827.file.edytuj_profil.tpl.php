<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:52:02
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/edytuj_profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2255766314e0e413451ac69-28214952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4e5d3271cf2ca60936462b752edb1e35fccf827' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/edytuj_profil.tpl',
      1 => 1309553496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2255766314e0e413451ac69-28214952',
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
        <legend>Edytuj swój profil</legend>
		<input type="hidden" name="id_uz" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_uz'];?>
" />
		<input type="hidden" name="poprzedni_email" value="<?php echo $_smarty_tpl->getVariable('dane')->value['poprzedni_email'];?>
" />
		<input type="hidden" name="login" value="<?php echo $_smarty_tpl->getVariable('dane')->value['login'];?>
" />
        <div>
            <label for="login">Login użytkownika: <?php echo $_smarty_tpl->getVariable('dane')->value['login'];?>
 </label>
        </div>
		
		<div>
            <label for="haslo">Nowe Hasło (5-16, cyfra, znak) [ pozostaw PUSTE jeśli nie chcesz dokonywać zmiany hasła!]</label>
            <input type="password" id="haslo" name="haslo" size="20" maxlength="16" />
        </div>
		  <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['haslo'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['haslo'];?>

            </div>      
        <?php }?>
		
		<div>
            <label for="haslopowt">Powtórz Nowe Hasło </label>
            <input type="password" id="haslpowto" name="haslopowt" size="20" maxlength="16" />
        </div>
		  <?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['haslopowt'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['haslopowt'];?>

            </div>      
        <?php }?>
		
		<div>
            <label for="imie">Imię </label>
            <input type="text" id="imie" name="imie" size="20" maxlength="45" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['imie'])){?>
																							<?php echo $_smarty_tpl->getVariable('dane')->value['imie'];?>
<?php }?>" />
        </div>
		<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['imie'])){?>
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['imie'];?>

            </div>      
        <?php }?>
		
		<div>
            <label for="nazwisko">Nazwisko </label>
            <input type="text" id="login" name="nazwisko" size="20" maxlength="20" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['nazwisko'])){?>
																								<?php echo $_smarty_tpl->getVariable('dane')->value['nazwisko'];?>
<?php }?>" />
        </div>
		<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['nazwisko'])){?>
				
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['nazwisko'];?>

            </div>      
        <?php }?>
		
		<div>
            <label for="email">E-mail </label>
            <input type="text" id="mail" name="mail" size="20" maxlength="20" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['mail'])){?><?php echo $_smarty_tpl->getVariable('dane')->value['mail'];?>
<?php }?>" />
			@
			<input type="text" id="domena" name="domena" size="20" maxlength="20" value="<?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['domena'])){?><?php echo $_smarty_tpl->getVariable('dane')->value['domena'];?>
<?php }?>" />
        </div>
		<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['email'])){?>
       
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['email'];?>

            </div>      
        <?php }?>
		
        <div>
            <label for="podpis">Podpis (do 250)</label>
            <textarea id="podpis" name="podpis" rows="4" cols="40"><?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['podpis'])){?><?php echo $_smarty_tpl->getVariable('dane')->value['podpis'];?>
<?php }?></textarea>
        </div>
		<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['podpis'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['podpis'];?>

            </div>      
        <?php }?>
		
		<div>
			<label for="data_ur"> Data urodzenia </label>
			
				<select name="dzien">
					<option <?php if (!isset($_smarty_tpl->getVariable('dane',null,true,false)->value['dzien'])){?> selected <?php }?> value=""></option>
					<?php  $_smarty_tpl->tpl_vars['dzien'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dni')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['dzien']->key => $_smarty_tpl->tpl_vars['dzien']->value){
?>
					<option <?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['dzien'])&&$_smarty_tpl->getVariable('dane')->value['dzien']==$_smarty_tpl->tpl_vars['dzien']->value){?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dzien']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['dzien']->value;?>
 </option>
					<?php }} ?>
				</select>
				
				<select name="miesiac">
					<option <?php if (!isset($_smarty_tpl->getVariable('dane',null,true,false)->value['miesiac'])){?> selected <?php }?> value=""></option>
					<?php  $_smarty_tpl->tpl_vars['miesiac'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('miesiace')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['miesiac']->key => $_smarty_tpl->tpl_vars['miesiac']->value){
?>
					<option <?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['miesiac'])&&$_smarty_tpl->getVariable('dane')->value['miesiac']==$_smarty_tpl->tpl_vars['miesiac']->value){?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['miesiac']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['miesiac']->value;?>
 </option>
					<?php }} ?>
				</select>
				
				<select name="rok">
					<option <?php if (!isset($_smarty_tpl->getVariable('dane',null,true,false)->value['rok'])){?> selected <?php }?> value=""></option>
					<?php  $_smarty_tpl->tpl_vars['rok'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rok']->key => $_smarty_tpl->tpl_vars['rok']->value){
?>
					<option <?php if (isset($_smarty_tpl->getVariable('dane',null,true,false)->value['rok'])&&$_smarty_tpl->getVariable('dane')->value['rok']==$_smarty_tpl->tpl_vars['rok']->value){?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['rok']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['rok']->value;?>
 </option>
					<?php }} ?>
				</select>
			
		</div>
		<?php if (isset($_smarty_tpl->getVariable('status',null,true,false)->value['komunikaty']['bledy_formularza']['dzien'])){?>
        
            <div>
                <?php echo $_smarty_tpl->getVariable('status')->value['komunikaty']['bledy_formularza']['dzien'];?>

            </div>      
        <?php }?>
		
		<div> Pola oznaczone  są obowiązkowe </div>
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Edytuj" />
        </div>
    </fieldset>
</form>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
	<input type="hidden" name="id_uz" value="<?php echo $_smarty_tpl->getVariable('dane')->value['id_uz'];?>
" />
	<input type="hidden" name="usuwanie" value="tak" />
	<input type="submit" id="przycisk" name="przycisk" value="Usuń profil" />
</form>