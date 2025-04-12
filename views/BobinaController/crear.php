<h1>Crear Bobina</h1>

<form action="<?=base_url?>?controller=BobinaController&action=save" method="POST">

<!--muestra las id disponible de los subestaciones de modo de solo seleccionar
la id de las subestaciones que existen en la bd-->
<label for="id_interruptor">id_interruptor</label>
    <?php $interruptor = Utils::showInterruptor();?>
    <select name="id_interruptor" id="id_producto">
        <?php while($inter = $interruptor->fetch_object()): ?>
            <option value="<?=$inter->id?>">
                <?=$inter->id . " - " .$inter->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="disparo">Disparo:</label>
    <input type="checkbox" name="disparo" id="disparo" value="1">

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <input type="submit" value="guardar">
</form>