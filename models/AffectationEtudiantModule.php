<?php
require_once('../database/DB.php');
class AffectationEtudiantModule
{
    /**
     * Récuperer tous les Affectation d'un etudiant
     * 
     * @param
     * @return
     * 
     */
    static public function getAllModulesOfEtudiant($id_etudiant)
    {
        $stmt = DB::connect()->prepare('SELECT a.id_etudiant, a.id_module,m.nom, m.description FROM `affectation_etudiant_module` a INNER JOIN modules m ON a.id_module = m.id WHERE a.id_etudiant = ?');
        $stmt->execute([$id_etudiant]);
        $affectations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($affectations);
        $stmt->close();
        $stmt = null;
    }
    //Récuperer une affectation par son id
    static public function getAffectation($id)
    {
        try {
            $stmt = DB::connect()->prepare('SELECT * FROM affectation_etudiant_module WHERE id=?');
            $stmt->execute([$id]);
            $affectation = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($affectation);
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
        }
        $stmt->close();
        $stmt = null;
    }
    //ajouter une affectation
    static public function addAffectation($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO affectation_etudiant_module (id_etudiant, id_module) VALUES (:id_etudiant,:id_module)');
        $stmt->bindParam(':id_etudiant', $data['id_etudiant']);
        $stmt->bindParam(':id_module', $data['id_module']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //mettre à jour une affectation
    static public function updateAffectation($data)
    {
        $stmt = DB::connect()->prepare('UPDATE affectation_etudiant_module SET id_etudiant= :id_etudiant, id_module= :id_module WHERE id= :id');
        $stmt->bindParam(':id_etudiant', $data['id_etudiant']);
        $stmt->bindParam(':id_module', $data['id_module']);
        $stmt->bindParam(':id', $data['id']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    //Supprimer une affectation
    static public function deleteAffectation($id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM affectation_etudiant_module WHERE id=?');
        if ($stmt->execute([$id])) {
            return 'ok';
        } else {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    /**
     * Supprimer les affectation associées à un étudiant
     * 
     * @param int $id_etudiant l'id de l'étudiant
     * @param boolean si la requete s'est effectuée avec succes$
     * 
     */

    static public function deleteAffectationsOfEtudiant($id_etudiant)
    {
        try {
            $stmt = DB::connect()->prepare('DELETE FROM affectation_etudiant_module WHERE id_etudiant=?');
            if ($stmt->execute([$id_etudiant])) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

   
    /**
     * Ajouter les modules associés à un etudiant
     *
     *@param
     *@param
     *@return
     */
    static public function AddModulesOfEtudiant($id_etudiant, $id_modules_list)
    {
        for ($i = 0; $i < 6; $i++) {
            $stmt = DB::connect()->prepare('INSERT INTO affectation_etudiant_module (id_etudiant, id_module) VALUES (:id_etudiant,:id_module)');
            $stmt->bindParam(':id_etudiant', $id_etudiant);
            $stmt->bindParam(':id_module', $id_modules_list[$i]);
            if (!$stmt->execute()) {
                return 'error';
            }
        }
        return 'ok';
        $stmt->close();
        $stmt = null;
    }

     /**
     * Modifier les modules associés à un étudiant
     *
     * @param array $old_id_modules les anciens identifiants associés à un étudiant
     * @param array $new_id_modules les nouveaux identifiants associés à un étudiant
     * @param int $id_etudiant l'identifiant de l'étudiant
     * @return boolean si la requête s'est effectuée avec succès
     */
    static public function updateModulesOfEtudiant($old_id_modules, $new_id_modules, $id_etudiant)
    {
        $res1 = AffectationEtudiantModule::deleteAffectationsOfEtudiant($id_etudiant);
        $res2 = AffectationEtudiantModule::AddModulesOfEtudiant($id_etudiant, $new_id_modules);
        if ($res1 === 'ok' && $res2 === 'ok') {
            return 'ok';
        }
        else return 'error';
        $stmt->close();
        $stmt = null;
    }
    
        // try {
        //     for ($i = 0; $i < 6; $i++) {
        //         $stmt = DB::connect()->prepare('UPDATE affectation_etudiant_module SET id_module= :new_id_module WHERE (id_etudiant= :id_etudiant AND id_module= :old_id_module)');
        //         $stmt->bindParam(':id_etudiant', $id_etudiant);
        //         echo($old_id_modules[$i]);
        //         echo($new_id_modules[$i]);
        //         $stmt->bindParam(':old_id_module', $old_id_modules[$i]);
        //         $stmt->bindParam(':new_id_module', $new_id_modules[$i]);
        //         if (!$stmt->execute()) {
        //             return 'error';
        //         }
        //     }
        //     return 'ok';
        // } catch (PDOException $e) {
        //     echo 'Error: ' . $e->getMessage();
        // }
  




    //List des etudiants affectés à un module
    //
    //Récuperer tous les Affectation
    /* static public function getAllAffectations(){
        $stmt = DB::connect()->prepare('SELECT * FROM affectation_etudiant_module');
        $stmt->execute();
        $affectations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($affectations);
        $stmt->close();
        $stmt = null;
    }*/


    //Récuperer une affectation par son id
    /*  static public function getAffectation($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM affectation_etudiant_module WHERE id=?');
            $stmt->execute([$id]);
            $affectation = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($affectation);
        }catch(PDOException $e){
            echo 'Error'. $e->getMessage();
        }
        $stmt->close();
        $stmt = null;
    }*/
    //ajouter une affectation
    /* static public function addAffectation($data){
        $stmt = DB::connect()->prepare('INSERT INTO affectation_etudiant_module (id_etudiant, id_module) VALUES (:id_etudiant,:id_module)');
        $stmt->bindParam(':id_etudiant',$data['id_etudiant']);
        $stmt->bindParam(':id_module',$data['id_module']);
        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }*/

    //mettre à jour une affectation
    /*static public function updateAffectation($data){
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
    }*/

    //Supprimer les affectation des modules associés à un étiudiant
    /*static public function deleteModulesOfStudent($id_student){
        $stmt = DB::connect()->prepare('DELETE FROM affectation_etudiant_module WHERE id_student=?');
        if ($stmt->execute([id_student])){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }*/


    //List des etudiants affectés aux modules
    static public function getEtdOfModule($id_module)
    {
        try {
            $stmt = DB::connect()->prepare('SELECT a.id_etudiant, e.id As etd_id, e.nom As etd_nom, e.prenom, a.id_module, m.id, m.nom
                FROM affectation_etudiant_module a
                JOIN etudiant e ON a.id_etudiant = e.id
                JOIN modules m ON a.id_module = m.id
                WHERE a.id_module = ?');
            $stmt->execute([$id_module]);
            $etdOfMdl = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($etdOfMdl);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}