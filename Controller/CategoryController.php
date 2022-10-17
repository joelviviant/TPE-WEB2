<?php

require_once "./Model/CategoryModel.php";
require_once "./View/CategoryView.php";
require_once "./View/ProductView.php";
require_once "./Helpers/AuthHelper.php";

class CategoryController{

    private $model;
    private $view;
    private $productView;
    private $authHelper;


    function __construct(){
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->productView = new ProductView();
        $this->authHelper = new AuthHelper();

    }

    function viewCat($id){
    $productos = $this->model-> getCat($id);
    $categoria = $this->model->getCatById($id);
    $id = null;
    $rol = null;
    if(isset($_SESSION['id']))
        $id = $_SESSION['id'];
    if(isset($_SESSION['rol']))
        $rol = $_SESSION['rol'];
    $this->view->showCat($productos,$categoria,$id,$rol);     
    }

    function listCat(){
        $categorias = $this->model->getListCategory();
        $this->view->showListCategory($categorias);
    }

    function addCat(){
        $this->authHelper->checkLoggedIn();
           $nombre = $_POST['nombre'];
           $categorias = $this->model->getListCategory();
           if(isset($nombre)&&!empty($nombre)){
        if($_SESSION['rol']==0){
            $this->model->insertCat($nombre);
            $this->view->showListLocation();    
        }else{
            $this->productView->showErrorLocation();
            }  
        }else{
            $this->view->showListCategory($categorias,'Ingrese todos los campos');
        }
    }

    function deleteCat($id_categoria){
        if(isset($_SESSION["email"])){        
        $this->model-> deleteCatFromDB($id_categoria);
        $this->view->showListLocation(); 
    }else{
        header("Location:".BASE_URL. "login"); 
    }  
}

    function editCat($id){
        $this->authHelper->checkLoggedIn();
        if($_SESSION['rol']==0){
        $categoria = $this->model->getCatById($id);
        $this->view->showEditCat($categoria);
     }else{
        $this->productView->showErrorLocation();
    }  
}
    
    function updateCat(){
        $this->authHelper->checkLoggedIn();
        $this->model-> editCatFromDB($_POST['id'], $_POST['nombre']);
        $this->view->showListLocation();
    }
}