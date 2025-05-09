<?php  

echo "<h3>".$pro->nombre. "</h3>";
echo "<table>
<tr class='alterna'>
    <th>Anillo</th>
    <th>Linea</th>
    <th>Nº permiso</th>
    <th>Fecha</th>
</tr>";

echo "<tr>";
    echo "<td>". $lin->anillo ."</td>";
    echo "<td>". $lin->nombre ."</td>";
    echo "<td>". $numero_de_permiso ."</td>";
    echo "<td>". $fecha_reporte ."</td>";
echo "</tr>";

echo "</table>";
//separador
echo '<div style="width: 305px; height: 25px;" ></div>';

echo "<table>
        <tr class='alterna'>
            <th colspan='2' >Interruptor_1</th>
            <th colspan='2' >Interruptor_2</th>
            <th>F_envio</th>
            <th>F_recepcion</th>
            <th>DDT_envio</th>
            <th>DDT_recepcion</th>
        </tr>";

    echo "<tr>";
        if (isset($name_inter_1) && $name_inter_1 != 'NA') {
            echo "<td colspan='2' >". $name_inter_1 . "</td>";
        }else{
            echo "<td colspan='2' >NA</td>";
        }
        if (isset($name_inter_2) && $name_inter_2 != 'NA') {
            echo "<td colspan='2' >". $name_inter_2 . " </td>";
        }else{
            echo "<td colspan='2' >NA</td>";
        }
        if (isset($f_env_name) && $f_env_name != 'NA') {
            echo "<td>". $f_env_name . ": " . ($f_env_envio ? 'SI' : 'NO') . "</td>";
        }else{
            echo "<td>NA</td>";
        }
        if (isset($f_recep_name) && $f_recep_name != 'NA') {
            echo "<td>". $f_recep_name . ": " . ($f_recep_recepcion ? 'SI' : 'NO') . "</td>";
        }else{
            echo "<td>NA</td>";
        }
        
        
        if(isset($ddt_envio_envio) && $ddt_envio_envio != 'NA'){
            echo "<td>". ($ddt_envio_envio ? 'SI' : 'NO') . "</td>";
        }else{
            echo "<td>NA</td>";
        }
        if(isset($ddt_recepcion_recepcion) && $ddt_recepcion_recepcion != 'NA'){
            echo "<td>". ($ddt_recepcion_recepcion ? 'SI' : 'NO') . "</td>";
        }else{
            echo "<td>NA</td>";
        }
    echo "</tr>";

    //fila del encabezado de bobinas
    echo "<tr>
        <th colspan='2' >bobinas</th>
        <th colspan='2' >bobinas</th>
        </tr>";

    //fila de las bobinas
    echo "<tr>";
    for ($i = 0; $i < 4; $i++) {
        
        if(isset($disparos_bobinas[$i])){
            echo "<td>". ($disparos_bobinas[$i] ? 'SI' : 'NO') . "</td>";
        }else{
            echo "<td>NA</td>";
        }
    }
    echo "</tr>";


    


echo "</table>";
//separador
echo '<div style="width: 305px; height: 25px;" ></div>';
?>