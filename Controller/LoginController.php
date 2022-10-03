<?php

require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";
require_once "./View/ProductView.php";
require_once "./Helpers/AuthHelper.php";



class LoginController {

    private $model;
    private $view;
    private $authHelper;
    private $productView;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->authHelper = new AuthHelper();
        $this->productView = new ProductView();
    }  
  
    function login(){
        $this->view->showLogin();
    }
    
    function logout(){
        $this->authHelper->logout();
        $this->view->showLogin();
    }

    function verifyLogin(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);
           
          if ($user && password_verify($password, $user->password)) {

                $this->authHelper->checkLoggedIn();
                $_SESSION['email'] = $email;   
                $_SESSION['id'] = $user->id;
                $_SESSION['rol'] = $user->rol;
                $this->view->showHome(); 
        } else {
                 $this->view->showLogin("Acceso denegado. Usuario o contraseña invalidos");
            }
        }
    }

}