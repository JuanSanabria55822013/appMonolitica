<?php
require '../../models/actividad.php';
require '../../models/estudiante.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/actividadController.php';
require '../../controllers/estudiantesController.php';


use estudiante\Estudiante;
use estudianteController\EstudianteController;


use actividad\Actividad;
use actividadController\ActividadController;

$estudiante = new Estudiante();
$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);

$actividadController = new ActividadController();
$resultado = $actividadController->create($estudiante->getCodigo(),$actividad);
if ($resultado) {
    echo '<h1>actividad registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el actividad</h1>';
}
?>
<br>
<a href="../../actividads.php">Volver al inicio</a>
