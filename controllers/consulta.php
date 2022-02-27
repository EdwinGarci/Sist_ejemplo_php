<?php
    class Consulta extends Controller{
        function __construct(){
            parent::__construct();
            //echo "<p>Controlador ayuda</p>";
            $this->view->alumnos = [];
        }

        function render(){
            $alumnos = $this->model->get();
            $this->view->alumnos = $alumnos;
            $this->view->render('consulta/index');
        }

        function verAlumno($param = null){
            $idAlumno = $param[0];
            $alumno = $this->model->getById($idAlumno);

            session_start();//para que la matricula no cambbie, a pesar de que se cambie en la vista
            $_SESSION['id_verAlumno'] = $alumno->matricula;

            $this->view->alumno = $alumno;
            $this->view->mensaje = "";
            $this->view->render('consulta/detalle');
        }

        function actualizarAlumno(){
            session_start();
            $matricula = $_SESSION['id_verAlumno'];//con esto tomare el dato de mi sesion
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            unset($_SESSION['id_verAlumno']);

            //esto del if, es para actualizar al alumno
            if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
                $alumno = new Alumno();
                $alumno->matricula = $matricula;
                $alumno->nombre = $nombre;
                $alumno->apellido = $apellido;

                $this->view->alumno = $alumno;
                $this->view->mensaje = "Alumno actualizado";
            }else{
                $this->view->mensaje = "No se pudo actualizar";
            }
            $this->view->render('consulta/detalle');
        }

        function eliminarAlumno($param = null){
            $matricula = $param[0];

            if ($this->model->delete($matricula)) {
                //$this->view->mensaje = "Alumno eliminado";
                $mensaje = "Alumno eliminado";
            }else{
                //$this->view->mensaje = "No se pudo eliminar";
                $mensaje = "No se pudo eliminar";
            }
            //$this->render();
            echo $mensaje;
        }

    }
?>