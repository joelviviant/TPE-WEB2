<?php

class UserModel{

        private $db;
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cart;charset=utf8','root','');
        }

        function getUser($email){
            $query = $this->db->prepare('SELECT * FROM users WHERE email=?'); 
            $query ->execute([$email]);
            return $query->fetch(PDO::FETCH_OBJ);
        }


        function getUserByRol($rol){
            $query =$this->db->prepare("SELECT id FROM users WHERE rol=?");
            $query->execute(array($rol));
            $users = $query->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }

        function deleteUser($id){
            $query = $this -> db->prepare("DELETE FROM users WHERE id=?");
            $query->execute(array($id));
        }
}