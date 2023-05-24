<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>actividad borrado</h1>';
} else {
    echo '<h1>No se pudo borrar el actividad</h1>';
}
?>
<br>
<a href="../../Estudiantes.php">Volver al inicio</a>