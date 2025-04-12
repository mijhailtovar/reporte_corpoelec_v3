<h1>Crear DDT_envio</h1>

<form action="<?=base_url?>?controller=DDT_envioController&action=save" method="POST">

<!--muestra las id disponible de los Funcion_recepcion de modo de solo seleccionar
la id de las Funcion_recepcion que existen en la bd-->
<label for="id_funcion_envio">id_funcion_envio</label>
    <?php $id_funcion_envios = Utils::showFuncion_envio();?>
    <select name="id_funcion_envio" id="id_producto">
        <?php while($id_funcion_envio = $id_funcion_envios->fetch_object()): ?>
            <option value="<?=$id_funcion_envio->id?>">
                <?=$id_funcion_envio->id . " - " .$id_funcion_envio->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="envio">Envio:</label>
    <input type="checkbox" name="envio" id="envio" value="1">

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <input type="submit" value="guardar">
</form>