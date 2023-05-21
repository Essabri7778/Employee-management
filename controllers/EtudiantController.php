<?php 
 

 //Récuperation des données
 //Methode Get
//  $nom = isset($_GET['nom']) ? $_GET['nom'] : NULL;
//  $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : NULL;
//  $email = isset($_GET['email']) ? $_GET['email'] : NULL;
//  $adresse = isset($_GET['adresse']) ? $_GET['adresse'] : NULL;
//  $telephone = isset($_GET['telephone']) ? $_GET['telephone'] : NULL;
//  $mot_de_passe = isset($_GET['mot_de_passe']) ? $_GET['mot_de_passe'] : NULL;
//  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
//  $action = isset($_POST['action']) ? $_POST['action'] : NULL;

 //Methode Post
 $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
 $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
 $email = isset($_POST['email']) ? $_POST['email'] : NULL;
 $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : NULL;
 $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : NULL;
 $mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : NULL;
 $id = isset($_POST['id']) ? $_POST['id'] : NULL;
 $action = isset($_POST['action']) ? $_POST['action'] : NULL;
 
 //traitement
 if ($action == "ajouter") {
    $data = array(
        'nom' =>  $nom ,
        'prenom' =>  $prenom ,
        'email' =>  $email ,
        'adresse' => $adresse ,
        'telephone' => $telephone ,
        'mot_de_passe' => $mot_de_passe ,

    );
    $res = Etudiant::addEtudiant($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "modifier") {
    $data = array(
        'id' =>  $id ,
        'nom' =>  $nom ,
        'prenom' =>  $prenom ,
        'email' =>  $email ,
        'adresse' => $adresse ,
        'telephone' => $telephone ,
        'mot_de_passe' => $mot_de_passe ,

    );
    $res = Etudiant::updateEtudiant($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = Etudiant::deleteEtudiant($id);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = Etudiant::getEtudiant($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = Etudiant::getAllEtudiants();
    echo $res;
} else {
    echo "action non reconnue";
}