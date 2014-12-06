<?php

class Telechargements {
	
	private $listeModules;
	private $moduleCourant;
	
	function __construct() {
		$this->listeModules[0]["Nom"] = "Téléchargements";
		$this->listeModules[0]["Classe"] = "Telechargements";
	}

	private function fenetreAjoutLiens() {
		echo "	<div id=\"fenetreAjoutLiens\" title=\"Ajouter des Liens\">";
		echo "	<textarea id=\"listeLiens\" rows=\"10\" cols=\"50\">";
		echo "	</textarea> ";
		echo "	</div>";
	}
	public function afficherCorp() {
		echo "<button>Ajouter liens</button>";
	}
	public function chargementScript() {		
		echo" <script>";
		echo"$(function() {";
		echo"	$( \"button\" ).button()";
		echo"});";
		echo" </script>";
	}
};

?>