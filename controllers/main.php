<?php
    class Main extends Controller{
        function __construct(){
            parent::__construct();//llamando de la clase padre, de donde carga la vista
            //echo "<p>Nuevo Controlador</p>";
        }

        function render(){
            $this->view->render('main/index');
        }

        function saludo(){
            echo "<p>Hola Mundo</p>";
        }
    }
?>