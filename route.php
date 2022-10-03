<?php

require_once "Controller\ProductController.php";
require_once "Controller\CategoryController.php";
require_once "Controller\LoginController.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'cart'; // acción por defecto si no envían
}


$params = explode('/', $action);


$productController = new ProductController();
$categoryController = new CategoryController();
$loginController = new LoginController();


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'login': 
        $loginController-> login(); 
        break;
    case 'logout': 
        $loginController-> logout(); 
        break;
    case 'verify': 
        $loginController-> verifyLogin(); 
        break;
    case 'cart': 
        $productController-> showHome(); 
         break;
    case 'productos': 
        $productController-> viewListProd(); 
        break;   
    case 'error': 
        $productController-> viewError();
        break;       

    case 'addProd': 
        $productController-> addProd();
        break;    
    case 'deleteProd': 
        $productController->deleteProd($params[1]); 
        break; 
    case 'editProd': 
        $productController-> editProd($params[1]);
        break; 
    case 'updateProd': 
        $productController-> updateProd();
        break;
    case 'viewProd': 
        $productController->viewProd($params[1]); 
         break;  
    case 'viewCat': 
        $categoryController->viewCat($params[1]); 
         break;
    case 'categorias': 
        $categoryController->listCat(); 
         break;
    case 'addCat': 
        $categoryController-> addCat();
         break;   
    case 'deleteCat': 
        $categoryController-> deleteCat($params[1]);
        break;  
    case 'editCat': 
        $categoryController-> editCat($params[1]);
        break; 
    case 'updateCat': 
        $categoryController-> updateCat();
        break;
    default:
        echo('404 Page not found');
        break;
}
?>
