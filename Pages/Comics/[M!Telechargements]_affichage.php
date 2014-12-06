<?php 
include_once 'Modules/Telechargements/[M!Telechargements]_telechargements.classe.php'; 

$module = new Telechargements();

echo "	<body id=\"body\">";
$module->afficherCorp();
$module->chargementScript();
echo"</html>";

?>