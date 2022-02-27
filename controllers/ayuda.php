<?php
    class Ayuda extends Controller{
        function __construct(){
            parent::__construct();
            //echo "<p>Controlador ayuda</p>";
        }

        function render(){
            $this->view->render('ayuda/index');
        }
    }
?>