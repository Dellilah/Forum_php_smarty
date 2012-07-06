<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:29:16
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/nawigacja.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19888044464e0e3c2c337586-82061624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76eb57de080c44ca809709dfe2a0f8b2e2d67b23' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/nawigacja.tpl',
      1 => 1309533081,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19888044464e0e3c2c337586-82061624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

    <nav align="center">
    <?php if ($_smarty_tpl->getVariable('aktualna_strona')->value>1){?>
    
            <a href="<?php echo $_smarty_tpl->getVariable('link')->value;?>
<?php echo $_smarty_tpl->getVariable('aktualna_strona')->value-1;?>
" title="poprzednia strona">
               poprzednia strona  
            </a>    
	<?php }?>
   
    <?php echo $_smarty_tpl->getVariable('aktualna_strona')->value;?>

   
    <?php if ($_smarty_tpl->getVariable('aktualna_strona')->value<$_smarty_tpl->getVariable('ilosc_stron')->value){?>
    
            <a href="<?php echo $_smarty_tpl->getVariable('link')->value;?>
<?php echo $_smarty_tpl->getVariable('aktualna_strona')->value+1;?>
" title="następna strona">
                następna strona
            </a>    
    <?php }?>
    </nav>