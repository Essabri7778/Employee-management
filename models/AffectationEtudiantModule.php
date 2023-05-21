<?php

class AffectationEtudiantModel {

    //Récuperer tous les Affectation
    static public function getAllAffectations(){
        $stmt = DB::connect()->prepare('SELECT * FROM affectation_etudiant_module');
        $stmt->execute();
        $affectations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($affectations);
        $stmt->close();
        $stmt = null;
    }
        //Récuperer une affectation par son id
    static public function getAffectation($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM affectation_etudiant_module WHERE id=?');
            $stmt->execute([$id]);
            $affectation = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($affectation);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
    //ajouter une affectation
    static public function addAffectation($data){
        $stmt = DB::connect()->prepare('INSERT INTO affectation_etudiant_module (id_etudiant, id_module) VALUES (:id_etudiant,:id_module,:valeur)');
        $stmt->bindParam(':id_etudiant',$data['id_etudiant']);
        $stmt->bindParam(':id_module',$data['id_module']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //mettre à jour une affectation
    static public function updateAffectation($data){
        $stmt = DB::connect()->prepare('UPDATE affectation_etudiant_module SET id_etudiant= :id_etudiant, id_module= :id_module WHERE id= :id');
        $stmt->bindParam(':id_etudiant',$data['id_etudiant']);
        $stmt->bindParam(':id_module',$data['id_module']);
        $stmt->bindParam(':id',$data['id']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //Supprimer une affectation
    static public function deleteAffectation($id){
        $stmt = DB::connect()->prepare('DELETE FROM affectation_etudiant_module WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
}