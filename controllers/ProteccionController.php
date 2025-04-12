<?php

require_once 'models/Proteccion.php';

class ProteccionController
{
    public function index()
    {
        $proteccion = new Proteccion();
        $protecciones = $proteccion->getAll();

        require_once 'views/ProteccionController/index.php';
    }

    public function crear()
    {
        require_once 'views/ProteccionController/crear.php';
    }

    public function save()
    {
        //guardar linea en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la linea
            $proteccion = new Proteccion();
            $proteccion->setId_linea_de_transmision($_POST['id_linea_de_transmision']);
            $proteccion->setNombre($_POST['nombre']);
            $proteccion->setMarca($_POST['marca']);
            $proteccion->setModelo($_POST['modelo']);
            
            $resultado = $proteccion->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }

        header("Location:".base_url."ProteccionController/index");
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