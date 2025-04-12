<h1>Crear Reporte</h1>

<form action="<?=base_url?>?controller=ReporteController&action=save" method="POST">

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
    <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea>

    <input type="submit" value="guardar">
</form>