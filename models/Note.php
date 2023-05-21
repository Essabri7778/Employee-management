<?php

class Note {
    
    //Récuperer tous les note
    static public function getAllNotes(){
        $stmt = DB::connect()->prepare('SELECT * FROM notes');
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($notes);
        $stmt->close();
        $stmt = null;
    }

    //Récuperer une note par son id
    static public function getNote($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM notes WHERE id=?');
            $stmt->execute([$id]);
            $note = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($note);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
    //Récuperer une note par son id
    static public function getNote($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM notes WHERE id=?');
            $stmt->execute([$id]);
            $note = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($note);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
    //Récuperer une note par son id_evaluation
    static public function getNotesByIdEvaluation($id_evaluation){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM notes WHERE id_evaluation=?');
            $stmt->execute([$id_evaluation]);
            $notes = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($notes);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }
    //Récuperer une note par son id_etudiant
    static public function getNoteByIdEtudiant($id_etudiant){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM notes WHERE id_etudiant=?');
            $stmt->execute([$id_etudiant]);
            $notes = $stmt->fetch(PDO::FETCH_ASSOC);
                return json_encode($notes);
            }catch(PDOException $e){
                echo 'Error'. $e->getMessage();
            }
    }

    //ajouter une note
    static public function addNote($data){
        $stmt = DB::connect()->prepare('INSERT INTO notes (id_evaluation, id_etudiant, valeur) VALUES (:id_evaluation,:id_etudiant,:valeur)');
        $stmt->bindParam(':id_evaluation',$data['id_evaluation']);
        $stmt->bindParam(':id_etudiant',$data['id_etudiant']);
        $stmt->bindParam(':valeur',$data['valeur']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //mettre à jour une note
    static public function updateNote($data){
        $stmt = DB::connect()->prepare('UPDATE notes SET id_evaluation= :id_evaluation, id_etudiant= :id_etudiant, valeur= :valeur WHERE id= :id');
        $stmt->bindParam(':id_evaluation',$data['id_evaluation']);
        $stmt->bindParam(':id_etudiant',$data['id_etudiant']);
        $stmt->bindParam(':valeur',$data['valeur']);
        $stmt->bindParam(':id',$data['id']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //Supprimer une note
    static public function deleteNote($id){
        $stmt = DB::connect()->prepare('DELETE FROM notes WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
}