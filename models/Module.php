<?php


include_once('../database/DB.php');

class Module{
    
    static public function addModule($data){
        $stmt = DB::connect()->prepare('INSERT INTO modules (nom,description) VALUES (:nom,:description)');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':description',$data['description']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function updateModule($data){
        $stmt = DB::connect()->prepare('UPDATE modules SET nom= :nom, description= :description WHERE id= :id');
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam(':id',$data['id']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function deleteModule($id){
        $stmt = DB::connect()->prepare('DELETE FROM modules WHERE id=?');
        if ($stmt->execute([$id])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function getAllModules(){
        $stmt = DB::connect()->prepare('SELECT * FROM modules');
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($rows);
        $stmt->close();
        $stmt = null;
    }

    static public function getModule($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM modules WHERE id=?');
            $stmt->execute([$id]);
            $module = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($module);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
        $stmt->close();
        $stmt = null;
    }

    static public function getModuleByName($nom) {
        try {
            $stmt = DB::connect()->prepare('SELECT id FROM modules WHERE nom = ?');
            $stmt->execute([$nom]);
            $module = $stmt->fetch(PDO::FETCH_ASSOC);
            return $module['id'];
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $stmt->close();
        $stmt = null;
    }
    


    static public function findModule($data){
        $search = $data['search'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM module WHERE LOWER(nom) LIKE LOWER(:keyword)');
            $stmt->bindParam(':keyword','%'.$search.'%');
            $stmt->execute();
            $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($modules);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
    }


}
?>