<?php

require_once 'models/Linea_de_transmision.php';
require_once 'models/Subestacion.php';
require_once 'models/Reporte.php';
require_once 'models/Proteccion.php';
require_once 'models/Interruptor.php';
require_once 'models/Bobina.php';
require_once 'models/Funcion_envio.php';
require_once 'models/Funcion_recepcion.php';
require_once 'models/DDT_envio.php';
require_once 'models/DDT_recepcion.php';

class Generar_reporte_pdfController
{
    /*
    public function index()
    {
        require_once 'views/Generar_reporte_pdfController/index.php';
    }
    */
    public function index_general(){
        require_once 'views/Generar_reporte_pdfController/index_general.php';
    }

    public function general()
    {
        //$subestacion = new Subestacion();
        //$reporte = new Reporte();

        //$fecha = $_POST['fecha'];

        //$reportes = Utils::obtenerReporte($fecha);
        $numero_de_reportes = Utils::contarReportes();

        $reporte = new Reporte();
        $reportes = $reporte->getALL();

        $lineas_de_transmision = new Linea_de_transmision();
        $lineas = $lineas_de_transmision->getALL();

        $Proteccion = new Proteccion();
        $protecciones = $Proteccion->getALL();

        $interruptor = new Interruptor();
        $interruptores = $interruptor->getALL();
        $interruptores_2 = $interruptor->getALL();


        $Bobina = new Bobina();
        $Bobinas = $Bobina->getALL();

        $Funcion_envio = new Funcion_envio();
        $Funcion_envios = $Funcion_envio->getALL();

        $Funcion_recepcion = new Funcion_recepcion();
        $Funcion_recepciones = $Funcion_recepcion->getALL();

        $DDT_recepcion = new DDT_recepcion();
        $DDT_recepciones = $DDT_recepcion->getALL();

        $DDT_envio = new DDT_envio();
        $DDT_envios = $DDT_envio->getALL();
        
        require_once 'views/Generar_reporte_pdfController/general.php';
    }

    public function general_pdf()
    {
        //$subestacion = new Subestacion();
        //$reporte = new Reporte();

        //$fecha = $_POST['fecha'];

        //$reportes = Utils::obtenerReporte($fecha);
        $numero_de_reportes = Utils::contarReportes();

        $reporte = new Reporte();
        $reportes = $reporte->getALL();

        $lineas_de_transmision = new Linea_de_transmision();
        $lineas = $lineas_de_transmision->getALL();

        $Proteccion = new Proteccion();
        $protecciones = $Proteccion->getALL();

        $interruptor = new Interruptor();
        $interruptores = $interruptor->getALL();
        $interruptores_2 = $interruptor->getALL();


        $Bobina = new Bobina();
        $Bobinas = $Bobina->getALL();

        $Funcion_envio = new Funcion_envio();
        $Funcion_envios = $Funcion_envio->getALL();

        $Funcion_recepcion = new Funcion_recepcion();
        $Funcion_recepciones = $Funcion_recepcion->getALL();

        $DDT_recepcion = new DDT_recepcion();
        $DDT_recepciones = $DDT_recepcion->getALL();

        $DDT_envio = new DDT_envio();
        $DDT_envios = $DDT_envio->getALL();
        
        require_once 'views/Generar_reporte_pdfController/general_pdf.php';
    }

    public function obtenerReporte()
    {
        $nombreSE = $_POST['nombre'];
        $fecha = $_POST['fecha'];

        /*
        $subestacion = new Subestacion();
        $reporte = new Reporte();
        */

        $subestacion = Utils::obtenerSubestacion($nombreSE);
        $reporte = Utils::obtenerReporte($fecha);

        $lineas_de_transmision = new Linea_de_transmision();
        $lineas = $lineas_de_transmision->getALL();

        $Proteccion = new Proteccion();
        $protecciones = $Proteccion->getALL();

        $interruptor = new Interruptor();
        $interruptores = $interruptor->getALL();

        $Bobina = new Bobina();
        $Bobinas = $Bobina->getALL();

        $Funcion_envio = new Funcion_envio();
        $Funcion_envios = $Funcion_envio->getALL();

        $Funcion_recepcion = new Funcion_recepcion();
        $Funcion_recepciones = $Funcion_recepcion->getALL();

        $DDT_recepcion = new DDT_recepcion();
        $DDT_recepciones = $DDT_recepcion->getALL();

        $DDT_envio = new DDT_envio();
        $DDT_envios = $DDT_envio->getALL();
        
        require_once 'generar-pdf/index.php';
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
            echo "resultado: " . $resultado;
        }
        header("Location:".base_url."SubestacionController/index");
    }
 
   
}