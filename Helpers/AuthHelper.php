<?php

class AuthHelper{

    function __construct(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function checkLoggedIn(){
        if(!isset($_SESSION["email"])){
            header("Location:".BASE_URL. "login"); 
        }
    }

   

    function logout(){
        session_destroy();
    }
    
}

