<?php  

$html .= "<h3>".$pro->nombre. "</h3>";
$html .= "<table>
<tr class='alterna'>
    <th>Anillo</th>
    <th>Linea</th>
    <th>Nº permiso</th>
    <th>Fecha</th>
</tr>";

$html .= "<tr>";
    $html .= "<td>". $lin->anillo ."</td>";
    $html .= "<td>". $lin->nombre ."</td>";
    $html .= "<td>". $numero_de_permiso ."</td>";
    $html .= "<td>". $fecha_reporte ."</td>";
$html .= "</tr>";

$html .= "</table>";
//separador
$html .= '<div style="width: 305px; height: 25px;" ></div>';

$html .= "<table>
        <tr class='alterna'>
            <th colspan='2' >Interruptor_1</th>
            <th colspan='2' >Interruptor_2</th>
            <th>F_envio</th>
            <th>F_recepcion</th>
            <th>DDT_envio</th>
            <th>DDT_recepcion</th>
        </tr>";

    $html .= "<tr>";
        if (isset($name_inter_1) && $name_inter_1 != 'NA') {
            $html .= "<td colspan='2' >". $name_inter_1 . "</td>";
        }else{
            $html .= "<td colspan='2' >NA</td>";
        }
        if (isset($name_inter_2) && $name_inter_2 != 'NA') {
            $html .= "<td colspan='2' >". $name_inter_2 . " </td>";
        }else{
            $html .= "<td colspan='2' >NA</td>";
        }
        if (isset($f_env_name) && $f_env_name != 'NA') {
            $html .= "<td>". $f_env_name . ": " . ($f_env_envio ? 'SI' : 'NO') . "</td>";
        }else{
            $html .= "<td>NA</td>";
        }
        if (isset($f_recep_name) && $f_recep_name != 'NA') {
            $html .= "<td>". $f_recep_name . ": " . ($f_recep_recepcion ? 'SI' : 'NO') . "</td>";
        }else{
            $html .= "<td>NA</td>";
        }
        
        
        if(isset($ddt_envio_envio) && $ddt_envio_envio != 'NA'){
            $html .= "<td>". ($ddt_envio_envio ? 'SI' : 'NO') . "</td>";
        }else{
            $html .= "<td>NA</td>";
        }
        if(isset($ddt_recepcion_recepcion) && $ddt_recepcion_recepcion != 'NA'){
            $html .= "<td>". ($ddt_recepcion_recepcion ? 'SI' : 'NO') . "</td>";
        }else{
            $html .= "<td>NA</td>";
        }
    $html .= "</tr>";

    //fila del encabezado de bobinas
    $html .= "<tr>
        <th colspan='2' >bobinas</th>
        <th colspan='2' >bobinas</th>
        </tr>";

    //fila de las bobinas
    $html .= "<tr>";
    for ($i = 0; $i < 4; $i++) {
        
        if(isset($disparos_bobinas[$i])){
            $html .= "<td>". ($disparos_bobinas[$i] ? 'SI' : 'NO') . "</td>";
        }else{
            $html .= "<td>NA</td>";
        }
    }
    $html .= "</tr>";


    


$html .= "</table>";
//separador
$html .= '<div style="width: 305px; height: 25px;" ></div>';
?>