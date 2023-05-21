<?php

class Evaluation {
 
    //Récuperer tous les évaluations
    static public function getAllEvaluations(){
        $stmt = DB::connect()->prepare('SELECT * FROM evaluation');
        $stmt->execute();
        $evaluations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($evaluations);
        $stmt->close();
        $stmt = null;
    }

    //Récuperer une évaluation par son id
    static public function getEvaluation($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM evaluation WHERE id=?');
            $stmt->execute([$id]);
            $evaluation = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($evaluation);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }

    //ajouter une évaluation
    static public function addEvaluation($data){
        $stmt = DB::connect()->prepare('INSERT INTO evaluation (type, id_module, date, heure, salle) VALUES (:type,:id_module,:date,:heure,:salle)');
        $stmt->bindParam(':type',$data['type']);
        $stmt->bindParam(':id_module',$data['id_module']);
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':heure',$data['heure']);
        $stmt->bindParam(':salle',$data['salle']);
        
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //mettre à jour une évaluation
    static public function updatEevaluation($data){
        $stmt = DB::connect()->prepare('UPDATE evaluation SET type= :type, id_module= :id_module, date= :date, heure= :heure, salle= :salle, mot_de_passe= :mot_de_passe WHERE id= :id');
        $stmt->bindParam(':type',$data['type']);
        $stmt->bindParam(':id_module',$data['id_module']);
        $stmt->bindParam(':date',$data['date']);
        $stmt->bindParam(':heure',$data['heure']);
        $stmt->bindParam(':salle',$data['salle']);
        $stmt->bindParam(':id',$data['id']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //Supprimer une évaluation
    static public function deleteEvaluation($id){
        $stmt = DB::connect()->prepare('DELETE FROM evaluation WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
}