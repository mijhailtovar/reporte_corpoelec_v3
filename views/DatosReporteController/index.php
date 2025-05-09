<h1>Introducir datos del reporte de la proteccion</h1>
<h2>introducir numero de bobinas y funciones (si aplica) introduce 0 si no aplica</h2>
<br>


<form action="?controller=DatosReporteController&action=crear" method="POST">

    <h2>Reporte</h2>

    <!--muestra las id disponible de los Lineas_de_transmision de modo de solo seleccionar
    la id de las Lineas_de_transmision que existen en la bd-->
    <label for="id_producto">id_linea_de_transmision</label>
    <?php $Lineas_de_transmision = Utils::showLineas_de_transmision();?>
    <select name="id_linea_de_transmision" id="id_producto">
        <?php while($lin = $Lineas_de_transmision->fetch_object()): ?>
            <option value="<?=$lin->id?>">
                <?=$lin->id . " - " .$lin->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <label for="numero_de_permiso">Numero_de_permiso</label>
    <input type="text" name="numero_de_permiso">

    <label for="observaciones">Observaciones:</label><br>
    <textarea id="observaciones" name="observaciones" rows="3" cols="30"></textarea>

    <h1>primera proteccion</h1>
    <h2>proteccion</h2>

<?php
    //protecciones

    //mostrar protecciones
    $protecciones = Utils::showProtecciones();
    //mostrar linea de transmision de las protecciones
    $LT = Utils::showLineas_de_transmision();

    echo '<select name="id_proteccion" id="id_producto">';
    while ($lin = $LT->fetch_object()) {
        while($pro = $protecciones->fetch_object()){
            if ($lin->id == $pro->id_linea_de_transmision) {
                echo '<option value=' . $pro->id . '>';
                echo 'LT: (' . $lin->nombre . ') Prot: ' . $pro->id . ' - ' . $pro->nombre;
                echo '</option>';
            }
        }
        $protecciones->data_seek(0);
    }
        
    echo '</select>';
?>

    <h2>interruptores</h2>

    <label for="n_interruptores">numero de interruptores:</label>
    <input type="number" name="n_interruptores"  value="0" min="0" max="2">

    <h2>bobinas</h2>

    <label for="n_bobinas">numero de bobinas:</label>
    <input type="number" name="n_bobinas"  value="0" min="0" max="4">

    <h2>funcion envio</h2>

    <label for="n_funcion_envio">numero de funciones envio:</label>
    <input type="number" name="n_funcion_envio"  value="0" min="0" max="2">    

    <h2>ddt_envio</h2>

    <label for="n_ddt_envio">numero de ddt envio:</label>
    <input type="number" name="n_ddt_envio"  value="0" min="0" max="1"> 

    <h2>funcion recepcion</h2>

    <label for="n_funcion_recepcion">numero de funcion recepcion:</label>
    <input type="number" name="n_funcion_recepcion"  value="0" min="0" max="2">

    <h2>DDT recepcion</h2>

    <label for="n_ddt_recepcion">numero de ddt recepcion:</label>
    <input type="number" name="n_ddt_recepcion"  value="0" min="0" max="1">

    <h1>segunda proteccion (opcional)</h1>
    <h2>proteccion 2 (opcional)</h2>

<?php
    //protecciones

    //mostrar protecciones
    $protecciones = Utils::showProtecciones();
    //mostrar linea de transmision de las protecciones
    $LT = Utils::showLineas_de_transmision();

    echo '<select name="id_proteccion_2" id="id_producto">';
    // imprime la opcion 0 (que no existe proteccion)
    echo '<option value=' . 0 . ' selected >';
    echo 'Sin proteccion (no aplica proteccion)';
    echo '</option>';
    while ($lin = $LT->fetch_object()) {
        while($pro = $protecciones->fetch_object()){
            if ($lin->id == $pro->id_linea_de_transmision) {
                echo '<option value=' . $pro->id . '>';
                echo 'LT: (' . $lin->nombre . ') Prot: ' . $pro->id . ' - ' . $pro->nombre;
                echo '</option>';
            }
        }
        $protecciones->data_seek(0);
    }
        
    echo '</select>';
?>

    <h2>interruptores</h2>

    <label for="n_interruptores_2">numero de interruptores:</label>
    <input type="number" name="n_interruptores_2"  value="0" min="0" max="2">

    <h2>bobinas</h2>

    <label for="n_bobinas_2">numero de bobinas:</label>
    <input type="number" name="n_bobinas_2"  value="0" min="0" max="4">

    <h2>funcion envio</h2>

    <label for="n_funcion_envio_2">numero de funciones envio:</label>
    <input type="number" name="n_funcion_envio_2"  value="0" min="0" max="2">    

    <h2>ddt_envio</h2>

    <label for="n_ddt_envio_2">numero de ddt envio:</label>
    <input type="number" name="n_ddt_envio_2"  value="0" min="0" max="1"> 

    <h2>funcion recepcion</h2>

    <label for="n_funcion_recepcion_2">numero de funcion recepcion:</label>
    <input type="number" name="n_funcion_recepcion_2"  value="0" min="0" max="2">

    <h2>DDT recepcion</h2>

    <label for="n_ddt_recepcion_2">numero de ddt recepcion:</label>
    <input type="number" name="n_ddt_recepcion_2"  value="0" min="0" max="1">


    <input type="submit" value="guardar">
</form>