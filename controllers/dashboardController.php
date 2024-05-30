<?php


$anneeActuelle = date("Y");
$moisActuel = date("m");

$nbreDeClients = count(recupererTousLesClients());
$recetteMensuelles = 0;
$nombreChambre = count(recupererTousLesChambres());

$mtParMois = montantVenteParMois($anneeActuelle); 

$moisDeLAnnee = [
    "1" => "janvier",
    "2" => "fevrier",
    "3" => "mars",
    "4" => "avril",
    "5" => "mai",
    "6" => "juin",
    "7" => "juillet",
    "8" => "aout",
    "9" => "septembre",
    "10" => "octobre",
    "11" => "novembre",
    "12" => "decembre"
];

$montantReservationsParMois = [];

foreach ($moisDeLAnnee as $key => $mois) {
    $trouve = false;
    foreach ($mtParMois as $vente) {
       if ($vente->mois == $key) {
            $montantReservationsParMois[$mois] = $vente->montant;
            $trouve = true;
       }
       if ($vente->mois == $moisActuel) {
        $recetteMensuelles = $vente->montant;
       }
    }

    if ($trouve == false && $key <= $moisActuel) {
        $montantReservationsParMois[$mois] = 0;
    }
}

require_once("views/dashboard.php");