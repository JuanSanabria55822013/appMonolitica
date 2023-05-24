<?php

namespace actividadController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use actividad\Actividad;


class ActividadController extends BaseController
{

    function create($actividad)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota) values ';
        $sql .= '(';
        $sql .= $actividad->getId() . ',';
        $sql .= '"' . $actividad->getDescripcion() . '",';
        $sql .= '"' . $actividad->getNota() . '",';
        $sql .= '"' . $actividad->getCodigoEstudiante() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from actividades ';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setid($registro['id']);
            $actividad->setdescripcion($registro['descripcion']);
            $actividad->setnota($registro['nota']);
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
