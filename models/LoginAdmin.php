<?php

    class LoginAdmin{

        static public function logAdmin($login){
            $stmt = DB::connect()->prepare('SELECT * FROM admin WHERE login = :login');
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            $stmt->close();
            $stmt = null;
        }

    }