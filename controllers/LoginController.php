<?php


require_once('../models/LoginAdmin.php');
require_once('../models/LoginEtudiant.php');


    $login = isset($_POST['login']) ? $_POST['login'] : NULL;
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : NULL;
    $role = isset($_POST['role']) ? $_POST['role'] : NULL;
    
    if ($role == "admin") {
        $admnin = LoginAdmin::logAdmin($login);
        if($admnin != false){
            if($mdp == $admnin->mot_de_passe){
                $_SESSION['logged'] = true;
                $_SESSION['login'] = $admnin->login;
                $_SESSION['nom_complet'] = $admnin->nom." ".$admnin->prenom;
               
                echo 'ok';
            }else{
                echo 'errorMdp';
            }
        }else{
            echo 'error';
        }
      
    } else if ($role == "etudiant") {
        $etd = LoginEtudiant::logEtudiant($login);
        if($etd !== false){
            if($mdp == $etd->mot_de_passe){
                $_SESSION['logged'] = true;
                $_SESSION['email'] = $etd->email;
                $_SESSION['nom_complet'] = $etd->nom." ".$etd->prenom;
                echo 'ok';
            }else{
                echo 'errorMdp';
            }
        }else{
            echo 'error';
        }
    } else {
        echo "role non reconnue";
    }