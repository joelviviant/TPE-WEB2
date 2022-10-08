<?php

require_once "./Model/ProductModel.php";
require_once "./View/ProductView.php";
require_once "./Model/CategoryModel.php";
require_once "./Helpers/AuthHelper.php";

class ProductController
{

    private $model;
    private $view;
    private $authHelper;


    function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelCategory = new CategoryModel();
        $this->authHelper = new AuthHelper();
    }
    function showHome()
    {
        $products = $this->model->getProductos();
        $categories = $this->modelCategory->getListCategory();
        $this->view->showProducts($categories, $products);
    }


    function addProd(){
        $files = $_FILES['input_name'];
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $cantidad = $_POST['cantidad'];
        $marca = $_POST['marca'];
        $products = $this->model->getProductos();
        $categories = $this->modelCategory->getListCategory();

        if (isset($nombre) && !empty($nombre) && isset($cantidad) && !empty($cantidad) && isset($marca) && !empty($marca)) {
            if (isset($files['name']) && !empty($files['name'])) {
                if ($files['type'] == "image/jpg" ||$files['type'] == "image/jpeg" ||$files['type'] == "image/png"|| $files['type'] == "image/webp" || $files['type'] == "image/jfif") {
                    $this->model->insertProducto($nombre, $categoria, $cantidad, $marca, $files);
                    $this->view->showHomeLocation();
                } else {
                    $this->view->showProducts($categories, $products, 'No se permite el formato de imagen');
                }
            }else {
                $this->model->insertProducto($nombre, $categoria, $cantidad, $marca,null);
                $this->view->showHomeLocation();
            }
        } else {
            $this->view->showProducts($categories, $products, 'Ingrese todos los campos');
        }
    }


    function deleteProd($id)
    {
        if (isset($id)) {
            if ($_SESSION['rol'] == 0) {
                $this->authHelper->checkLoggedIn();
                $this->model->deleteProdFromDB($id);
                $this->view->showHomeLocation();
            } else {
                $this->view->showErrorLocation();
            }
        }
    }

    function editProd($id)
    {
        if ($_SESSION['rol'] == 0) {
            $categories = $this->modelCategory->getListCategory();
            $producto = $this->model->getProd($id);
            $this->view->showEdit($producto, $categories);
        } else {
            $this->view->showErrorLocation();
        }
    }

    function updateProd(){
        $files = $_FILES['input_name'];
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $cantidad = $_POST['cantidad'];
        $marca = $_POST['marca'];

        $categories = $this->modelCategory->getListCategory();
        $producto = $this->model->getProd($id);

        if (isset($nombre) && !empty($nombre) && isset($cantidad) && !empty($cantidad) && isset($marca) && !empty($marca)) {
            if   (isset($files['name']) && !empty($files['name'])) {
                if ($files['type'] == "image/jpg" ||$files['type'] == "image/jpeg" ||$files['type'] == "image/png" || $files['type'] == "image/webp" || $files['type'] == "image/jfif" ) {
                    $this->model->editProdImageFromDB($id,$nombre, $categoria, $cantidad, $marca, $files);
                    $this->view->showHomeLocation();
                } else {
                    $this->view->showEdit($producto, $categories, 'No se permite el formato de imagen');
                }
            } else {
                $this->model->editProdFromDB($id,$nombre, $categoria, $cantidad, $marca);
                $this->view->showHomeLocation();
            }
        } else {
            $this->view->showEdit($producto, $categories, 'Ingrese todos los campos');
        }
    }

    function viewProd($id)
    {

        $producto = $this->model->getProd($id);
        $id = null;
        $rol = null;
        if (isset($_SESSION['id']))
            $id = $_SESSION['id'];
        if (isset($_SESSION['rol']))
            $rol = $_SESSION['rol'];
        $this->view->showProduct($producto, $id, $rol);
    }

    function viewError()
    {
        $this->view->showError();
    }

    function viewListProd()
    {

        $products = $this->model->getProductos();
        $this->view->showListProducts($products);
    }
}
