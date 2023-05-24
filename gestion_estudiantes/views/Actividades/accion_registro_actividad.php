<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$codigo = $_GET['codigo'];
$actividad = new Actividad();
echo("ok".$_GET['codigo']);
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($codigo);

$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);
if ($resultado) {
    echo '<h1>actividad registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el actividad</h1>';
}
?>
<br>
<a href="../../Estudiantes.php">Volver al inicio</a>
