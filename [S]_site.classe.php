<?php 

class Site{
 
	private $pageEnCour;
	private $listePages;
	
	function __construct()	{		
		$this->listePages[0]="Comics";
		$this->head();
	}
	
	private function testPage()	{
		if (!isset($_POST["actionPage"])) $this->pageEnCour=new PageComics(); //Par défaut 
		else{
			switch ($_POST["actionPage"]){
				case "Comics" : $this->pageEnCour=new PageComics(); //Si Comics a été choisis
			}	
		}
	}
	
	private function head(){
		echo "<html>";
		echo "	<head>";
	    echo "		<title>Projet ZY</title>";
	    echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"[C]_style.css\" />";
	    echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"ThemeJqueryUI/jquery-ui-1.10.3.custom.min.css\" />"; //Theme du site
		echo "		<meta charset=\"UTF-8\">";
  		echo "	</head>";
	}
	
	function menu(){
		echo "<div id=\"menu\">";	
			echo "<ul id=\"menuUi\">";
			foreach ($this->listePages as $page)	$this->creerItemMenu($page);
			echo "</ul>";
		echo "</div>";
	}
	
	function afficherCorp(){		
		echo "	<div id=\"corp\">"; 
		$this->testPage();
		$this->pageEnCour->afficherCorp();
		echo "	</div>";
	}	
	
	private function creerItemMenu($page){	
		echo "	<li>";
		echo "		<a href=\"#\" class=\"lienMenuPages\">".$page."</a>";
		echo "	</li>";
	}	
	
	function chargementLibScript() {
		echo"	</body>"; 
		echo" 	<script src=\"//code.jquery.com/jquery-1.9.1.js\"></script>"; 
		echo" 	<script src=\"//code.jquery.com/ui/1.10.4/jquery-ui.js\"></script>"; 		
		echo"	<script language = \"Javascript\" src=\"[S]_script.js\"></script>";
		switch (get_class($this->pageEnCour)){
			case "PageComics" : 		
				echo" <script language = \"Javascript\" src=\""._DIR_PAGE_COMICS_."/[P!Comics]_script.js\"></script>";
				break;
		}
		
	}
};

?>