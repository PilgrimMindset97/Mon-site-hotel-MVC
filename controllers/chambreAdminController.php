<?php

if (estClient()) {
    header("location:?page=home");
    exit();
}

//traitement ajout
if (isset($_POST["ajouter"])) {
    extract($_POST);

    $type = explode("/", $_FILES["image"]["type"]);
    if ($type[0] == "image") {
        $img = $_FILES["image"]["tmp_name"];
        $img_name = uniqid().".jpg";
        if (ajouterChambre($nom, $prix, $description, $img_name)) {
            //on deplace l'image vers le dossier image
            move_uploaded_file($img, "images/".$img_name);

            setMessage("Ajout chambre avec succes");
            header("location:?page=chambreAdmin");
            exit();
        }else {
            setMessage("Erreur d'ajout chambre", "danger");
        }
    }else {
        setMessage("Veillez choisir une image","danger");
    }
}


if (isset($_GET["idDeleting"])) {
    if (supprimerUneChambre($_GET["idDeleting"])) {
        setMessage("Suppression avec success");
        header("location:?page=chambreAdmin");
        exit();
    }else {
        setMessage("Erreur de suppression chambre", "danger");
        
    }
}

$chambre = recupererTousLesChambres();

if (isset($_POST["modifier"])) {
    extract($_POST);

    if ($_FILES["image"]["size"]!==0 ) {
       $type = explode("/",  $_FILES["image"]["type"]);

       if ($type[0] == "image"){

            $img_name = uniqid().".jpg";
       }else {
           setMessage("Veillez choisir une image", "danger");
       }
    }else{
         $img_name = $c->image; 
    }

    $c = avoirUneChambre($_GET["id"]);

    if(mettreAjourLaChambre($c->id, $nom, $prix, $description, $img_name)){
        if($img_name != $c->image){
         move_uploaded_file($_FILES["image"]["tmp_name"], "images/".$img_name);   
        }

        setMessage("Modification chambre avec succes");
        header("location:?page=chambreAdmin");
        exit();
    }else{
        setMessage("Erreur de modification chambre", "danger");
        exit();
    }
    
}

if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
        $c = avoirUneChambre($_GET["id"]);
    }
    require_once("views/ajouterChambre.php");
}else {
    require_once("views/chambreAdmin.php"); 
}


