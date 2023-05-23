<?php
session_start();

require_once('../models/LoginAdmin.php');
require_once('../models/LoginEtudiant.php');


    $login = isset($_POST['login']) ? $_POST['login'] : NULL;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : NULL;
    $role = isset($_POST['role']) ? $_POST['role'] : NULL;
    
    if ($role === "admin") {
        $admin = LoginAdmin::logAdmin($login);
        if($admin != false){
            if($mdp == $admin->mot_de_passe){
                $_SESSION['logged'] = true;
                $_SESSION['login'] = $admin->login;
                $_SESSION['nom'] = $admin->nom;
                $_SESSION['prenom'] = $admin->prenom;
                $_SESSION['nom_complet'] = $admin->nom." ".$admin->prenom;
                echo 'okAdmin';
            }else{
                echo 'errorMdp';
            }
        }else{
            echo 'error';
        }
      
    } else if ($role === "etudiant") {
        $etd = LoginEtudiant::logEtudiant($login);
        if($etd !== false){
            if($mdp == $etd->mot_de_passe){
                $_SESSION['logged'] = true;
                $_SESSION['id_etd'] = $etd->id;
                $_SESSION['email'] = $etd->email;
                $_SESSION['nom'] = $etd->nom;
                $_SESSION['prenom'] = $etd->prenom;
                $_SESSION['mdp'] = $etd->mot_de_passe;
                $_SESSION['adresse'] = $etd->adresse;
                $_SESSION['tele'] = $etd->telephone;
                $_SESSION['nom_complet'] = $etd->nom." ".$etd->prenom;
                echo 'okEtudiant';
            }else{
                echo 'errorMdp';
            }
        }else{
            echo 'error';
        }
    }else {
        echo "role non reconnue";
    }