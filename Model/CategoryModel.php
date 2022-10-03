<?php

class CategoryModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cart;charset=utf8','root','');
        
    }
        
    function getCat($categoria){
        $sentencia = $this->db->prepare( "select p.id,p.nombre,c.nombre as categoria from producto p join categoria c on p.categoria=c.id_categoria  WHERE id_categoria=?");
        $sentencia -> execute(array($categoria));
        $productos = $sentencia->fetchALL(PDO::FETCH_OBJ); 
        return $productos;
    }

    function getCatById($id){
        $sentencia = $this->db->prepare( "select * from categoria WHERE id_categoria=?");
        $sentencia -> execute(array($id));
        $categoria = $sentencia->fetch(PDO::FETCH_OBJ);
        return $categoria; 
    }

    function getListCategory(){
        $sentencia = $this->db->prepare( "select * from categoria ");
        $sentencia -> execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias; 
    }

    function insertCat($nombre){
        $sentencia = $this->db->prepare("INSERT INTO categoria(nombre) VALUES(?)");
        $sentencia->execute(array($nombre));
    }

    function deleteCatFromDB($id_categoria){
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id_categoria,));
    }
    function editCatFromDB($id_categoria, $nombre){
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre=? WHERE id_categoria=?");
        $sentencia->execute(array($nombre,$id_categoria));
    }
}