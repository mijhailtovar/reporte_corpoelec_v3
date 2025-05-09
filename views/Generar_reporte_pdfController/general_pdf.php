<h1>reporte general</h1>

<!--aqui empieza el Tbody o el cuerpo de la tabla-->
    <?php 

    require_once __DIR__ . '/../../autoload.php';
    require_once __DIR__ . '/../../config/db.php';
    require_once __DIR__ . '/../../vendor/autoload.php';

    //genera un aobjeto mpdf
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);

    $html = '<style type="text/css">
        body{
            font-family: Calibri;
        }
        h1 {
            font-size: 35px;
            font-weight: bold;
            letter-spacing: 1px;
            text-align: center;
            border-bottom: 1px solid black;
            margin-bottom: 20px;
            padding: 25px;
            padding-top: 0px;
        }
        p {
            font-size: 20px;
        }
        ul{
            background: green;
            color: white;
        }

        table {
        text-align: center;
        width: 100%;

        border-collapse: collapse;
        margin: auto;
        }

        table caption {
            /*
            text-align: center;
            background-color: #01B1EA;
            width: 30%;
            border-radius: 5px;
            display: block;
            */
            font-size: 1.4em;
            text-align: center;
            padding-top: 25px;
        }

        table td,
        table th {
            border: 1px solid #1e2794;
            /* padding: 10px, 10px, 5px, 5px; */
        }

        table th {
            padding-top: 5px;
            padding-bottom: 5px;

            background-color: #1d60b3;
            color: white;
        }

        th {
            font-weight: bold;
        }

        table tr td{
           font-size: 20px;
        }
        table tr.alterna td {
            background-color: #9bc4f7;
        }
        img {
            height: 50px;
            box-shadow: 10px 0px 10px white, -10px 0px 10px white,
                0px 10px 10px white, 0px -10px 10px white;
            float: left;
        }
    </style>';

    $ruta_imagen = '/assets/img/logo_1.png';
    $html .= '<div id="logo"><img src="' . $ruta_imagen . '" alt=""></div>';
    //rompe el flotado de la imagen
    echo '<div class="rompe_flotados"></div>';

    $html .= "<h1>Plan especial de protecciones aragua</h1>";

     //valores de las columnas
     $numero_de_permiso;
     $fecha_reporte;
     $name_inter_1 = null;
     $name_inter_2 = null;
     $f_env_name;
     $f_env_envio;
     $f_recep_name;
     $f_recep_recepcion;
     $ddt_envio_envio = 'NA';
     $ddt_recepcion_recepcion = 'NA';


    $objetos_bobinas = [];
        // Creamos los objetos Bobina
        for ($i = 0; $i < 4; $i++) {
            $disparos_bobinas[$i] = null;
        }
    

    //determina el numero inicial de el numero de reportes de la fecha elegida
    $N_inicial_reportes = $numero_de_reportes;

        //recorre las lineas
        while ($lin = $lineas->fetch_object()) {
            //reportes
            while($rep = $reportes->fetch_object()){
            // si el reporte pertenece a la linea de transmision
            if ($lin->id == $rep->id_linea_de_transmision) {

                
                //protecciones
                while($pro = $protecciones->fetch_object()){

                    //si la proteccion pertenece a la linea de transmisio
                    if ($pro->id_linea_de_transmision == $lin->id){

                        if($rep->numero_de_permiso == true){
                            $numero_de_permiso = $rep->numero_de_permiso;
                        }else{
                            $numero_de_permiso = 'NA';
                        }
                        if($rep->fecha == true){
                            $fecha_reporte = $rep->fecha;
                        }else{
                            $fecha_reporte = 'NA';
                        }

                        //se reccorren los interruptores
                        include 'includes_pdf/interruptores.php';

                        //se reccorren las bobinas
                        include 'includes_pdf/bobinas.php';

                        //se reccorren tembien las funciones envio
                        include 'includes_pdf/f_envio.php';

                        //se reccorren tembien las funciones recepcion
                        include 'includes_pdf/f_recepcion.php';

                        //se reccorren las ddt_envio
                        include 'includes_pdf/ddt_envio.php';

                        //se recorren las ddt_recepcion
                        include 'includes_pdf/ddt_recepcion.php';


                        //en este punto se imprimira la tabla
                        if ($name_inter_1 || $name_inter_2 || $ddt_envio_envio || $ddt_recepcion_recepcion || $f_env_name || $f_recep_name) {
                            if($numero_de_reportes > 0){
                                require 'includes_pdf/imprimir_pdf.php';
                            }
                        }
                        //escribe el html
                        $mpdf->WriteHTML($html);
                        
                        // borra el objeto html para escribir cosas diferentes
                        $html = "";
                        

                        //se reinicia las existencias de los disparos de las ddt y bobinas
                        $name_inter_1 = null;
                        $name_inter_2 = null;
                        $ddt_envio_envio = null;
                        $ddt_recepcion_recepcion = null;
                        $f_env_name = null;
                        $f_recep_name = null;

                        for ($i = 0; $i < 4; $i++) {
                            $disparos_bobinas[$i] = null;
                        }
                    }
                    
                }$protecciones->data_seek(0);
                //disminuye la cantidad de reportes (numero de permiso), que quedan sin leer
                $numero_de_reportes--;
            }

            }$reportes->data_seek(0);   
        }$lineas->data_seek(0);


        $mpdf->Output();

        // linea muy UTIL que sirve para ebuguear el pdf ya que devuelve el resultado asi no este bien
        // lo guarda en la raiz de este proyecto y se llama debug
        //$mpdf->Output('debug.pdf', 'F');

        //cierra las
        $lineas->close();
        $protecciones->close();
        $interruptores->close();
        $Funcion_envios->close();
        $Funcion_recepciones->close();
        $Bobinas->close();    
        $DDT_envios->close();  
        $DDT_recepciones->close();

    ?>

