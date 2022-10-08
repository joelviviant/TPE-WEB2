<?php

require_once "./Libs/smarty/libs/Smarty.class.php";


class CategoryView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showCat($productos, $categories,$id,$rol){
        $this->smarty->assign('titulo','Categoria');
        $this->smarty->assign('category', $categories);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('rol', $rol);
        $this->smarty->assign('id', $id);
        $this->smarty->display('Templates\category.tpl');        
    }     

    function showListCategory($categorias, $error=null){
        $this->smarty->assign('titulo','Agregue una Categoria');
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('error', $error);
        $this->smarty->display('Templates\categoryList.tpl');
    }

    function showListLocation(){
        header("Location:".BASE_URL. "categorias"); 
    }

    function showEditCat($categoria){
        $this->smarty->assign('titulo','Edite la Categoria');
        $this->smarty->assign('categorias', $categoria);
        $this->smarty->display('Templates\categoryEdit.tpl');           
    }   
    
}  
