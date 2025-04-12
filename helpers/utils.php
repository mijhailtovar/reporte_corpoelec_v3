<?php

require_once 'models/Subestacion.php';
require_once 'models/Linea_de_transmision.php';
require_once 'models/Proteccion.php';
require_once 'models/Interruptor.php';
require_once 'models/Funcion_recepcion.php';
require_once 'models/Funcion_envio.php';
require_once 'models/Reporte.php';

class Utils 
{
    public static function deleteSession($name)
    {
        if(isset($_SESSION[$name]))
        {
            $_SESSION[$name] = NULL;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function showSubestaciones()
    {
        //se hace un query de todos los productos en la bd
        $subestacion = new Subestacion();
        $subestaciones = $subestacion->getAll();

        return $subestaciones;
    }

    public static function showLineas_de_transmision()
    {
        //se hace un query de todas las lineas en la bd
        $L_transmision = new Linea_de_transmision();
        $Lineas = $L_transmision->getAll();

        return $Lineas;
    }

    public static function showProtecciones()
    {
        //se hace un query de todas las lineas en la bd
        $proteccion = new Proteccion();
        $protecciones = $proteccion->getAll();

        return $protecciones;
    }

    public static function showInterruptor()
    {
        //se hace un query de todas las lineas en la bd
        $inter = new Interruptor();
        $interruptores = $inter->getAll();

        return $interruptores;
    }

    public static function showFuncion_recepcion()
    {
        //se hace un query de todas las lineas en la bd
        $F_recepcion = new Funcion_recepcion();
        $F_recepciones = $F_recepcion->getAll();

        return $F_recepciones;
    }

    public static function showFuncion_envio()
    {
        //se hace un query de todas las lineas en la bd
        $Funcion_envio = new Funcion_envio();
        $Funcion_envios = $Funcion_envio->getAll();

        return $Funcion_envios;
    }

    public static function obtenerSubestacion($nombreSE){

        //conectarse a la base de datos
        $db = Database::connect();

        //consulta para obtener una subestacion por el nombre
        $sql = "SELECT * FROM subestacion WHERE nombre = '{$nombreSE}';";
        $subestacion = $db->query($sql);

        return $subestacion;
    }

    public static function obtenerReporte($fecha){

        //conectarse a la base de datos
        $db = Database::connect();

        //consulta para obtener reporte(s) por fecha
        $sql = "SELECT * FROM reporte WHERE fecha = '{$fecha}';";
        $reporte = $db->query($sql);

        return $reporte;
    }
    //recoje el numero de reportes dada una fecha especifica
    public static function contarReportesPorFecha($fecha){

        //conectarse a la base de datos
        $db = Database::connect();

        //consulta para obtener reporte(s) por fecha
        $sql = "SELECT COUNT(*) AS total_registros
                FROM reporte
                WHERE fecha = '{$fecha}'";

        $reporte = $db->query($sql);

        // Para obtener el resultado, necesitas usar el método fetch_assoc() o fetch_row()
        $fila = $reporte->fetch_assoc();

        // Ahora puedes acceder al valor de 'total_registros'
        $total_reportes = $fila['total_registros'];

        return $total_reportes;
    }

    
}