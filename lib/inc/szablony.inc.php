<?php
    /**
     * Obsługa szablonów.
     *
     * @package szablony.inc.php
     * @author Alicja Cyganiewicz
	 * @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
     */

    //podpięcie bibioteki Smarty:
    include dirname(dirname(__FILE__)) . '/smarty/Smarty.class.php';

    //inicjacja obiektu Smarty:
    $smarty = new Smarty();

    $smarty->template_dir = dirname(dirname(__FILE__)) . '/templates';
    $smarty->compile_dir = dirname(dirname(__FILE__)) . '/templates_c';
   
    /**
     * Wyświetlenie szablonu.
     *
     * @param array $strona Dane do wyświetlenia w szablonie
     * @param string $layout "Layout" strony
     * @global object $smarty Obiekt klasy Smarty
     *
     */
    function wyswietl_strone($strona, $layout = 'index.html') {
        global $smarty;
        $smarty->assign($strona);
        $smarty->display($layout);
    }
?>