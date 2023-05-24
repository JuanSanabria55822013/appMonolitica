<?php

require 'models/actividad.php';
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadController.php';
require 'controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();


use actividadController\actividadController;

$actividadController = new actividadController();

$codigoEstudiante = $_GET['codigo'];
$actividades = $actividadController->read($codigoEstudiante);
echo($codigoEstudiante);
$urlAction = "views/Actividades/form_actividad.php?codigo=".$codigoEstudiante
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a href="<?php echo $urlAction;?>">Registrar actividad</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                    <th>CodigoEstudiante</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>' . $actividad->getCodigoEstudiante() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/Actividades/form_actividad.php?id=' . $actividad->getId() . '">MODIFICAR</a>';
                    echo '      <a href="views/Actividades/accion_borrar_actividad.php?id=' . $actividad->getId() . '">BORRAR</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>