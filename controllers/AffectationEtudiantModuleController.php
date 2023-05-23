<?php
session_start();
require_once('../models/AffectationEtudiantModule.php');
require_once('../models/Evaluation.php');
//Récuperation des données

//Methode Get
//  $id_module = isset($_GET['id_module']) ? $_GET['id_module'] : NULL;
//  $id_etudiant = isset($_GET['id_etudiant']) ? $_GET['id_etudiant'] : NULL;
//  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
//  $action = isset($_POST['action']) ? $_POST['action'] : NULL;

//Methode Post
$id_modules_list = isset($_POST['id_modules_list']) ?  explode(",", $_POST['id_modules_list'])  : NULL;
$id_etudiant = isset($_POST['id_etd']) ? intval($_POST['id_etd']) : NULL;
$action = isset($_POST['action']) ? $_POST['action'] : NULL;
$id_old_modules_list = isset($_POST['id_old_modules_list']) ?  explode(",", $_POST['id_old_modules_list'])  : NULL;
$id_module = isset($_GET['id_module']) ? $_GET['id_module'] : NULL;


 $id_module = $id_module = isset($_POST['id_module']) ? $_POST['id_module'] : NULL;


//traitement
if ($action == "ajouter") {
    $res = AffectationEtudiantModule::AddModulesOfEtudiant($id_etudiant, $id_modules_list);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "modifier") {

    $res = AffectationEtudiantModule::updateModulesOfEtudiant($id_old_modules_list, $id_modules_list, $id_etudiant);
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
} else if ($action == "afficher") {//i need it
    $res = AffectationEtudiantModule::getAllModulesOfEtudiant($id_etudiant);
    echo $res;
} else if ($action == "getEtdOfMdl") {
    $res = AffectationEtudiantModule::getEtdOfModule($id_module);
    echo $res;
}else if($action == "populateModuleCard") {
    $res = AffectationEtudiantModule::getAllModulesOfEtudiant($_SESSION["id_etd"]);
    echo $res;
}
    // $list_module =json_decode( AffectationEtudiantModule::getAllModulesOfEtudiant($_SESSION["id_etd"]));
    // $list=[];
    // for ($i=0; $i <count($list_module) ; $i++) { 
    //     $list[$i] = $list_module[$i]["id_module"];
    // }
    // $res = Evaluation::getCountEvaluationOfModulesList($list);
    // echo $res;
else {
    echo "action non reconnue";
}
