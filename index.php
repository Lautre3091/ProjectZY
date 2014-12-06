<!DOCTYPE html>
<?php

include '[C]_inclusion.php';

$site = new Site();

echo "	<body id=\"body\">";
$site->menu();
$site->afficherCorp();
$site->chargementLibScript();
echo"</html>";

?>