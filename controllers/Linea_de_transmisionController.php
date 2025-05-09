<?php

require_once 'models/Linea_de_transmision.php';
require_once 'models/Subestacion.php';

class Linea_de_transmisionController
{
    public function index()
    {
        $L_transmision = new Linea_de_transmision();
        $L_transmisiones = $L_transmision->getAll();

        $subestacion = new Subestacion();
        $subestaciones = $subestacion->getAll();

        // es asi porque en la view de subestacion se mostraran tambien las lineas
        require_once 'views/Linea_de_transmision/index.php';
    }

    public function crear()
    {
        require_once 'views/Linea_de_transmision/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea
            $Linea_de_transmision = new Linea_de_transmision();
            $Linea_de_transmision->setId_subestacion($_POST['id_subestacion']);
            $Linea_de_transmision->setNombre($_POST['nombre']);
            $Linea_de_transmision->setAnillo($_POST['anillo']);
            
            $resultado = $Linea_de_transmision->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:?controller=Linea_de_transmisionController&action=index");
    }
 
    public function eliminar()
    {
        //var_dump($_GET);

        if(isset($_GET['id']) && !empty($_GET['id']))
        {
            //elimina la mercacancia entrante
            $Linea_de_transmision = new Linea_de_transmision();
            $Linea_de_transmision->setId($_GET['id']);

            $delete = $Linea_de_transmision->delete();

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

        header("Location:?controller=Linea_de_transmisionController&action=index");
    }
}