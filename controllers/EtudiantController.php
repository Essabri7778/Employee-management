<?php 
error_reporting(0);
 session_start();
 require_once('../models/Etudiant.php');

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
 $adresse = isset( $_POST['adresse']) ? $_POST['adresse'] : NULL;
 $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : NULL;
 $mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : NULL;
 //ce champs est remplie dans l'ajout mais dans le update il est remplie
 $id = isset($_POST['id']) ? intval($_POST['id'])  : NULL;
 //on remplie ce champs en javaScript
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
        echo 'ok';
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
} else if ($action == "chercher") {
    $data = array('search' => $_POST['search']);
    $res = Etudiant::findEtudiant($data);
    echo $res;
} else if ($action == "modifierMdp") {
    $data = array(
        'nom' =>  $_SESSION['nom'],
        'prenom' =>  $_SESSION['prenom'] ,
        'mot_de_passe' => $_POST['nouveauMdp'] 
    );
    $res = Etudiant::updateMdp($data);
    if ($res == "ok"){
        $_SESSION['mdp'] = $_POST['nouveauMdp'];
        echo json_encode( array('mot_de_passe' => $_POST['nouveauMdp'] ));
    } 
    else
        echo "error";
}else if ($action == "modifierProfil") {
    $data = array(
        'id' => $_SESSION['id_etd'],
        'nom' =>  $nom ,
        'prenom' =>  $prenom ,
        'email' =>  $email ,
        'adresse' => $adresse ,
        'telephone' => $telephone
    );
    $res = Etudiant::updateEtudiantDoneByEtd($data);
    if ($res == "ok"){
        $_SESSION['email'] = $email;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['adresse'] = $adresse;
        $_SESSION['tele'] = $telephone;
        $_SESSION['nom_complet'] = $nom." ".$prenom;
        echo json_encode($data);
    } 
    else
        echo "error";
}else {
    echo "action non reconnue";
}