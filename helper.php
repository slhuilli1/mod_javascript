<?php
	class modJavascript{
		public static function addLibraries($params){
			
			if ($params->get("debogage") == "1")
			{
				echo '<div class="mode-debogage">Vous avez activé le mode déboggage du module mod_javascript</div>';
			}
			return($params);			
			
			
		}
	}
?>