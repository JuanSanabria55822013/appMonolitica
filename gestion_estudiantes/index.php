<?php
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="views/CSS/stylesTablas.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Alfa+Slab+One&family=Oswald:wght@200&family=Russo+One&display=swap');
    </style>
</head>

<body>
    <header>
        <h1>LISTA DE ESTUDIANTES</h1>
    </header>
    <main>
        <a class = "registrar" href="views\Estudiantes\form_estudiante.php">REGISTRAR ESTUDIANTES</a>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td class = "texto">' . $estudiante->getCodigo() . '</td>';
                    echo '  <td class = "texto">' . $estudiante->getNombres() . '</td>';
                    echo '  <td class = "texto">' . $estudiante->getApellidos() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views\Estudiantes\form_estudiante.php?codigo=' . $estudiante->getCodigo() . '">MODIFICAR</a>';
                    echo '  </td>';
                    echo '  <td>';
                    echo '      <a href="views\Estudiantes\accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '">BORRAR</a>';
                    echo '  </td>';
                    echo '  <td>';
                    echo '      <a href = "Actividades.php?codigo=' . $estudiante->getCodigo() . '">NOTAS</a>'; 
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>