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

$codigo = $_GET['codigo'];
echo("ok". $_GET['codigo']);
$id = empty($_GET['id']) ? '' : $_GET['id'];
$estudianteController = new EstudianteController();
$titulo = 'Registrar actividad';
$urlAction = "accion_registro_actividad.php?codigo=".$codigo;
$actividad = new Actividad();
$estudiante = new Estudiante();
if (!empty($id)) {
    $titulo = 'Modificar actividad';
    $urlAction = "accion_modificar_actividad.php?codigo=".$codigo;
    $actividadController = new ActividadController();
    $actividad = $actividadController->readRow($id); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo ?></h1>
    <form action = "<?php echo $urlAction;?>" method="post">
        <label>
            <span>ID</span>
            <input type="text" name="id" value="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="text" name="nota" value="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>