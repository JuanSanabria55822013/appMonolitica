<?php
require '../../models/estudiante.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombres']);
$estudiante->setApellidos($_POST['apellidos']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->create($estudiante);
if ($resultado) {
    $mensaje = 'ESTUDIANTE REGISTRADO';
} else {
    $mensaje = 'NO SE PUDO REGISTRAR EL ESTUDIANTE';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles_accion.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Alfa+Slab+One&family=Oswald:wght@200&family=Russo+One&display=swap');
    </style>
</head>
<body>
    <header>
        <h1><?php echo($mensaje) ?></h1>
    </header>
    <a href="../../index.php">Volver al inicio</a>
</body>
</html>
