<?php
    require_once 'controllers/errores.php';
    class App{
        function __construct(){
            //echo "<p>Nueva app</p>";
            //abajo es una condicional:  si existe url entonces get url, si no existe tomara null
            $url = isset($_GET['url']) ? $_GET['url']: null;//para obtener el parametro de la url
            $url = rtrim($url, '/');//elimina caracteres repetidos despues de la cadena
            $url = explode('/', $url);//identifica el separador

            if(empty($url[0])){
                $archivoController = 'controllers/main.php';//para que cargue el controlador
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');//especificar como se llama el modelo
                $controller->render();
                return false;//porque ya no necesita otra cosa
            }

            $archivoController = 'controllers/' . $url[0] . '.php';//para que cargue el controlador
            
            if(file_exists($archivoController)){
                require_once $archivoController;
                $controller = new $url[0];//aca manda a llamar el controlador, siempre fue un objeto jajaja inicia el controlador
                $controller->loadModel($url[0]);//manda a llamar al modelo, esto es herencia

                $nparam = sizeof($url);//contar elementos de un arreglo, en este caso parametros
                
                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for ($i = 2; $i<$nparam; $i++) { 
                            array_push($param, $url[$i]);//para saber si hay parametros
                        }
                        $controller->{$url[1]}($param);//el primero es el controlador, lo segundo es el arreglo de parametros
                    }else{
                        $controller->{$url[1]}();//Para que se interprete como metodo
                    }
                }else{
                    $controller->render();
                }

                //if(isset($url[1])){
                //    $controller->{$url[1]}();//Para que se interprete como metodo
                //}else{
                //    $controller->render();
                //}
            }else{
                $controller = new Errores();
            }
        }
    }
?>