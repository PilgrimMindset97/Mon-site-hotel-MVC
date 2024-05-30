<?php

if (isset($_POST["ajouter"]) ){
   extract($_POST);

   // on va hacher le mot de passe
    $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT,["cost"=>12]);
    if (CreerUnCompte($prenom, $nom, $adresse, $tel, $cni, $email, $motdepasse, $role)){
        supprimerLesDonneesDeLInput();
        SetMessage("Ajout Employe avec success");
        header("location:?page=employeAdmin");
        exit();
    }else {
        SetMessage("Erreur d'ajout", "danger");
        header("location:?page=employeAdmin");
        exit();
    }
    enregistrerLesDonnesDeLInput();
}

if (isset($_GET["idDeleting"])) {
    if (supprimerUnUtilisateur($_GET["idDeleting"])) {
        setMessage("Suppression avec success");
        header("location:?page=employeAdmin");
        exit();
    }else {
        setMessage("Erreur de suppression employe", "danger");
        
    }
}


if (isset($_POST["modifier"])) {
    extract($_POST);

    if (mettreAjourlesDonneesUtilisateur($_GET["id"], $prenom, $nom, $adresse, $tel, $cni, $email, $role) ){
        setMessage("Mise a jour avec success");
        supprimerLesDonneesDeLInput();
        header("Location:?page=employeAdmin");
        exit();
    }
    else {
        setMessage("Erreur Mise a jour", "warning");
        enregistrerLesDonnesDeLInput();

    }
}


$employes = recupererTousLesEmployes();


if (isset($_GET["type"])) {
    if (isset($_GET["id"])){
        $e = avoirInfoUtilisateur($_GET["id"]);
    }
    require_once("views/ajoutEmploye.php");
}else {
    require_once("views/employeAdmin.php");
}

