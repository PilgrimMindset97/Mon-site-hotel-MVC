<?php

$title = "Liste des blogs";
if (isset($_POST["ajouter"])) {
    extract($_POST);

    $type = explode("/", $_FILES["image"]["type"]);

    if ($type[0] == "image") {
        $img = $_FILES["image"]["tmp_name"];
        $img_name = uniqid().".jpg";
        if (ajouterBlog($titre, $description, $img_name)) {
            move_uploaded_file($img, "images/".$img_name);
            setMessage("Ajout blog avec success!");
            header("Location:?page=blogAdmin");
            exit();
        }else {
            setMessage("Erreur lors de l'ajout", "danger");
        }
    }else 
    {
        setMessage("Veuillez choisir une image", "danger");
} 
}  

if (isset($_POST["modifier"]) ){
    $error = false;
    extract($_POST);

    $b = recupererUnBlog($_GET["id"]);
    if ($_FILES["image"]["size"] != 0) {
        $type = explode("/", $_FILES["image"]["type"]);

    if ($type[0] == "image") {
        $img = $_FILES["image"]["tmp_name"];
        $img_name = uniqid().".jpg";
    }else 
    {
        setMessage("Veuillez choisir une image", "danger");
        $error = true;
} 
    } else {
        $img_name = $b->image;
    }

    if (!$error) {
        if (modifierUnBlog($b->id, $titre, $description, $img_name)) {
            if ($b->image != $img_name) {
                move_uploaded_file($img, "images/".$img_name);
            }
            setMessage("Mise a jour du blog avec success!");
            header("Location:?page=blogAdmin");
            exit();
        }else {
            setMessage("Erreur lors de la mise a jour", "danger");
        }
    }
    
}

if (isset($_GET["idDeleting"])) {
    if (supprimerUnBlog($_GET["idDeleting"])) {
        setMessage("Suppression avec success");
        header("location:?page=blogAdmin");
        exit();
    }else {
        setMessage("Erreur de suppression blog", "danger");
        
    }
}

$blogs = listeDesBlogs(); 

if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
       $b = recupererUnBlog($_GET["id"]);
    }
    $title = $_GET["type"]== "add" ? "Formulaire d'ajout Blog" : "Formulaire d'edition Blog"; 
}

require_once("views/blogAdmin.php");
