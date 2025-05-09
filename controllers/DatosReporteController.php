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
require_once 'helpers/utils.php';

class DatosReporteController
{
    public function index()
    {
        require_once 'views/DatosReporteController/index.php';
    }

    public function crear(){

        $id_linea_de_transmision = $_POST['id_linea_de_transmision'];
        $fecha = $_POST['fecha'];
        //proteccion 1
        $id_proteccion = $_POST['id_proteccion'];
        $n_permiso = $_POST['numero_de_permiso'];
        $observaciones = $_POST['observaciones'];
        $n_interruptores = $_POST['n_interruptores'];
        $n_bobinas = $_POST['n_bobinas'];
        $n_funcion_envio = $_POST['n_funcion_envio'];
        $n_ddt_envio = $_POST['n_ddt_envio'];
        $n_funcion_recepcion = $_POST['n_funcion_recepcion'];
        $n_ddt_recepcion = $_POST['n_ddt_recepcion'];

        //proteccion 2
        $id_proteccion_2 = $_POST['id_proteccion_2'];      
        $n_interruptores_2 = $_POST['n_interruptores_2'];
        $n_bobinas_2 = $_POST['n_bobinas_2'];
        $n_funcion_envio_2 = $_POST['n_funcion_envio_2'];
        $n_ddt_envio_2 = $_POST['n_ddt_envio_2'];
        $n_funcion_recepcion_2 = $_POST['n_funcion_recepcion_2'];
        $n_ddt_recepcion_2 = $_POST['n_ddt_recepcion_2'];  

        // var_dump($fecha);
        // die();


        require_once 'views/DatosReporteController/crear.php';
    }

    public function save()
    {
        //inicializa la hora de creacion de todos los reportes
        $hora_creacion = Utils::hora_actual();
        //var_dump($hora_creacion);

       //inicializa los objetos que hay que guardar
        $reporte = new Reporte();

        $interruptor_1 = new Interruptor();
        $interruptor_2 = new Interruptor();

        // Definimos los nombres de las bobinas
        //$nombres_bobinas = ['bobina_1', 'bobina_2', 'bobina_3', 'bobina_4'];
        $objetos_bobinas = [];
        // Creamos los objetos Bobina
        for ($i = 0; $i < 4; $i++) {
            $objetos_bobinas[$i] = new Bobina();
        }

        //creamos las funciones envio
        $objetos_funcion_envio = [];
        for ($i = 0; $i < 2; $i++) {
            $objetos_funcion_envio[$i] = new Funcion_envio();
        }

        //creamos las funciones recepcion
        $objetos_funcion_recepcion = [];
        for ($i = 0; $i < 2; $i++) {
            $objetos_funcion_recepcion[$i] = new Funcion_recepcion();
        }

        $DDT_recepcion = new DDT_recepcion();

        $DDT_envio = new DDT_envio();

        //guardar datos de varias entidades
        if(isset($_POST) && !empty($_POST))
        {

            // logica para guardar los campos ocultos del index, son campos que no son visibles para el usuario

            if(isset($_POST['id_linea_de_transmision']) && !empty($_POST['id_linea_de_transmision'])){
                //var_dump($_POST['id_linea_de_transmision']);
                $reporte->setId_linea_de_transmision($_POST['id_linea_de_transmision']);
                //echo "reporte: " . $reporte->getId_linea_de_transmision() . "<br>";
            }

            if(isset($_POST['id_proteccion']) && !empty($_POST['id_proteccion'])){
                //var_dump($_POST['id_proteccion']);

                //para las bobinas se establece el id de la proteccion
                for ($i = 0; $i < 4; $i++) {
                    $objetos_bobinas[$i]->setId_proteccion($_POST['id_proteccion']);
                    //echo "bobina: " . $objetos_bobinas[$i]->getId_proteccion() . "<br>";
                }
                $interruptor_1->setId_proteccion($_POST['id_proteccion']);
                $interruptor_2->setId_proteccion($_POST['id_proteccion']);

                // para las funciones envio
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_envio[$i]->setId_proteccion($_POST['id_proteccion']);
                    //echo "F_envio: " . $objetos_funcion_envio[$i]->getId_proteccion() . "<br>";
                }

                //para las funciones recepcion
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_recepcion[$i]->setId_proteccion($_POST['id_proteccion']);
                    //echo "F_recepcion: " . $objetos_funcion_recepcion[$i]->getId_proteccion() . "<br>";
                }

                $DDT_envio->setId_proteccion($_POST['id_proteccion']);
                $DDT_recepcion->setId_proteccion($_POST['id_proteccion']);
            }

            if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
                //var_dump($_POST['fecha']);
                $reporte->setFecha($_POST['fecha']);
                $reporte->setHora_creacion($hora_creacion);
                $interruptor_1->setFecha($_POST['fecha']);
                $interruptor_1->setHora_creacion($hora_creacion);                
                $interruptor_2->setFecha($_POST['fecha']);
                $interruptor_2->setHora_creacion($hora_creacion);                


                for ($i = 0; $i < 4; $i++) {
                    $objetos_bobinas[$i]->setFecha($_POST['fecha']);
                    $objetos_bobinas[$i]->setHora_creacion($hora_creacion);                

                }

                // para las funciones envio
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_envio[$i]->setFecha($_POST['fecha']);
                    $objetos_funcion_envio[$i]->setHora_creacion($hora_creacion);                
                    //echo "F_envio: " . $objetos_funcion_envio[$i]->getFecha() . "<br>";
                }

                //para las funciones recepcion
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_recepcion[$i]->setFecha($_POST['fecha']);
                    $objetos_funcion_recepcion[$i]->setHora_creacion($hora_creacion);                
                    //echo "F_recepcion: " . $objetos_funcion_recepcion[$i]->getFecha() . "<br>";
                }

                $DDT_envio->setFecha($_POST['fecha']);
                $DDT_envio->setHora_creacion($hora_creacion);                
                $DDT_recepcion->setFecha($_POST['fecha']);
                $DDT_recepcion->setHora_creacion($hora_creacion);                

            }

            $existe_reporte = false;
            if(isset($_POST['numero_de_permiso']) && !empty($_POST['numero_de_permiso'])){
                //var_dump($_POST['numero_de_permiso']);
                $reporte->setNumero_de_permiso($_POST['numero_de_permiso']);
                $existe_reporte = true;
            }

            if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])){
                //var_dump($_POST['observaciones']);
                $reporte->setObservaciones($_POST['observaciones']);
            }

            //si existen interruptores
            $existe_interruptor_1 = false;
            $existe_interruptor_2 = false;
            if(isset($_POST['name_interruptor_1']) && !empty($_POST['name_interruptor_1'])){
                //var_dump($_POST['name_interruptor_1']);
                $interruptor_1->setNombre($_POST['name_interruptor_1']);
                $existe_interruptor_1 = true;
            }
            if(isset($_POST['name_interruptor_2']) && !empty($_POST['name_interruptor_2'])){
                //var_dump($_POST['name_interruptor_2']);
                $interruptor_2->setNombre($_POST['name_interruptor_2']);
                $existe_interruptor_2 = true;
            }

            // si existen bobinas
            $opciones_checkbox = ['1', '2', '3', '4'];

            for ($i = 0; $i < 4; $i++) {
                $nombre_checkbox_visible = 'disparo_' . $opciones_checkbox[$i];
                $nombre_checkbox_existencia = 'existe_bob_' . $opciones_checkbox[$i];
        
                // Verificar si la bobina existió en el formulario
                //echo $nombre_checkbox_existencia . "- exixtencia<br>";

                if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
                    // Verificar si el checkbox de disparo estaba marcado
                    if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                        $objetos_bobinas[$i]->setDisparo(1); // Disparo activado
                    } else {
                        $objetos_bobinas[$i]->setDisparo(0); // Disparo no activado
                    }
                    //echo $objetos_bobinas[$i]->getDisparo() . "<br>";
                    // Guardar el estado de la bobina
                    $result = $objetos_bobinas[$i]->save();

                    //echo $result . "<br>";
                    
                } else {
                    //echo "Advertencia: No se encontró información para la bobina: " . htmlspecialchars($objetos_bobinas[$i]) . "<br>";
                }
                
            }

            //si existen funciones envio
            $opciones_checkbox = ['1', '2'];
            for ($i = 0; $i < 2; $i++) { 

                if(isset($_POST['name_funcion_envio_' . $opciones_checkbox[$i]])){
                    //var_dump($_POST['name_funcion_envio_' . $opciones_checkbox[$i]]);
                    //logica para guardar nombre de funciones envio
                    $objetos_funcion_envio[$i]->setNombre($_POST['name_funcion_envio_' . $opciones_checkbox[$i]]);
                    //logica para guardar los envio de la funcion envio
                    $envio = isset($_POST['f_envio_' . $opciones_checkbox[$i]]) ? 1 : 0;
                    $objetos_funcion_envio[$i]->setEnvio($envio);

                    $objetos_funcion_envio[$i]->save();
                    //echo "F_env: " . $objetos_funcion_envio[$i]->getNombre() . " - " . $objetos_funcion_envio[$i]->getEnvio() . "<br>";

                }else {
                    //echo "Advertencia: No se encontró información para la Funcion envio: " . htmlspecialchars($objetos_bobinas[$i]) . "<br>";
                }
            }

             // si existen ddt_envio

                 $nombre_checkbox_visible = 'ddt_envio_1';
                 $nombre_checkbox_existencia = 'existe_ddt_envio_1';
         
                 // Verificar si la opción existió en el formulario (el checkbox oculto siempre se envía)
                 if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
                     //echo "Opción: F_envio 1 - Existente, ";
                     // Verificar si el checkbox visible estaba marcado
                     if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                         //echo "Marcada<br>";
                         // Lógica para guardar que esta opción fue marcada
                         $DDT_envio->setEnvio(1);
                     } else {
                         //echo "No Marcada<br>";
                         // Lógica para guardar que esta opción no fue marcada
                         $DDT_envio->setEnvio(0);
                     }

                     $DDT_envio->save();
                 } else {
                     //echo "Advertencia: No se encontró información de existencia para la opción: 1 <br>";
                 }
                 //echo $DDT_envio->getEnvio() . "<br>";


             //si existen funciones recepcion
            $opciones_checkbox = ['1', '2'];
            for ($i = 0; $i < 2; $i++) { 

                if(isset($_POST['name_funcion_recepcion_' . $opciones_checkbox[$i]])){
                    //var_dump($_POST['name_funcion_recepcion_' . $opciones_checkbox[$i]]);
                    //logica para guardar nombre de funciones envio
                    $objetos_funcion_recepcion[$i]->setNombre($_POST['name_funcion_recepcion_' . $opciones_checkbox[$i]]);
                    //logica para guardar los envio de la funcion envio
                    $envio = isset($_POST['f_envio_' . $opciones_checkbox[$i]]) ? 1 : 0;
                    $objetos_funcion_recepcion[$i]->setRecepcion($envio);

                    $objetos_funcion_recepcion[$i]->save();
                    //echo "F_rec: " . $objetos_funcion_recepcion[$i]->getNombre() . " - " . $objetos_funcion_recepcion[$i]->getRecepcion() . "<br>";
                }else {
                    //echo "Advertencia: No se encontró información para la Funcion recepcion: " . htmlspecialchars($objetos_bobinas[$i]) . "<br>";
                }
            }

            // si existen ddt_recepcion
            $nombre_checkbox_visible = 'ddt_recepcion_1';
            $nombre_checkbox_existencia = 'existe_ddt_recepcion_1';
    
            // Verificar si la opción existió en el formulario (el checkbox oculto siempre se envía)
            if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
                //echo "Opción: F_recepcion 1 - Existente, ";
                // Verificar si el checkbox visible estaba marcado
                if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                    //echo "Marcada<br>";
                    // Lógica para guardar que esta opción fue marcada
                    $DDT_recepcion->setRecepcion(1);
                } else {
                    //echo "No Marcada<br>";
                    // Lógica para guardar que esta opción no fue marcada
                    $DDT_recepcion->setRecepcion(0);
                }

                $DDT_recepcion->save();
            } else {
                //echo "Advertencia: No se encontró información de existencia para la opción: 1 <br>";
            }
            //echo $DDT_recepcion->getRecepcion() . "<br>";

            if ($existe_reporte) {
                $reporte->save();
            }

            if ($existe_interruptor_1) {
                $interruptor_1->save();
            }
            if ($existe_interruptor_2) {
                $interruptor_2->save();
            }            

            /**
             * logica para guardar los datos de la segunda proteccion
             */

             if(isset($_POST['id_proteccion_2']) && !empty($_POST['id_proteccion_2'])){
                //var_dump($_POST['id_proteccion']);

                //para las bobinas se establece el id de la proteccion
                for ($i = 0; $i < 4; $i++) {
                    $objetos_bobinas[$i]->setId_proteccion($_POST['id_proteccion_2']);
                    //echo "bobina: " . $objetos_bobinas[$i]->getId_proteccion() . "<br>";
                }
                $interruptor_1->setId_proteccion($_POST['id_proteccion_2']);
                $interruptor_2->setId_proteccion($_POST['id_proteccion_2']);

                // para las funciones envio
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_envio[$i]->setId_proteccion($_POST['id_proteccion_2']);
                    //echo "F_envio: " . $objetos_funcion_envio[$i]->getId_proteccion() . "<br>";
                }

                //para las funciones recepcion
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_recepcion[$i]->setId_proteccion($_POST['id_proteccion_2']);
                    //echo "F_recepcion: " . $objetos_funcion_recepcion[$i]->getId_proteccion() . "<br>";
                }

                $DDT_envio->setId_proteccion($_POST['id_proteccion_2']);
                $DDT_recepcion->setId_proteccion($_POST['id_proteccion_2']);
            }

            if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
                //var_dump($_POST['fecha']);
                $interruptor_1->setFecha($_POST['fecha']);
                $interruptor_2->setFecha($_POST['fecha']);

                for ($i = 0; $i < 4; $i++) {
                    $objetos_bobinas[$i]->setFecha($_POST['fecha']);
                }

                // para las funciones envio
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_envio[$i]->setFecha($_POST['fecha']);
                    //echo "F_envio: " . $objetos_funcion_envio[$i]->getFecha() . "<br>";
                }

                //para las funciones recepcion
                for ($i = 0; $i < 2; $i++) {
                    $objetos_funcion_recepcion[$i]->setFecha($_POST['fecha']);
                    //echo "F_recepcion: " . $objetos_funcion_recepcion[$i]->getFecha() . "<br>";
                }

                $DDT_envio->setFecha($_POST['fecha']);
                $DDT_recepcion->setFecha($_POST['fecha']);
            }

            //si existen interruptores
            $existe_interruptor_1 = false;
            $existe_interruptor_2 = false;
            if(isset($_POST['name_interruptor_2_1']) && !empty($_POST['name_interruptor_2_1'])){
                //var_dump($_POST['name_interruptor_1']);
                $interruptor_1->setNombre($_POST['name_interruptor_2_1']);
                $existe_interruptor_1 = true;
            }
            if(isset($_POST['name_interruptor_2_2']) && !empty($_POST['name_interruptor_2_2'])){
                //var_dump($_POST['name_interruptor_2']);
                $interruptor_2->setNombre($_POST['name_interruptor_2_2']);
                $existe_interruptor_2 = true;
            }

            // si existen bobinas
            $opciones_checkbox = ['1', '2', '3', '4'];

            for ($i = 0; $i < 4; $i++) {
                $nombre_checkbox_visible = 'disparo_2_' . $opciones_checkbox[$i];
                $nombre_checkbox_existencia = 'existe_bob_2_' . $opciones_checkbox[$i];
        
                // Verificar si la bobina existió en el formulario
                if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
                    // Verificar si el checkbox de disparo estaba marcado
                    if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                        $objetos_bobinas[$i]->setDisparo(1); // Disparo activado
                    } else {
                        $objetos_bobinas[$i]->setDisparo(0); // Disparo no activado
                    }
                    //echo $objetos_bobinas[$i]->getDisparo() . "<br>";
                    // Guardar el estado de la bobina
                    $objetos_bobinas[$i]->save();
                } else {
                    //echo "Advertencia: No se encontró información para la bobina: <br>";
                }
            }

            //si existen funciones envio
            $opciones_checkbox = ['1', '2'];
            for ($i = 0; $i < 2; $i++) { 

                if(isset($_POST['name_funcion_envio_2_' . $opciones_checkbox[$i]])){
                    //var_dump($_POST['name_funcion_envio_' . $opciones_checkbox[$i]]);
                    //logica para guardar nombre de funciones envio
                    $objetos_funcion_envio[$i]->setNombre($_POST['name_funcion_envio_2_' . $opciones_checkbox[$i]]);
                    //logica para guardar los envio de la funcion envio
                    $envio = isset($_POST['f_envio_2_' . $opciones_checkbox[$i]]) ? 1 : 0;
                    $objetos_funcion_envio[$i]->setEnvio($envio);

                    $objetos_funcion_envio[$i]->save();
                    //echo "F_env: " . $objetos_funcion_envio[$i]->getNombre() . " - " . $objetos_funcion_envio[$i]->getEnvio() . "<br>";

                }else {
                    //echo "Advertencia: No se encontró información para la Funcion envio:<br>";
                }
            }

             // si existen ddt_envio

                 $nombre_checkbox_visible = 'ddt_envio_2_1';
                 $nombre_checkbox_existencia = 'existe_ddt_envio_2_1';
         
                 // Verificar si la opción existió en el formulario (el checkbox oculto siempre se envía)
                 if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
                     //echo "Opción: F_envio 1 - Existente, ";
                     // Verificar si el checkbox visible estaba marcado
                     if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                         //echo "Marcada<br>";
                         // Lógica para guardar que esta opción fue marcada
                         $DDT_envio->setEnvio(1);
                     } else {
                         //echo "No Marcada<br>";
                         // Lógica para guardar que esta opción no fue marcada
                         $DDT_envio->setEnvio(0);
                     }

                     $DDT_envio->save();
                 } else {
                     //echo "Advertencia: No se encontró información de existencia para la opción: 1 <br>";
                 }
                 //echo $DDT_envio->getEnvio() . "<br>";


             //si existen funciones recepcion
            $opciones_checkbox = ['1', '2'];
            for ($i = 0; $i < 2; $i++) { 

                if(isset($_POST['name_funcion_recepcion_2_' . $opciones_checkbox[$i]])){
                    //var_dump($_POST['name_funcion_recepcion_' . $opciones_checkbox[$i]]);
                    //logica para guardar nombre de funciones envio
                    $objetos_funcion_recepcion[$i]->setNombre($_POST['name_funcion_recepcion_2_' . $opciones_checkbox[$i]]);
                    //logica para guardar los envio de la funcion envio
                    $envio = isset($_POST['f_recepcion_2_' . $opciones_checkbox[$i]]) ? 1 : 0;
                    $objetos_funcion_recepcion[$i]->setRecepcion($envio);

                    $objetos_funcion_recepcion[$i]->save();
                    //echo "F_rec: " . $objetos_funcion_recepcion[$i]->getNombre() . " - " . $objetos_funcion_recepcion[$i]->getRecepcion() . "<br>";
                }else {
                    //echo "Advertencia: No se encontró información para la Funcion recepcion:<br>";
                }
            }

            // si existen ddt_recepcion
            $nombre_checkbox_visible = 'ddt_recepcion_2_1';
            $nombre_checkbox_existencia = 'existe_ddt_recepcion_2_1';
    
            // Verificar si la opción existió en el formulario (el checkbox oculto siempre se envía)
            if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
                //echo "Opción: F_recepcion 1 - Existente, ";
                // Verificar si el checkbox visible estaba marcado
                if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                    //echo "Marcada<br>";
                    // Lógica para guardar que esta opción fue marcada
                    $DDT_recepcion->setRecepcion(1);
                } else {
                    //echo "No Marcada<br>";
                    // Lógica para guardar que esta opción no fue marcada
                    $DDT_recepcion->setRecepcion(0);
                }

                $DDT_recepcion->save();
            } else {
                //echo "Advertencia: No se encontró información de existencia para la opción: 1 <br>";
            }
            //echo $DDT_recepcion->getRecepcion() . "<br>";

            if ($existe_interruptor_1) {
                $interruptor_1->save();
            }
            if ($existe_interruptor_2) {
                $interruptor_2->save();
            }            

            //indica que insertaste un registro para inprimir un mensaje de exito en el index
            $_SESSION['identificado'] = true;

        }
        header("Location:?controller=DatosReporteController&action=index");
    }
 
}