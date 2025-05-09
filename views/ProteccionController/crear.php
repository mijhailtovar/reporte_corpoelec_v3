<h1>Crear Proteccion</h1>

<form action="?controller=ProteccionController&action=save" method="POST">

<!--muestra las id disponible de los lineas de transmision de modo de solo seleccionar
la id de las lineas que existen en la bd-->
<label for="id_producto">id_linea_de_transmision</label>
    <?php $Lineas = Utils::showLineas_de_transmision();?>
    <select name="id_linea_de_transmision" id="id_producto">
        <?php while($lin = $Lineas->fetch_object()): ?>
            <option value="<?=$lin->id?>">
                <?=$lin->id . " - " .$lin->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="nombre">nombre</label>
    <input type="text" name="nombre">

    <label for="marca">Marca</label>
    <input type="text" name="marca">

    <label for="modelo">Modelo</label>
    <input type="text" name="modelo">

    <input type="submit" value="guardar">
</form>