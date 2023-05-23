<?php
session_start();
require_once('../models/Evaluation.php');
//Récuperation des données

 //Methode Get
//  $type = isset($_GET['type']) ? $_GET['type'] : NULL;
//  $id_module = isset($_GET['id_module']) ? $_GET['id_module'] : NULL;
//  $date = isset($_GET['date']) ? $_GET['date'] : NULL;
//  $heure = isset($_GET['heure']) ? $_GET['heure'] : NULL;
//  $salle = isset($_GET['salle']) ? $_GET['salle'] : NULL;
//  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
//  $action = isset($_POST['action']) ? $_POST['action'] : NULL;

 //Methode Post
 $type = isset($_POST['type']) ? $_POST['type'] : NULL;
 $id_module = isset($_POST['id_module']) ? $_POST['id_module'] : NULL;
 $date = isset($_POST['date']) ? $_POST['date'] : NULL;
 $heure = isset($_POST['heure']) ? $_POST['heure'] : NULL;
 $salle = isset($_POST['salle']) ? $_POST['salle'] : NULL;
 $id = isset($_POST['id']) ? $_POST['id'] : NULL;
 $action = isset($_POST['action']) ? $_POST['action'] : NULL;


//traitement
if ($action == "ajouter") {
    $data = array(
        'id_module' => $id_module ,
        'type' => $type ,
        'date' => $date ,
        'heure' => $heure ,
        'salle' => $salle ,
    );
    $res = Evaluation::addEvaluation($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "modifier") {
    $data = array(
        'id' => $id ,
        'id_module' => $id_module ,
        'type' => $type ,
        'date' => $date ,
        'heure' => $heure ,
        'salle' => $salle ,
    );
    $res = Evaluation::updateEvaluation($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = Evaluation::deleteEvaluation($id);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = Evaluation::getEvaluation($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = Evaluation::listEvaluation();
    echo $res;
}else if ($action == "chercher") {
    $data = array('search' => $_POST['search']);
    $res = Evaluation::findEvaluation($data);
    echo $res;
}else if($action == "afficherMesEval"){
    $id = $_SESSION['id_etd'];
    $res = Evaluation::getAllEvaluationsOfEtudiant($id);
    echo $res;
}  else {
    echo "action non reconnue";
}