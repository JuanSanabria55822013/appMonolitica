<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$codigo = $_GET['codigo'];
$id = empty($_GET['id']) ? '' : $_GET['id'];
$actividad = new Actividad();
if (!empty($id)) {
    $titulo = 'Modificar actividad';
    $urlAction = "accion_modificar_actividad.php?codigo=".$codigo."&id=".$id;
    $actividadController = new ActividadController();
    $actividad = $actividadController->readRow($id); 
}else{
    $titulo = 'Registrar actividad';
    $urlAction = "accion_registro_actividad.php?codigo=".$codigo;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="..\CSS\styles_form.css">
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
            <br>
            <label>
                <span>Descripcion</span>
                <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
            </label>
            <br>
            <label>
                <span>Nota:</span>
                <input type="number" name="nota" value="<?php echo $actividad->getNota(); ?>" step = "0.1"required>
            </label>
            <br>
            <button type="submit">Guardar</button>
        </form>
    <a class = "registrar" href="../../index.php">VOLVER A LA LISTA DE ESTUDIANTES</a>
    </main>
</body>

</html>