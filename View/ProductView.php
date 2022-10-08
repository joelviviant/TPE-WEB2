<?php

require_once "./Libs/smarty/libs/Smarty.class.php";


class ProductView{

    private $smarty;

    function __construct(){
    
        $this->smarty = new Smarty();
    }

     function showProducts($categorias, $productos, $error = null){
        $this->smarty->assign('titulo','Inventario de Productos');
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('error',$error);
        $this->smarty->display('Templates\product.tpl');
    }

    function showListProducts($productos){
        $this->smarty->assign('titulo','Lista de Productos');
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('Templates\productList.tpl');
    }

    function showHomeLocation(){
        header("Location:".BASE_URL. "cart"); 
    }

    function showLoginLocation(){
        header("Location:".BASE_URL. "login"); 
    }

    function showErrorLocation(){
        header("Location:".BASE_URL. "error"); 
    }

    function showError(){
        $this->smarty->assign('titulo','ATENCION!!');
        $this->smarty->display('Templates\error.tpl');
    }


    function showProduct($producto){
        $this->smarty->assign('titulo','Detalle de Producto');
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('Templates\productDetail.tpl');          
    }

    function showEdit($producto,$categories){
        $this->smarty->assign('titulo','Edite el Producto');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('producto', $producto);
        $this->smarty->display('Templates\productEdit.tpl');
           
    }
           
    
}