<h1>Crear Linea de transmision</h1>

<form action="<?=base_url?>?controller=linea_de_transmisionController&action=save" method="POST">

<!--muestra las id disponible de los subestaciones de modo de solo seleccionar
la id de las subestaciones que existen en la bd-->
<label for="id_producto">id_subestacion</label>
    <?php $subestaciones = Utils::showSubestaciones();?>
    <select name="id_subestacion" id="id_producto">
        <?php while($sub = $subestaciones->fetch_object()): ?>
            <option value="<?=$sub->id?>">
                <?=$sub->id . " - " .$sub->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="nombre">nombre</label>
    <input type="text" name="nombre">

    <label for="anillo">Anillo</label>
    <input type="number" name="anillo">

    <input type="submit" value="guardar">
</form>