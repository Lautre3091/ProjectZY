<?php

class PageComics {
	
	private $listeModules;
	
	function __construct() {
		$this->listeModules[0]["Nom"] = "Téléchargements";
		$this->listeModules[0]["Classe"] = "Telechargements";
	}

	public function afficherCorp() {
		echo "<div id=\"tabsUi\">";
		echo "	<ul>";
		foreach ( $this->listeModules as $element ) 
		echo "		<li><a href=\"Pages/Comics/[M!".$element["Classe"]."]_affichage.php\">".$element["Nom"]."</a></li>";
		echo "	</ul>";
		echo "</div>";
	}
	
};