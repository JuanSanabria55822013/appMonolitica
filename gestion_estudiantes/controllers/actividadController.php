<?php

namespace actividadController;

use baseController\BaseControllerActividad;
use conexionDb\ConexionDbController;
use actividad\Actividad;


class ActividadController extends BaseControllerActividad
{

    function create($actividad)
    {
        $sql = 'INSERT INTO actividades ';
        $sql .= '(id, descripcion, nota, codigoEstudiante) VALUES ';
        $sql .= '(';
        $sql .= $actividad->getId() . ',';
        $sql .= '"' . $actividad->getDescripcion() . '",';
        $sql .= '"' . $actividad->getNota() . '",';
        $sql .= '"' . $actividad->getCodigoEstudiante() . '"';
        $sql .= ');';
        echo($actividad->getCodigoEstudiante());
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read($codigoEstudiante)
    {
        $sql = 'select * from actividades ';
        $sql .= 'where codigoEstudiante ='. $codigoEstudiante;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setid($registro['id']);
            $actividad->setdescripcion($registro['descripcion']);
            $actividad->setnota($registro['nota']);
            $actividad->setCodigoEstudiante ($registro['codigoEstudiante']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividad();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad->setid($registro['id']);
            $actividad->setdescripcion($registro['descripcion']);
            $actividad->setnota($registro['nota']);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($id, $actividad)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion="' . $actividad->getdescripcion() . '",';
        $sql .= 'nota="' . $actividad->getnota() . '",';
        $sql.= 'codigoEstudiante="'. $actividad->getCodigoEstudiante(). '"';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
