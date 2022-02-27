<?php
    class Errores extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje = "Error en la solicitud";//transmitir mensaje de error
            $this->view->render('errores/index');
            //echo "<p>Error al cargar recurso</p>";
        }
    }
?>