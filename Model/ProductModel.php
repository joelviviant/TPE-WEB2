<?php

class ProductModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_cart;charset=utf8','root','');
    }

    function getProductos(){
        $sentencia = $this->db->prepare( "select p.id,p.nombre,p.marca,c.nombre as categoria,c.id_categoria from producto p join categoria c on p.categoria=c.id_categoria");
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

  

    function insertProducto($nombre, $categoria,$cantidad,$marca,$imagen){
        $destination = "Uploads/";
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, categoria,cantidad,marca,imagen) VALUES(?,?,?,?,?)");
        if(isset($imagen) && !empty($imagen)){
            move_uploaded_file($imagen['tmp_name'], $destination .$imagen['name']);
            $sentencia->execute(array($nombre, $categoria,$cantidad,$marca,$destination .$imagen['name']));
        }else{
            $sentencia->execute(array($nombre, $categoria,$cantidad,$marca,null));
        }
    }

    function deleteProdFromDB($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id,));
    }

    

    function getProd($id){
        $sentencia = $this->db->prepare( "select p.id,p.nombre,p.cantidad,p.marca,p.imagen ,c.nombre as categoria,c.id_categoria from producto p join categoria c on p.categoria=c.id_categoria  WHERE id=?");
        $sentencia -> execute(array($id));
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto; 
    }

    function editProdImageFromDB($id, $nombre, $categoria,$cantidad,$marca,$imagen){
        $destination = "Uploads/";
        if(isset($imagen) && !empty($imagen)){
            move_uploaded_file($imagen['tmp_name'], $destination .$imagen['name']);
        }
        $sentencia = $this->db->prepare("UPDATE producto SET nombre=?, categoria=?, cantidad=?, marca=? , imagen=? WHERE id=?");
        $sentencia->execute(array($nombre, $categoria,$cantidad,$marca,$destination .$imagen['name'], $id));
    }
    
    function editProdFromDB($id, $nombre, $categoria,$cantidad,$marca){
      
        $sentencia = $this->db->prepare("UPDATE producto SET nombre=?, categoria=?, cantidad=?, marca=?  WHERE id=?");
        $sentencia->execute(array($nombre, $categoria,$cantidad,$marca,$id));
    }

}