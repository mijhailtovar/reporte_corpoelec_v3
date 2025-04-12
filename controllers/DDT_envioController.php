<?php

require_once 'models/DDT_envio.php';

class DDT_envioController
{
    public function index()
    {
        $DDT_envio = new DDT_envio();
        $DDT_envios = $DDT_envio->getAll();

        require_once 'views/DDT_envioController/index.php';
    }

    public function crear()
    {
        require_once 'views/DDT_envioController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea

            $DDT_envio = new DDT_envio();
            $DDT_envio->setId_funcion_envio($_POST['id_funcion_envio']);
            $envio = isset($_POST['envio']) ? 1 : 0;
            $DDT_envio->setFecha($_POST['fecha']);

            $DDT_envio->setEnvio($envio);

            $resultado = $DDT_envio->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."DDT_envioController/index");
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