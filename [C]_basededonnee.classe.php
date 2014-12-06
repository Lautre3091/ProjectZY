<?php

class BaseDeDonnee {

	public $idConnect;

	/*Connexion à la base de donnée passée en param*/
	function __construct($hote,$base,$compte,$mdp)
	{	
		$serveur="mysql:host=".$hote.";dbname=".$base; 
		try{
			$this -> idConnect=new PDO($serveur,$compte,$mdp);
		}catch(PDOException $except){ 
			echo "<script>alert(\"Erreur lors de la connexion au serveur MySQL :<br />".$except->getMessage()."\")</script>"; 
			die(); 
		}
	}
	
	public function affichageErreur(){
		$erreur=$this -> idConnect->errorInfo();
		die("<script>alert(\"Code erreur ".$this -> idConnect->errorCode()." ".$erreur[2]."\")</script>");
		return false;
	}
};

?>