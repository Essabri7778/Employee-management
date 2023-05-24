<?php
include_once("../database/DB.php");
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
        $stmt->close();
        $stmt = null;
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
    static public function updateEvaluation($data){
        $stmt = DB::connect()->prepare('UPDATE evaluation SET type= :type, id_module= :id_module, date= :date, heure= :heure, salle= :salle WHERE id= :id');
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
    static public function deleteEvaluation($id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM evaluation WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //Afficher la liste des évaluations
    //avec le nom de module associé
    static public function listEvaluation()
    {
        $query = 'SELECT e.id, e.id_module, m.nom, e.type, e.date, e.heure, e.salle FROM evaluation e INNER JOIN modules m ON e.id_module = m.id';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute();
        $evaluations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($evaluations);
        $stmt->close();
        $stmt = null;
    }

    static public function findEvaluation($data){
        $search = $data['search'];
        $search = '%'.$search.'%';
        try{
            $query = 'SELECT e.id, e.id_module, m.nom, e.type, e.date, e.heure, e.salle FROM evaluation e INNER JOIN modules m ON e.id_module = m.id WHERE LOWER(e.type) LIKE LOWER(:keyword) OR LOWER(m.nom) LIKE LOWER(:keyword)';
            $stmt = DB::connect()->prepare($query);
            $stmt->bindParam(':keyword',$search);
            $stmt->execute();
            $evaluations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($evaluations);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }

    static public function getAllEvaluationsOfEtudiant($id){
        try{
            $query = 'SELECT a.id_etudiant, a.id_module, m.nom, e.type, e.date, e.heure, e.salle FROM affectation_etudiant_module a INNER JOIN modules m ON a.id_module = m.id INNER JOIN evaluation e ON a.id_module=e.id_module WHERE a.id_etudiant = ?';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute([$id]);
            $evaluations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($evaluations);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }

    static public function getCountEvaluationOfModulesList($list_module){
        $count_list=[];
        try {
            for ($i=0; $i < count($list_module) ; $i++) { 
                $query = 'SELECT COUNT(*) As module FROM evaluation WHERE id_module=?';
                $stmt->execute([$id]);
                $evaluations = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $count_list[$i]=$evaluations["module"];
            }
            return json_encode($count_list);
        } catch (PDOException $e) {
            echo 'Error'. $e->getMessage();
        }
        
    }

    static public function findEvaluationsOfEtudiant($data){
        $id = $data['id'];
        $search = $data['search'];
        $search = '%'.$search.'%';
        try{
            $query = 'SELECT a.id_etudiant, a.id_module, m.nom, e.type, e.date, e.heure, e.salle FROM affectation_etudiant_module a INNER JOIN modules m ON a.id_module = m.id INNER JOIN evaluation e ON a.id_module=e.id_module WHERE a.id_etudiant = :id AND (LOWER(e.type) LIKE :keyword OR LOWER(m.nom) LIKE :keyword)';
            $stmt = DB::connect()->prepare($query);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':keyword',$search);
            $stmt->execute();
            $evaluations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($evaluations);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
}