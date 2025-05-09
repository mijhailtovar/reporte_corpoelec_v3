//si no ha imprimido nada por la linea 
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