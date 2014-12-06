<?php

define("FICHIER_XML","ComicInfo.xml");

class Comics{

	private $dossier;
	private $nomFichier;
	private $scraper;
	private $volume;
	private $anneeDebut;
	private $editeur;
	private $titre;
	private $numero;
	private $webAdresse;
	private $nombrePage;
	
	function __construct($cheminFichier){
		
		$infoFichier = new SplFileInfo($cheminFichier);
		$this->nomFichier = $infoFichier->getFilename();
		$this->dossier = $infoFichier->getPath();
		
		switch($infoFichier->getExtension()){
			case "zip" :
			case "cbz" : $xml = $this->lireArchiveZip($cheminFichier); break; 
			default : $xml = false;
		}  
		
		if (!$xml) $this->scraper = false;
		else {
			$this->scraper = true;
			$this->lectureFichierXml($xml); 
		}
	}
	
	private function lireArchiveZip($cheminFichier){
		$zip = new ZipArchive();
		if ($zip->open($cheminFichier))
			return $zip->getFromName(FICHIER_XML);
	}
	private function lectureFichierXml($fichier){
		$domDoc = new DOMDocument();
		$domDoc->loadXML($fichier);
		$this->editeur = $this->recupValeurElement($domDoc,"Publisher");
		$this->volume = $this->recupValeurElement($domDoc,"Series");
		$this->anneeDebut = $this->recupValeurElement($domDoc,"Volume");
		$this->numero = $this->recupValeurElement($domDoc,"Number");
		$this->titre = $this->recupValeurElement($domDoc,"Title");
		$this->nombrePage = $this->recupValeurElement($domDoc,"PageCount");
		$this->webAdresse = $this->recupValeurElement($domDoc,"Web");
		$this->volume = str_replace("/", "_", $this->volume);
		if($this->numero<10) $this->numero = "0".$this->numero;
	}
	private function recupValeurElement($domDoc,$nomElement){
		$listeElement = $domDoc->getElementsByTagName($nomElement);
		foreach($listeElement as $element) return $element->nodeValue;
	}
	
	public function renommer(){
		if ($this->scraper){
			$nom = $dossier."/".$this->titre;
			$nom .= "V".$this->volume;
			$nom .= "#".$this->numero;
			$nom .= ".cbz";
			rename ($dossier."/".$this->nomFichier,$nom);
		}
	}
/*	public function deplacer(){
		$deplacer=false;
		$cheminDossier = $this->creationChemin();
		if ($this->chemin == $cheminDossier."/".$this->nomFichier) echo $this->nomFichier." non déplacé\n";
		else {
			echo "Déplacement du comics \"".$this->nomFichier."\"\n";
			if (is_dir($cheminDossier)) $deplacer = true;
			else {
				echo "Le dossier \"".$cheminDossier."\" n'existe pas\n";
				if (mkdir($cheminDossier,"0755",true)){
					$deplacer = true;
					echo "Le dossier \"".$cheminDossier."\" a été crée\n";
					$cheminFichier = $cheminDossier."/".$this->nomFichier;
				}
			}
		}
		if ($deplacer) $this->deplacerAux($cheminDossier."/".$this->nomFichier);
	}
	private function creationChemin(){
		if (!$this->scraper)$chemin = $this->dossier["racine"]."/".$this->dossier["scraper"];
			else{
				$chemin = $this->dossier["racine"]."/".$this->dossier["comics"];
				$chemin = $chemin."/".$this->editeur."/".$this->serie."/V".$this->volume;;
			}
		 
		return $chemin;
	}
	private function deplacerAux($fichier){
		if (rename($this->chemin, $fichier)) echo $this->nomFichier." déplacé vers ".$fichier."\n";
		else echo "Déplacement echoué\n";
		
	}
	*/
	public function getWebAdresse(){ return $this->webAdresse;}
	public function getNombrePage(){ return $this->nombrePage;}
	public function getAnneeDebut(){ return $this->anneeDebut;}
	public function getEditeur(){ return $this->editeur;}
	public function estScraper(){ return $this->scraper;}
	public function getNumero(){ return $this->numero;}
	public function getVolume(){ return $this->volume;}
	public function getTitre(){ return $this->titre;}
};

?>