<?php

$reservations = recupererTousLesReservations();

if (isset($_GET["type"])) {
    $r = recuperUneReservation($_GET["id"]);
    if ($_GET["type"] == "valider") {
        if (changerStatutReservation($r->id, 1)) {
            changerStatutChambre($r->chambre_id, 1);
           setMessage("Reservation validee avec success");
            header("location:?page=reservationAdmin");
            exit();
        }else {
            setMessage("Erreur de validation reservation", "danger");
        }
    }elseif ($_GET["type"] == "rejeter") {
        if (changerStatutReservation($r->id, 2)) {
           setMessage("Rejeter validee avec success");
            header("location:?page=reservationAdmin");
            exit();
        }else {
            setMessage("Erreur de rejet", "danger");
        }
    }
}

if (isset($_POST["modifier"])) {
    extract($_POST);

    $aujourdhui = new DateTime();

    $dd = new DateTime($date_debut);
    $df = new DateTime($date_fin);

    if ($aujourdhui->diff($dd)->format("%R%a")<0) {
        setMessage("La date d'entrée ne peut pas être antérieure à la date d'aujourd'hui", "danger");
    }elseif ($aujourdhui->diff($df)->format("%R%a")<0) {
        setMessage("La date de depart ne peut pas être antérieure à la date d'aujourd'hui", "danger");
    }elseif ($dd->diff($df)->format("%R%a")<0) {
        setMessage("La date d'entrée ne peut pas être superieur à la date de depart", "danger");
    }else {
        $c = avoirUneChambre($chambre_id);
        if ($c) {
            $prix_total = intval($dd->diff($df)->format("%R%a")) * $c->prix;
            

            if (modifierUneReservation($_GET["id"], $date_debut, $date_fin, $prix_total, $client_id, $chambre_id, $statut)) {
                setMessage("Mise a jour de  la reservation avec success!");
                supprimerLesDonneesDeLInput();
                header("Location:?page=reservationAdmin");
                exit();
            }else {
                setMessage("Erreur de mise a jour reservation", "danger");
            }
        }else {
           setMessage("Veuillez selectionner une chambre d'abord") ;
        }
    }
}

if (isset($_GET["type"]) && $_GET["type"] == "edit") {
    $r = recuperUneReservation($_GET["id"]);
    $chambres = recupererTousLesChambres();
    $clients = recupererTousLesClients();
    require_once("views/editReservation.php");
} else {
    require_once("views/reservationAdmin.php");
}


