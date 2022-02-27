<?php
    class Controller{
        function __construct(){
            //echo "<p>Controlador base</p>";
            $this->view = new View();
        }

        function loadModel($model){
            $url = 'models/' . $model . 'model.php';//cargar modelo

            if(file_exists($url)){
                require $url;
                $modelName = $model.'Model';//objeto de la clase Model
                $this->model = new $modelName();//llama al modelo, objeto
            }
        }
    }
?>