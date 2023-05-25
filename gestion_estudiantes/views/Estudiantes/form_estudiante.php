<?php
require '../../models/estudiante.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$codigo = empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo = 'REGISTRAR ESTUDIANTE';
$urlAction = "accion_registro_estudiante.php";
$estudiante = new Estudiante();
if (!empty($codigo)) {
    $titulo = 'MODIFICAR ESTUDIANTE';
    $urlAction = "accion_modificar_estudiante.php";
    $estudianteController = new EstudianteController();
    $estudiante = $estudianteController->readRow($codigo); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="..\..\CSS\styles_form.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Alfa+Slab+One&family=Oswald:wght@200&family=Russo+One&display=swap');
    </style>
</head>

<body>
    <header>
        <h1><?php echo $titulo ?></h1>
    </header>
    <main>
        <form action = "<?php echo $urlAction;?>" method="post">
            <label>
                <span>Codigo:</span>
                <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo(); ?>" required>
            </label>
            <br>
            <label>
                <span>Nombres</span>
                <input type="text" name="nombres" value="<?php echo $estudiante->getNombres(); ?>" required>
            </label>
            <br>
            <label>
                <span>Apellidos:</span>
                <input type="text" name="apellidos" value="<?php echo $estudiante->getApellidos(); ?>" required>
            </label>
            <br>
            <button type="submit">GUARDAR</button>
        </form>
    </main>
</body>

</html>