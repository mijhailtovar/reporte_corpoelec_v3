<?php

require_once 'models/Interruptor.php';

class InterruptorController
{
    public function index()
    {
        $interruptor = new Interruptor();
        $interruptores = $interruptor->getAll();

        require_once 'views/InterruptorController/index.php';
    }

    public function crear()
    {
        require_once 'views/InterruptorController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea
            $interruptor = new Interruptor();
            $interruptor->setId_proteccion($_POST['id_proteccion']);
            $interruptor->setNombre($_POST['nombre']);
            
            $resultado = $interruptor->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."InterruptorController/index");
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