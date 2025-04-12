<?php

require_once 'models/Reporte.php';

class ReporteController
{
    public function index()
    {

        $reporte = new Reporte();
        $reportes = $reporte->getAll();

        require_once 'views/ReporteController/index.php';
    }

    public function crear()
    {

        require_once 'views/ReporteController/crear.php';
    }

    public function save()
    {
              
        //guardar mercacancia en la base de datos
        if(isset($_POST) && !empty($_POST))
        {
            //guardar la mercacncia
            $reporte = new reporte();
            $reporte->setId_linea_de_transmision($_POST['id_linea_de_transmision']);
            $reporte->setFecha($_POST['fecha']);
            $reporte->setNumero_de_permiso($_POST['numero_de_permiso']);
            $reporte->setObservaciones($_POST['observaciones']);
            
            $resultado = $reporte->save();
            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;
        }
        
        header("Location:".base_url."ReporteController/index");
    }
 
    public function eliminar()
    {
        //var_dump($_GET);

        if(isset($_GET['id']) && !empty($_GET['id']))
        {
            //elimina la mercacancia entrante
            $Reporte = new Reporte();
            $Reporte->setId($_GET['id']);

            $delete = $Reporte->delete();

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

        header("Location:".base_url."ReporteController/index");
    }
}