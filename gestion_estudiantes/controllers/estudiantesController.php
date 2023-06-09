<?php

namespace estudianteController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;

class EstudianteController extends BaseController
{

    function create($estudiante)
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $estudiante->getCodigo() . ',';
        $sql .= '"' . $estudiante->getNombres() . '",';
        $sql .= '"' . $estudiante->getApellidos() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombres($registro['nombres']);
            $estudiante->setApellidos($registro['apellidos']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiantes;
    }

    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombres($registro['nombres']);
            $estudiante->setApellidos($registro['apellidos']);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function update($codigo, $estudiante)
    {
        $sql = 'update estudiantes set ';
        $sql .= 'codigo="' . $estudiante->getCodigo() . '",';
        $sql .= 'nombres="' . $estudiante->getNombres() . '",';
        $sql .= 'apellidos="' . $estudiante->getApellidos() . '" ';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
