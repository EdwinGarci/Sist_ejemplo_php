<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php';?>

    <div id="main">
        <h1 class="center">
            Sección de consulta
        </h1>
        <div id="respuesta" class="center">
            
        </div>
        <table>
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody id="tbody-alumnos">
                <?php
                include_once 'models/alumno.php';//se importa para que sepa a que se refiere
                    foreach($this->alumnos as $row) { //para recorrer y llenar con los datos
                        $alumno = new Alumno();
                        $alumno = $row;
                ?>
                <tr id="fila-<?php echo $alumno->matricula; ?>">
                    <td><?php echo $alumno->matricula; ?></td>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula; ?>">Editar</a></td>
                    <!-- <td><a href="<?php echo constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula; ?>">Eliminar</a></td> -->
                    <td><button class="bEliminar" data-matricula="<?php echo $alumno->matricula; ?>">Eliminar</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php require 'views/footer.php';?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
</body>
</html>