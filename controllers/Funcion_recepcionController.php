<?php

require_once 'models/Funcion_recepcion.php';

class Funcion_recepcionController
{
    public function index()
    {
        $Funcion_recepcion = new Funcion_recepcion();
        $funcion_recepciones = $Funcion_recepcion->getAll();

        require_once 'views/Funcion_recepcionController/index.php';
    }

    public function crear()
    {
        require_once 'views/Funcion_recepcionController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea
            $Funcion_recepcion = new Funcion_recepcion();
            $Funcion_recepcion->setId_proteccion($_POST['id_proteccion']);
            $Funcion_recepcion->setNombre($_POST['nombre']);
            $recepcion = isset($_POST['recepcion']) ? 1 : 0;
            $Funcion_recepcion->setFecha($_POST['fecha']);


            $Funcion_recepcion->setRecepcion($recepcion);
            
            $resultado = $Funcion_recepcion->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."Funcion_recepcionController/index");
    }
 
    public function eliminar()
    {
        //var_dump($_GET);

        if(isset($_GET['id']) && !empty($_GET['id']))
        {
            //elimina la mercacancia entrante
            $subestacion = new Subestacion();
            $subestacion->setId($_GET['id']);

            $delete = $subestacion->delete();

            if($delete)
            {
                $_SESSION['delete'] = "complete";
            }
            else
            {
                $_SESSION['delete'] = "failed";
            }
        }
        else
        {
            $_SESSION['delete'] = "failed";
        }

        header("Location:".base_url."SubestacionController/index");
    }
}