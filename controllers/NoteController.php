<?php

//Récuperation des données

 //Methode Get
//  $id_evaluation = isset($_GET['id_evaluation']) ? $_GET['id_evaluation'] : NULL;
//  $id_etudiant = isset($_GET['id_etudiant']) ? $_GET['id_etudiant'] : NULL;
//  $valeur = isset($_GET['valeur']) ? $_GET['valeur'] : NULL;
//  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
//  $action = isset($_POST['action']) ? $_POST['action'] : NULL;

 //Methode Post
 $id_evaluation = isset($_POST['id_evaluation']) ? $_POST['id_evaluation'] : NULL;
 $id_etudiant = isset($_POST['id_etudiant']) ? $_POST['id_etudiant'] : NULL;
 $valeur = isset($_POST['valeur']) ? $_POST['valeur'] : NULL;
 $id = isset($_POST['id']) ? $_POST['id'] : NULL;
 $action = isset($_POST['action']) ? $_POST['action'] : NULL;


//traitement
if ($action == "ajouter") {
    $data = array(
        'id_etudiant' => $id_etudiant ,
        'id_evaluation' => $id_evaluation ,
        'valeur' => $valeur ,
    )
    $res = Note::addNote($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "modifier") {
    $data = array(
        'id' => $id ,
        'id_etudiant' => $id_etudiant ,
        'id_evaluation' => $id_evaluation ,
        'valeur' => $valeur ,
    )
    $res = Note::updateNote($data);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "supprimer") {
    $res = Note::deleteNote($id);
    if ($res == "ok")
        echo "ok";
    else
        echo "error";
} else if ($action == "afficher") {
    $res = Note::getNote($id);
    echo $res;
} else if ($action == "afficherTous") {
    $res = Note::getAllNotes();
    echo $res;
} else {
    echo "action non reconnue";
}