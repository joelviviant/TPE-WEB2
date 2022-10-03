<?php

require_once "./Model/CategoryModel.php";
require_once "./View/CategoryView.php";
require_once "./View/ProductView.php";

class CategoryController{

    private $model;
    private $view;
    private $productView;


    function __construct(){
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->productView = new ProductView();

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
    if($_SESSION['rol']==0){
        $this->model->insertCat($_POST['nombre']);
        $this->view->showListLocation();    
    }else{
        $this->productView->showErrorLocation();
        }  
    }

    function deleteCat($id_categoria){
        if($_SESSION['rol']==0){
        $this->model-> deleteCatFromDB($id_categoria);
        $this->view->showListLocation(); 
    }else{
        $this->productView->showErrorLocation();
    }  
}

    function editCat($id){
        if($_SESSION['rol']==0){
        $categoria = $this->model->getCatById($id);
        $this->view->showEditCat($categoria);
     }else{
        $this->productView->showErrorLocation();
    }  
}
    
    function updateCat(){
     
        $this->model-> editCatFromDB($_POST['id'], $_POST['nombre']);
        $this->view->showListLocation();
    }
}