<?php
    require_once './config.php';
    class UserModel{

        private $db;

        function __construct(){
            $this->db = connection();
        }

        function getUser($usuario){
            $query= $this->db->prepare( "SELECT * FROM user WHERE user = ?");
            $query->execute(array($usuario));
            $user = $query->fetch(PDO::FETCH_OBJ);
            return $user;
        }
    }
?>