<?php

require_once('../models/AffectationEtudiantModule.php');
//Récuperation des données

//Methode Get
//  $id_module = isset($_GET['id_module']) ? $_GET['id_module'] : NULL;
//  $id_etudiant = isset($_GET['id_etudiant']) ? $_GET['id_etudiant'] : NULL;
//  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
//  $action = isset($_POST['action']) ? $_POST['action'] : NULL;

 //Methode Post
 $id_modules_list = isset($_POST['id_module']) ? $_POST['id_module'] : NULL;
 $id_etudiant = isset($_GET['id_etd']) ? intval($_GET['id_etd']) : NULL;
 $action = isset($_POST['action']) ? $_POST['action'] : NULL;
 $id_module = isset($_GET['id_module']) ? $_GET['id_module'] : NULL;



//traitement
if ($action == "ajouter") {
    $res = AffectationEtudiantModule::AddModulesOfEtudiant($id_etudiant,$id_modules_list);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "modifier") {
    $data = array(
        'id' => $id,
        'id_etudiant' => $id_etudiant,
        'id_module' => $id_module
    );
    $res = AffectationEtudiantModule::updateModulesOfEtudiant($old_id_modules,$new_id_modules , $id_etudiant);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = AffectationEtudiantModule::deleteAffectationsOfEtudiant($id_etudiant);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = AffectationEtudiantModule::getAllModulesOfEtudiant($id_etudiant);
    echo $res;
} else if ($action == "getEtdOfMdl") {
    $res = AffectationEtudiantModule::getEtdOfModule($id_module);
    echo $res;
} else {
    echo "action non reconnue";
}
