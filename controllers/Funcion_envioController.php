<?php

require_once 'models/Funcion_envio.php';

class Funcion_envioController
{
    public function index()
    {
        $Funcion_envio = new Funcion_envio();
        $Funcion_envios = $Funcion_envio->getAll();

        require_once 'views/Funcion_envioController/index.php';
    }

    public function crear()
    {
        require_once 'views/Funcion_envioController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea
            $Funcion_envio = new Funcion_envio();
            $Funcion_envio->setId_proteccion($_POST['id_proteccion']);
            $Funcion_envio->setNombre($_POST['nombre']);
            $envio = isset($_POST['envio']) ? 1 : 0;
            $Funcion_envio->setFecha($_POST['fecha']);


            $Funcion_envio->setEnvio($envio);
            
            $resultado = $Funcion_envio->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."Funcion_envioController/index");
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