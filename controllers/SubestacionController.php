<?php

require_once 'models/Linea_de_transmision.php';
require_once 'models/Subestacion.php';

class SubestacionController
{
    public function index()
    {
        $L_transmision = new Linea_de_transmision();
        $L_transmisiones = $L_transmision->getAll();

        $subestacion = new Subestacion();
        $subestaciones = $subestacion->getAll();

        require_once 'views/SubestacionController/index.php';
    }

    public function crear()
    {

        require_once 'views/SubestacionController/crear.php';
    }

    public function save()
    {
       
      // echo "llegue aqui al iinicio";
       
        //guardar mercacancia en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la mercacncia
            $subestacion = new Subestacion();
            $subestacion->setNombre($_POST['nombre']);
            
            $resultado = $subestacion->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }
        header("Location:?controller=SubestacionController&action=index");
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

        header("Location:?controller=SubestacionController&action=index");
    }
}