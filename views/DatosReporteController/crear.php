
<h1>introducir datos del reporte (interruptores, funciones, etc), <span>si no aplica proteccion no introduscas mas datos</span> </h1>

<form action="?controller=DatosReporteController&action=save" method="POST">

<!--muestra las id disponible de los subestaciones de modo de solo seleccionar
la id de las subestaciones que existen en la bd-->
    <?php 
/*
var_dump($fecha);
var_dump($id_proteccion);
die();
*/
    
    $linea_de_transmision = $id_linea_de_transmision;
    $opcion_por_defecto = $id_proteccion;
    //mostrar protecciones
    $protecciones = Utils::showProtecciones();
    //mostrar linea de transmision de las protecciones
    $LT = Utils::showLineas_de_transmision();
    //este div contendra el id de la proteccion y la fecha que sera enviada de manera automatica save
    //estara oculto
    echo "<div class='oculto'>";

    echo '<label for="id_producto">id_linea_de_transmision</label>';
    echo '<select name="id_linea_de_transmision" id="id_producto">';
         while($lin = $LT->fetch_object()){
            echo '<option value="' .$lin->id . '" ';
                if ($linea_de_transmision == $lin->id) echo 'selected';
                echo '>';
                echo $lin->id . " - " .$lin->nombre;
            echo '</option>';
         }
            
         
    echo '</select>';

    $LT->data_seek(0);
/*
    echo '<label for="id_producto">id_proteccion</label>';
    echo '<select name="id_proteccion" id="id_producto" value ="' . $id_proteccion . '">';
    while ($lin = $LT->fetch_object()) {
        while($pro = $protecciones->fetch_object()){
            if ($lin->id == $pro->id_linea_de_transmision) {
                echo '<option value="' . $pro->id .'" ';
                    if ($opcion_por_defecto == $pro->id) echo 'selected';
                echo '>';
                echo 'LT: (' . $lin->nombre . ') Prot: ' . $pro->id . ' - ' . $pro->nombre;
                echo '</option>';
            }
        }
        $protecciones->data_seek(0);
    }
    echo '</select>';

    */   
    echo '<label for="id_proteccion_1">id proteccion 1</label>';
    echo '<input type="number" name="id_proteccion" value="' . $id_proteccion . '">';

    echo '<label for="id_proteccion_2">id proteccion 2</label>';
    echo '<input type="number" name="id_proteccion_2" value="' . $id_proteccion_2 . '">';

    echo '<label for="fecha">Fecha</label>';
    echo '<input type="date" name="fecha" value="' . $fecha . '">';

    echo '<label for="numero_de_permiso">Numero_de_permiso</label>';
    echo '<input type="text" name="numero_de_permiso" value="' . $n_permiso . '">';

    echo '<label for="observaciones">Observaciones:</label><br>';
    echo '<textarea id="observaciones" name="observaciones" rows="3" cols="40">' . $observaciones . '</textarea>';

    echo '</div>';

    ?>

<?php 
    ECHO "<H1>Primera proteccion</H1>";

//interruptores
    $existen_interruptores = false;
    //di existen interruptores
    if($n_interruptores > 0){
        echo "<h1>interruptores</h1>";
        for ($i=1; $i <= $n_interruptores; $i++) { 
            echo '<label for="nombre">nombre del interruptor: ' . $i . '</label>';
            echo '<input type="text" name="name_interruptor_' . $i . '">';
        }
        $existen_interruptores = true;
    }





//bobinas
    if ($existen_interruptores) {
        if ($n_bobinas > 0) {
            echo "<h1>bobinas</h1>";
            for ($i=1; $i <= $n_bobinas; $i++) { 
                echo '<h2>bobina:' . $i . '</h2>';
                
                echo '<label for="disparo">Disparo:</label>';
                echo '<input type="checkbox" name="disparo_' . $i . '" id="disparo" value="1">';

                echo "<div class='oculto'>";
                echo '<label for="disparo">detenta si la bobina existe (este input estara oculto):</label>';
                echo '<input type="checkbox" name="existe_bob_' . $i . '" id="disparo" value="1" checked>';
                echo '</div>';

                /*
                echo '<label for="disparo">pertenece a interruptor:</label>';
                echo '<input type="number" name="pertenece_' . $i . '" value="' . $i . '">';
                */
    
            }
        }
    }



//funciones envio
    $existen_funciones_envio = false;
        //si existen funciones envioes
        if($n_funcion_envio > 0){
            echo "<h1>funcion envio</h1>";
            for ($i=1; $i <= $n_funcion_envio; $i++) { 
                echo '<label for="nombre">nombre de la funcion envio: ' . $i . '</label>';
                echo '<input type="text" name="name_funcion_envio_' . $i . '">';

                echo '<label for="envio">envio:</label>';
                echo '<input type="checkbox" name="f_envio_' . $i . '" id="disparo" value="1">';

            
        }
            $existen_funciones_envio = true;
        }




// ddt envio
//creo que las DDT se relacionan con la proteccion mas que con las funciones
    if ($existen_funciones_envio) {
        if ($n_ddt_envio > 0) {
            echo "<h1>DDT envio</h1>";
            for ($i=1; $i <= $n_ddt_envio; $i++) { 
                echo '<h2>DDT envio:' . $i . '</h2>';
                
                echo '<label for="envio">envio:</label>';
                echo '<input type="checkbox" name="ddt_envio_' . $i . '" id="disparo" value="1">';

                echo "<div class='oculto'>";
                echo '<label for="disparo">detecta si el ddt existe (este input estara oculto):</label>';
                echo '<input type="checkbox" name="existe_ddt_envio_' . $i . '" id="disparo" value="1" checked>';
                echo '</div>';
            }
        }
    }




// funcion recepcion
    $existen_funcion_recepcion = false;
        //si existen funciones recepciones
        if($n_funcion_recepcion > 0){
            echo "<h1>funcion recepcion</h1>";
            for ($i=1; $i <= $n_funcion_recepcion; $i++) { 
                echo '<label for="nombre">nombre de la funcion recepcion: ' . $i . '</label>';
                echo '<input type="text" name="name_funcion_recepcion_' . $i . '">';

                echo '<label for="recepcion">recepcion:</label>';
                echo '<input type="checkbox" name="f_recepcion_' . $i . '" id="disparo" value="1">';

            
            }
            $existen_funcion_recepcion = true;
        }




//ddt recepcion
//creo que las DDT se relacionan con la proteccion mas que con las funciones
    if ($existen_funcion_recepcion) {
        if ($n_ddt_recepcion > 0) {
            echo "<h1>DDT recepcion</h1>";
            for ($i=1; $i <= $n_ddt_recepcion; $i++) { 
                echo '<h2>DDT recepcion:' . $i . '</h2>';
                
                echo '<label for="disparo">recepcion:</label>';
                echo '<input type="checkbox" name="ddt_recepcion_' . $i . '" id="disparo" value="1">';

                echo "<div class='oculto'>";
                echo '<label for="recepcion">detecta si el ddt existe (este input estara oculto):</label>';
                echo '<input type="checkbox" name="existe_ddt_recepcion_' . $i . '" id="disparo" value="1" checked>';
                echo '</div>';

            }
        }
    }

    /**
     * si existe la segunda proteccion se creara una segunda parte del formulario
     * para introducir los datos de esta proteccion
     */
    //si se selecciono algun id valido ya que 0 significa que no se quiere meter proteccion
    if ($id_proteccion_2 != 0) {
        ECHO "<H1>Segunda proteccion</H1>";
        //interruptores
        $existen_interruptores = false;
        //di existen interruptores
        if($n_interruptores_2 > 0){
            echo "<h1>interruptores</h1>";
            for ($i=1; $i <= $n_interruptores_2; $i++) { 
                echo '<label for="nombre">nombre del interruptor: ' . $i . '</label>';
                echo '<input type="text" name="name_interruptor_2_' . $i . '">';
            }
            $existen_interruptores = true;
        }





    //bobinas
        if ($existen_interruptores) {
            if ($n_bobinas_2 > 0) {
                echo "<h1>bobinas</h1>";
                for ($i=1; $i <= $n_bobinas_2; $i++) { 
                    echo '<h2>bobina:' . $i . '</h2>';
                    
                    echo '<label for="disparo">Disparo:</label>';
                    echo '<input type="checkbox" name="disparo_2_' . $i . '" id="disparo" value="1">';

                    echo "<div class='oculto'>";
                    echo '<label for="disparo">detenta si la bobina existe (este input estara oculto):</label>';
                    echo '<input type="checkbox" name="existe_bob_2_' . $i . '" id="disparo" value="1" checked>';
                    echo '</div>';
        
                }
            }
        }


    //funciones envio
        $existen_funciones_envio = false;
            //si existen funciones envioes
            if($n_funcion_envio_2 > 0){
                echo "<h1>funcion envio</h1>";
                for ($i=1; $i <= $n_funcion_envio_2; $i++) { 
                    echo '<label for="nombre">nombre de la funcion envio: ' . $i . '</label>';
                    echo '<input type="text" name="name_funcion_envio_2_' . $i . '">';

                    echo '<label for="envio">envio:</label>';
                    echo '<input type="checkbox" name="f_envio_2_' . $i . '" id="disparo" value="1">';

                
                }
                $existen_funciones_envio = true;
            }




    // ddt envio
    //creo que las DDT se relacionan con la proteccion mas que con las funciones
        if ($existen_funciones_envio) {
            if ($n_ddt_envio_2 > 0) {
                echo "<h1>DDT envio</h1>";
                for ($i=1; $i <= $n_ddt_envio_2; $i++) { 
                    echo '<h2>DDT envio:' . $i . '</h2>';
                    
                    echo '<label for="envio">envio:</label>';
                    echo '<input type="checkbox" name="ddt_envio_2_' . $i . '" id="disparo" value="1">';

                    echo "<div class='oculto'>";
                    echo '<label for="disparo">detecta si el ddt existe (este input estara oculto):</label>';
                    echo '<input type="checkbox" name="existe_ddt_envio_2_' . $i . '" id="disparo" value="1" checked>';
                    echo '</div>';
                }
            }
        }




    // funcion recepcion
        $existen_funcion_recepcion = false;
            //si existen funciones recepciones
            if($n_funcion_recepcion_2 > 0){
                echo "<h1>funcion recepcion</h1>";
                for ($i=1; $i <= $n_funcion_recepcion_2; $i++) { 
                    echo '<label for="nombre">nombre de la funcion recepcion: ' . $i . '</label>';
                    echo '<input type="text" name="name_funcion_recepcion_2_' . $i . '">';

                    echo '<label for="recepcion">recepcion:</label>';
                    echo '<input type="checkbox" name="f_recepcion_2_' . $i . '" id="disparo" value="1">';

                
                }
                $existen_funcion_recepcion = true;
            }




    //ddt recepcion
    //creo que las DDT se relacionan con la proteccion mas que con las funciones
        if ($existen_funcion_recepcion) {
            if ($n_ddt_recepcion_2 > 0) {
                echo "<h1>DDT recepcion</h1>";
                for ($i=1; $i <= $n_ddt_recepcion_2; $i++) { 
                    echo '<h2>DDT recepcion:' . $i . '</h2>';
                    
                    echo '<label for="disparo">recepcion:</label>';
                    echo '<input type="checkbox" name="ddt_recepcion_2_' . $i . '" id="disparo" value="1">';

                    echo "<div class='oculto'>";
                    echo '<label for="recepcion">detecta si el ddt existe (este input estara oculto):</label>';
                    echo '<input type="checkbox" name="existe_ddt_recepcion_2_' . $i . '" id="disparo" value="1" checked>';
                    echo '</div>';

                }
            }
        }
    }

?>

    <input type="submit" value="guardar">
</form>