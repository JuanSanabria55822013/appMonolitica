<?php
require 'gestion_estudiantes/models/estudiante.php';
require 'gestion_estudiantes/controllers/conexionDbController.php';
require 'gestion_estudiantes/controllers/baseController.php';
require 'gestion_estudiantes/controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="views/form_estudiante.php">Registrar estudiante</a>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getName() . '</td>';
                    echo '  <td>' . $estudiante->getUsername() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_estudiante.php?Codigo=' . $estudiante->getCodigo() . '">MODIFICAR</a>';
                    echo '      <a href="views/accion_borrar_estudiante.php?Codigo=' . $estudiante->getCodigo() . '">BORRAR</a>';
                    echo '      <a href = ""Codigo = '.$estudiante -> getCodigo(). '">ACTIVCADES</a>'; 
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>