<h1>Crear Funcion_recepcion</h1>

<form action="<?=base_url?>?controller=Funcion_recepcionController&action=save" method="POST">

<!--muestra las id disponible de los subestaciones de modo de solo seleccionar
la id de las subestaciones que existen en la bd-->
<label for="id_producto">id_proteccion</label>
<?php 

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
    
echo '</select>'
?>


    <label for="nombre">nombre</label>
    <input type="text" name="nombre">

    <label for="recepcion">Recepcion:</label>
    <input type="checkbox" name="recepcion" id="recepcion" value="1">

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <input type="submit" value="guardar">
</form>