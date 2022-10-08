<?php

require_once "./Model/ProductModel.php";
require_once "./View/ProductView.php";
require_once "./Model/CategoryModel.php";
require_once "./Helpers/AuthHelper.php";

class ProductController{

    private $model;
    private $view;
    private $authHelper;


    function __construct(){
           $this->model = new ProductModel();
           $this->view = new ProductView();
           $this->modelCategory = new CategoryModel();
           $this->authHelper = new AuthHelper();

    }
    function showHome(){
        $products = $this->model->getProductos();
        $categories = $this->modelCategory-> getListCategory();
        $this->view->showProducts($categories, $products);    
    } 


    function addProd(){
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $cantidad =$_POST['cantidad'];
        $marca =$_POST['marca'];
        $products = $this->model->getProductos();
        $categories = $this->modelCategory-> getListCategory();
        if(isset($nombre)&&!empty($nombre)&&isset($cantidad)&&!empty($cantidad)&&isset($marca)&&!empty($marca)){
            if($_SESSION['rol']==0){
                $this->model->insertProducto($nombre, $categoria,$cantidad,$marca);
                $this->view->showHomeLocation();
            }else{
                $this->view->showErrorLocation();
            }  
        }else{
            $this->view->showProducts($categories, $products,'Ingrese todos los campos');
        }

    }


    function deleteProd($id){
        if (isset ($id)){
            if ($_SESSION['rol']==0){
                $this->authHelper->checkLoggedIn();
                $this->model->deleteProdFromDB($id);
                $this->view->showHomeLocation();
            }else{ 
                $this->view->showErrorLocation();
        }
    }
}

    function editProd($id){
        if ($_SESSION['rol']==0){
             $categories=$this->modelCategory->getListCategory();
             $producto = $this->model->getProd($id);
             $this->view->showEdit($producto,$categories);
        }else{
            $this->view->showErrorLocation();
        } 
    }

    function updateProd(){
        
        $this->model-> editProdFromDB($_POST['id'], $_POST['nombre'], $_POST['categoria']);
        $this->view->showHomeLocation();
    }

    function viewProd($id){
        
        $producto = $this->model-> getProd($id);
        $id = null;
        $rol = null;
        if(isset($_SESSION['id']))
            $id = $_SESSION['id'];
        if(isset($_SESSION['rol']))
            $rol = $_SESSION['rol'];
        $this->view->showProduct($producto, $id, $rol);     
    }

    function viewError(){
        $this->view->showError();  
    }

    function viewListProd(){
        
        $products = $this->model->getProductos();
        $this->view->showListProducts($products);  
    }
    
    
}