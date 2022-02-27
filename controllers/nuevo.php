<?php
    class Nuevo extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje = "";//definiendo, dar valor
            //echo "<p>Controlador ayuda</p>";
        }

        function render(){
            $this->view->render('nuevo/index');
        }

        function registrarAlumno(){//aca entran los datos, en el modelo pasas la info
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            //$mensaje = "";

            if($this->model->insert(['matricula'=>$matricula, 'nombre'=>$nombre, 'apellido'=>$apellido])){//heredando del controller, model fue creado del controller
                $mensaje = "Alumno creado";
            }else{
                $mensaje = "Matricula ya registrada";
            }

            $this->view->mensaje = $mensaje;
            $this->render();//llama al render, la vista es nuevo
            
        }
    }
?>