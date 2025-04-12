<?php

require_once 'models/DDT_recepcion.php';

class DDT_recepcionController
{
    public function index()
    {
        $DDT_recepcion = new DDT_recepcion();
        $DDT_recepciones = $DDT_recepcion->getAll();

        require_once 'views/DDT_recepcionController/index.php';
    }

    public function crear()
    {
        require_once 'views/DDT_recepcionController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea

            $DDT_recepcion = new DDT_recepcion();
            $DDT_recepcion->setId_funcion_recepcion($_POST['id_funcion_recepcion']);
            $recepcion = isset($_POST['recepcion']) ? 1 : 0;
            $DDT_recepcion->setFecha($_POST['fecha']);

            $DDT_recepcion->setRecepcion($recepcion);

            $resultado = $DDT_recepcion->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."DDT_recepcionController/index");
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