

<?php

$data = pagination("chambres",2);
$chambres= $data[0];
$totalPages = $data[1];
$pageActuelle = $data[2];
//on peut faire sans pagination la ligne ci-dessous
//$chambres = recupererTousLesChambres();

require_once("views/chambre.php"); 
