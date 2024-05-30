<?php

if (isset($_GET["id"])) {
    $c = avoirUneChambre($_GET["id"]);
} else {
    header("Location:?page=home");
    exit();
}
$chambre = recupererTousLesChambres();

require_once("views/detailChambre.php");
