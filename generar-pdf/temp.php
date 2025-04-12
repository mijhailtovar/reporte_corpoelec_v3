

$html .= "<h1>Gestionar reportes</h1>";



<tr>
        <th>id</th>
        <th>nombre</th>
        <th>cantidad</th>
        <th>condicion_envase</th>
        <th>ubicacion</th>
    </tr>";

$alterna = 1; 
while($pro = $productos->fetch_object()){

    if ($alterna % 2 == 0) {
        $clase_alterna = "alterna";
    }else{
        $clase_alterna = '';
    }

    $html .= '<tr class="' . $clase_alterna . '">
            <td>' . $pro->id . '</td>
            <td>' . $pro->nombre . '</td>
            <td>' . $pro->cantidad . '</td>
            <td>' . $pro->condicion_envase . '</td>
            <td>' . $pro->ubicacion . '</td>
        </tr>';

    $alterna++;
}


//Tabla de funciones y DDT
            $html .= "<table>";

            //fila del nombre de la proteccion
            $html .= '<tr class="' . $clase_alterna . '"><td colspan="4">' . $pro->nombre . '</td></tr>';

            //fila del nombre del interruptor
            $html .= '<tr class="' . $clase_alterna . '">';
            $cantidad_interruptores = 0;
            while ($intr = $interruptores->fetch_object()) {
                if ($intr->id_proteccion == $pro->id) {
                    $html .= '<td colspan="2">' . $intr->nombre . '</td>';
                    $cantidad_interruptores++;
                }
            }
            $html .= '</tr>';