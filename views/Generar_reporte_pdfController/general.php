<h1>reporte general de la fecha <?=$fecha?></h1>

<table>
    <tr class="alterna">
        <th>anillo</th>
        <th>linea</th>
        <th>N_permiso</th>
        <th>interruptor_1</th>
        <th>interruptor_2</th>
        <th>F_recepcion</th>
        <th>F_envio</th>
        <th>DDT_envio</th>
        <th>DDT_recepcion</th>
    </tr>

    <?php 
    //determina el numero inicial de el numero de reportes de la fecha elegida
    $N_inicial_reportes = $numero_de_reportes;

        while ($lin = $lineas->fetch_object()) {
            while($rep = $reportes->fetch_object()){
                if ($lin->id == $rep->id_linea_de_transmision) {
                   echo "<tr>";
                    echo "<td>". $lin->anillo ."</td>";
                    echo "<td>". $lin->nombre ."</td>";
                    echo "<td>". $rep->numero_de_permiso ."</td>";
                   echo "</tr>";

                   //disminuye la cantidad de reportes (numero de permiso), que quedan sin leer
                   $numero_de_reportes--;
                }

            }
            $reportes->data_seek(0);
            //si no ha imprimido nada pora la linea
 
            if ($numero_de_reportes == $N_inicial_reportes) {
                echo "<tr>";
                    echo "<td>". $lin->anillo ."</td>";
                    echo "<td>". $lin->nombre ."</td>";
                echo "</tr>";
            
            }//si se han imprimido ya datos por la linea
            elseif ($numero_de_reportes < $N_inicial_reportes) {
                # si no entonces actualiza el contador
                $N_inicial_reportes = $numero_de_reportes;
            }

        }
        $lineas->data_seek(0);
    
    ?>

</table>