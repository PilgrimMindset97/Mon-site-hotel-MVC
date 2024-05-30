<?php
//connexion base de donnee
try {
    $db = new PDO("mysql:host=localhost;dbname=kawsara","root","");

} catch (PDOException $th) {
    setMessage($th->getMessage(),"danger");
}
function CreerUnCompte($prenom, $nom, $adresse, $tel, $cni, $email, $motdepasse, $role){
    //utilisation de la variable $
    global $db;
    try {
       $q = $db->prepare("INSERT INTO users VALUES(null,:prenom, :nom, :adresse, :tel, :cni, :email, :motdepasse, :role)"); 
       return $q->execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "adresse" => $adresse,
            "tel" => $tel,
            "cni" => $cni,
            "email" => $email,
            "motdepasse" => $motdepasse,
            "role" => $role
       ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }

}

function ajouterBlog($titre, $description, $image){
    global $db ;
    try {
        $q = $db->prepare("INSERT INTO blogs  VALUES(null ,:titre, :description, :image)");
        return $q->execute([
            "titre" => $titre,
            "description" => $description,
            "image" => $image
        ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    } 
}

function listeDesBlogs() {
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM blogs ORDER BY id DESC");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function recupererUnBlog($id){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM blogs  WHERE id =:id");
        $q->execute([
            "id" => $id
        ]);
        return $q->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function modifierUnBlog($id, $titre, $description, $image){
    global $db;
    try {
        $q = $db->prepare("UPDATE blogs SET titre =:titre, description =:description, image =:image WHERE id =:id");
        return $q->execute([
            "id" => $id,
            "titre" => $titre,
            "description" => $description,
            "image" => $image
        ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function supprimerUnBlog($id){
     global $db;
     try {
         $q = $db->prepare("DELETE FROM blogs WHERE id =:id");
         return $q->execute(["id" => $id]);
     } catch (PDOException $th) {
         setMessage($th->getMessage(),"danger");
     }
}

function seConnecter($email){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE email =:email");
        $q->execute([
            "email" => $email
        ]);

        return $q->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function recupererTousLesClients(){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE role =:role");
        $q->execute(["role" =>"client"]);
        return $q->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function supprimerUnUtilisateur($id){
    global $db;
    try {
        $q = $db->prepare("DELETE FROM users WHERE id =:id");
        return $q->execute(["id" => $id]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}


function recupererTousLesEmployes(){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE (role = :role1 OR role = :role2) AND id != :id");
        $q->execute([
            "role1" => "admin",
            "role2" => "employe",
            "id" => $_SESSION["user"]->id
        ]);
        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(), "danger");
    }
}


function avoirInfoUtilisateur($id){
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM users WHERE id =:id");
        $q->execute(["id" => $id]);

       return $q->fetch(PDO::FETCH_OBJ); 
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function mettreAjourlesDonneesUtilisateur($id, $prenom, $nom, $adresse, $tel, $cni, $email, $role)
{
    global $db;
    try {
        $q = $db->prepare("UPDATE users SET prenom =:prenom, nom =:nom, adresse =:adresse, tel =:tel, cni =:cni, email =:email, role =:role WHERE id =:id");
         return $q->execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "adresse" => $adresse,
            "tel" => $tel,
            "cni" => $cni,
            "email" => $email,
            "role" => $role,
            "id" => $id
         ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}


Function mettreAjourMotDePasse($id, $mdp){
global $db;
try {
      $q = $db->prepare("UPDATE users SET motdepasse =:mdp WHERE id =:id");
      return $q->execute([
        "mdp" => $mdp,
        "id" => $id
      ]);
} catch (PDOException $th) {
    setMessage($th->getMessage(),"danger");
}

}

function ajouterChambre($nom, $prix, $description, $image)
{
    global $db;
    try {
        $q = $db->prepare("INSERT INTO chambres (nom, prix, description, image) VALUES (:nom, :prix, :description, :image)");
        return $q->execute([
            "nom" => $nom,
            "prix" => $prix,
            "description" => $description,
            "image" => $image
        ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
        // Ajouter un message de débogage
        //echo "Erreur lors de l'ajout de la chambre : " . $th->getMessage();
    }
    
}


function recupererTousLesChambres(){
    global $db;

    try {
        $q = $db->prepare("SELECT * FROM chambres ORDER BY id DESC");
        $q->execute();

        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function avoirUneChambre($id){
    global $db;
    try {
        $q =$db->prepare("SELECT * FROM chambres WHERE id =:id");

        $q->execute(["id" => $id]);
        
        return $q->fetch(PDO::FETCH_OBJ);
    }  catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function mettreAjourLaChambre($id, $nom, $prix, $description, $image){
    global $db;
    try {
        $q = $db->prepare("UPDATE chambres SET nom =:nom, prix =:prix, description =:description, image =:image WHERE id =:id");
        return $q->execute([
            "nom" => $nom,
            "prix" => $prix,
            "description" => $description,
            "image" => $image,
            "id" => $id
        ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}


function supprimerUneChambre($id){
    global $db;
    try {
        $q = $db->prepare("DELETE FROM chambres WHERE id = :id");
        $success = $q->execute(["id" => $id]);
        if (!$success) {
            $errorInfo = $q->errorInfo();
            setMessage("Erreur lors de la suppression de la chambre: " . $errorInfo[2], "danger");
        } else {
            // Suppression réussie
            return true;
        }
    } catch (PDOException $th) {
        setMessage($th->getMessage(), "danger");
    }
    
}

function ajoutReservation($reference, $date_debut, $date_fin, $prix_total, $client_id, $chambre_id)
{
    global $db;

    try {
        $q = $db->prepare("INSERT INTO reservations VALUES(null, :reference, :date_debut, :date_fin, :prix_total, :client_id, :chambre_id, :status)");
        return $q->execute([
            "reference" => $reference,
            "date_debut" => $date_debut,
            "date_fin" => $date_fin,
            "prix_total" => $prix_total,
            "client_id" => $client_id,
            "chambre_id" => $chambre_id,
            "status" => 0
        ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}


function mesReservations($client_id){
    global $db;
    try {
        $q = $db->prepare("SELECT r.id as id, r.statut as statut, prix_total, c.nom as nomchambre, date_debut, date_fin, reference 
        FROM reservations r
        INNER JOIN chambres c ON r.chambre_id = c.id
        WHERE r.client_id = :client_id
        ");
        $q->execute(["client_id" => $client_id]);

        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function recupererTousLesReservations(){

    global $db;
    try {
        $q = $db->prepare("SELECT r.id as id, u.tel as tel, u.prenom as prenomclient, u.nom as nomclient, r.statut as statut, prix_total, c.nom as nomchambre, date_debut, date_fin, reference 
        FROM reservations r, chambres c, users u
        WHERE r.chambre_id = c.id AND r.client_id = u.id
        ");
        $q->execute();

        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function changerStatutReservation($id, $statut){
    global $db;
    try {
        $q = $db->prepare("UPDATE reservations SET statut =:statut WHERE id =:id");
        return $q->execute([
            "statut" => $statut,
            "id" => $id
        ]);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function changerStatutChambre($id,$statut){
    global $db;
    try {
        $q = $db->prepare("UPDATE chambres SET statut =:statut WHERE id = :id");
        return $q->execute([
            "statut" => $statut,
            "id" => $id
        ]);

    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}


function recuperUneReservation($id) {
    global $db;
    try {
        $q = $db->prepare("SELECT * FROM reservations WHERE id =:id");
        $q->execute(["id" => $id]);
        return $q->fetch(PDO::FETCH_OBJ);
    }catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function modifierUneReservation($id, $date_debut, $date_fin, $prix_total, $client_id, $chambre_id, $statut){
    global $db;
    try {
        $q = $db->prepare("UPDATE reservations SET date_debut = :date_debut, date_fin = :date_fin, prix_total = :prix_total, client_id = :client_id, chambre_id = :chambre_id, statut = :statut WHERE id = :id");

        return $q->execute([
            "id" => $id,
            "date_debut" => $date_debut,
            "date_fin" => $date_fin,
            "prix_total" => $prix_total,
            "client_id" => $client_id,
            "chambre_id" => $chambre_id,
            "statut" => $statut
        ]);
        
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function montantVenteParMois($annee){
    global $db;
    try {
        $q = $db->prepare("SELECT MONTH(date_debut) as mois, SUM(prix_total) as montant 
                           FROM reservations 
                           WHERE YEAR(date_debut) = :annee AND statut = :statut GROUP BY MONTH(date_debut)");
        $q->execute(["annee" => $annee,
                     "statut" => 1]);
        return $q->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}


function elementsPageActuelle($table, $debut, $limite)
{
    global $db;
    try {
    $q = $db->prepare("SELECT * FROM $table LIMIT $debut, $limite");
    $q->execute();
    return $q->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    } 
    
}


function nombreTotalElements($table){
    global $db;
    try {
        $q = $db->prepare("SELECT COUNT(*) FROM $table");
        $q->execute();
        return $q->fetchColumn();
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}

function dateChambreReservee($id){
    global $db;
    try {
        $q = $db->prepare("SELECT  date_fin
                           FROM chambres c, reservations r
                           WHERE c.id = r.chambre_id AND c.id =:id
                           ORDER BY c.id DESC");
        $q->execute(["id" => $id]);
        return $q->fetch(PDO::FETCH_OBJ);                
    } catch (PDOException $th) {
        setMessage($th->getMessage(),"danger");
    }
}