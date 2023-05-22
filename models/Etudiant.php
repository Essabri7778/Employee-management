<?php
include_once("../database/DB.php");

class Etudiant {

    //Récuperer tous les étudiants
    static public function getAllEtudiants(){
        $stmt = DB::connect()->prepare('SELECT * FROM etudiant');
        $stmt->execute();
        $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($etudiants);
        $stmt->close();
        $stmt = null;
    }

    //Récuperer un étudiant par son id
    static public function getEtudiant($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM etudiant WHERE id=?');
            $stmt->execute([$id]);
            $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($etudiant);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
        $stmt->close();
        $stmt = null; 
    }

    //ajouter un étudiant
    static public function addEtudiant($data){
        $stmt = DB::connect()->prepare('INSERT INTO etudiant (nom, prenom, adresse, email, telephone, mot_de_passe) VALUES (:nom,:prenom,:adresse,:email,:telephone,:mot_de_passe)');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':adresse',$data['adresse']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':telephone',$data['telephone']);
        $stmt->bindParam(':mot_de_passe',$data['mot_de_passe']);
        
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //mettre à jour un étudiant
    static public function updateEtudiant($data){
        $stmt = DB::connect()->prepare('UPDATE etudiant SET nom= :nom, prenom= :prenom, adresse= :adresse, email= :email, telephone= :telephone, mot_de_passe= :mot_de_passe WHERE id= :id');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':adresse',$data['adresse']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':telephone',$data['telephone']);
        $stmt->bindParam(':mot_de_passe',$data['mot_de_passe']);
        $stmt->bindParam(':id',$data['id']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //Supprimer un étudiant
    static public function deleteEtudiant($id){
        $stmt = DB::connect()->prepare('DELETE FROM etudiant WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    //TODO:
    //Trouver un étudiant par son nom ou prenom
    static public function findEtudiant($data){
        $search = $data['search'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM etudiant WHERE LOWER(nom) LIKE LOWER(:keyword) OR LOWER(prenom) LIKE LOWER(:keyword)');
            $stmt->bindParam(':keyword','%'.$search.'%');
            $stmt->execute();
            $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($etudiants);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
}