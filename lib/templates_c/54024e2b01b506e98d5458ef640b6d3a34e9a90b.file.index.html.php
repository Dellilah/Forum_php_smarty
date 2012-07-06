<?php /* Smarty version Smarty-3.0.7, created on 2011-07-01 23:29:16
         compiled from "/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:7292083044e0e3c2c1af611-49222392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54024e2b01b506e98d5458ef640b6d3a34e9a90b' => 
    array (
      0 => '/home/epi/09_cyganiewicz/public_html/php/Projekt_PHP_SMARTY_plus_mod/CMS/lib/templates/index.html',
      1 => 1309532971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7292083044e0e3c2c1af611-49222392',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>FORUM</title>
    </head>
    <body bgcolor="#CCFFFF">
        <div id="naglowek" style="text-align: center; font-size: 200%"><a href="glowna_watki.php"> Forum Mieszane </a></div>
        <div id="menu" bgcolor="#C2DFFF">
			<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>
        <div id="tresc">
            <?php if ($_smarty_tpl->getVariable('zawartosc')->value){?>
                <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('zawartosc')->value).".tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			<?php }else{ ?>
				<?php $_template = new Smarty_Internal_Template("404.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			<?php }?>
        </div>
        <div id="stopka"></div>
    </body>
</html>