{*
	 Plik testowy
	
	 @package testowy.tpl
	 @author Alicja cyganiewicz
	 @link http://www.wierzba.wzks.uj.edu.pl/~09_cyganiewicz/php/Projekt_PHP
	*}
	
	{if isset($test)}
		
		{if (is_array($test) && count($test)){
			foreach($test as $klucz => $dana){
				echo '<div>'.$klucz.'to '.$dana.'</div>';
			}
		}
		else{
			echo '<div>'.$test.'</div>';
		}
	}