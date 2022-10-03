<?php

class ProductModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cart;charset=utf8','root','');
    }

    function getProductos(){
        $sentencia = $this->db->prepare( "select p.id,p.nombre,c.nombre as categoria,c.id_categoria from producto p join categoria c on p.categoria=c.id_categoria");
        $sentencia -> execute();
        $productos = $sentencia->fetchALL(PDO::FETCH_OBJ); 
        return $productos; 
    }

    function getCategorias(){
        $sentencia = $this->db->prepare( "select * from categoria");
        $sentencia -> execute();
        $categorias = $sentencia->fetchALL(PDO::FETCH_OBJ); 
        return $categorias; 
    }

    function insertProducto($nombre, $categoria){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, categoria) VALUES(?, ?)");
        $sentencia->execute(array($nombre, $categoria));
    }

    function deleteProdFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id,));
    }

    

    function getProd($id){
        $sentencia = $this->db->prepare( "select p.id,p.nombre,c.nombre as categoria,c.id_categoria from producto p join categoria c on p.categoria=c.id_categoria  WHERE id=?");
        $sentencia -> execute(array($id));
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto; 
    }

    function editProdFromDB($id, $nombre, $categoria){
        $sentencia = $this->db->prepare("UPDATE producto SET nombre=?, categoria=?  WHERE id=?");
        $sentencia->execute(array($nombre, $categoria, $id));
    }

}