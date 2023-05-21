<?php

//Récuperation des données

 //Methode Get
//  $id_module = isset($_GET['id_module']) ? $_GET['id_module'] : NULL;
//  $id_etudiant = isset($_GET['id_etudiant']) ? $_GET['id_etudiant'] : NULL;
//  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
//  $action = isset($_POST['action']) ? $_POST['action'] : NULL;

 //Methode Post
 $id_module = isset($_POST['id_module']) ? $_POST['id_module'] : NULL;
 $id_etudiant = isset($_POST['id_etudiant']) ? $_POST['id_etudiant'] : NULL;
 $id = isset($_POST['id']) ? $_POST['id'] : NULL;
 $action = isset($_POST['action']) ? $_POST['action'] : NULL;


//traitement
if ($action == "ajouter") {
    $data = array(
        'id_etudiant' => $id_etudiant ,
        'id_module' => $id_module 
    );
    $res = AffectationEtudiantModule::addAffectation($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "modifier") {
    $data = array(
        'id' => $id ,
        'id_etudiant' => $id_etudiant ,
        'id_module' => $id_module 
    );
    $res = AffectationEtudiantModule::updateAffectation($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = AffectationEtudiantModule::deleteAffectation($id);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = AffectationEtudiantModule::getAffectation($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = AffectationEtudiantModule::getAllAffectations();
    echo $res;
} else {
    echo "action non reconnue";
}