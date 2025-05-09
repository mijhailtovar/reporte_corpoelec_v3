<h1>reporte general</h1>
<!--aqui empieza el Tbody o el cuerpo de la tabla-->
    <?php 

    $ruta_imagen = '/assets/img/logo_1.png';
    echo '<div id="logo"><img src="' . $ruta_imagen . '" alt=""></div>';

    //rompe el flotado de la imagen
    echo '<div class="rompe_flotados"></div>';
    
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
    //var_dump($numero_de_reportes);
    //die();

    //recorre las lineas
    while ($lin = $lineas->fetch_object()) {
        
            //protecciones
            while($rep = $reportes->fetch_object()){
                if ($lin->id == $rep->id_linea_de_transmision) {
                    //reportes
                    while($pro = $protecciones->fetch_object()){
                        // si el reporte pertenece a la linea de transmision
        
                            //echo $pro->id_linea_de_transmision . "-" . $lin->id . "-" .  $rep->id_linea_de_transmision . "<br>";
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
                                include 'interruptores.php';

                                //se reccorren las bobinas
                                include 'bobinas.php';

                                //se reccorren tembien las funciones envio
                                include 'f_envio.php';

                                //se reccorren tembien las funciones recepcion
                                include 'f_recepcion.php';

                                //se reccorren las ddt_envio
                                include 'ddt_envio.php';

                                //se recorren las ddt_recepcion
                                include 'ddt_recepcion.php';

                                //en este punto se imprimira la tabla
                                if ($name_inter_1 || $name_inter_2 || $ddt_envio_envio || $ddt_recepcion_recepcion || $f_env_name || $f_recep_name) {
                                    if($numero_de_reportes > 0){
                                        require 'imprimir_html.php';
                                    }
                                }
                                

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

    
    ?>

