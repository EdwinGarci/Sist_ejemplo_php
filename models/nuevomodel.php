<?php
    class NuevoModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function insert($datos){
            //insertar datos en la DB
            //El try catch es para controlar el error
            try {
                $query = $this->db->connect()->prepare('INSERT INTO ALUMNOS (MATRICULA, NOMBRE, APELLIDO) VALUES(:matricula, :nombre, :apellido)');//preparar la informacion antes de mandarla
                $query->execute([
                'matricula' => $datos['matricula'], 
                'nombre' => $datos['nombre'], 
                'apellido' => $datos['apellido']
                ]);
                return true;//retorna true y false para avisar en el controlador nuevo que muestre el mensaje
            } catch (PDOException $e) {
                //echo $e->getMessage(); //mensaje de la bd
                //echo "El registro ya existe";
                return false;
            }
            //echo "Insertar datos";
            //$this->DB;
        }
    }
?>