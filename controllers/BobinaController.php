<?php

require_once 'models/Bobina.php';

class BobinaController
{
    public function index()
    {
        $Bobina = new Bobina();
        $bobinas = $Bobina->getAll();

        require_once 'views/BobinaController/index.php';
    }

    public function crear()
    {
        require_once 'views/BobinaController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea

            $Bobina = new Bobina();
            $Bobina->setId_interruptor($_POST['id_interruptor']);
            $Bobina_disparo = isset($_POST['disparo']) ? 1 : 0;
            $Bobina->setFecha($_POST['fecha']);

            $Bobina->setDisparo($Bobina_disparo);

            $resultado = $Bobina->save();

            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."BobinaController/index");
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