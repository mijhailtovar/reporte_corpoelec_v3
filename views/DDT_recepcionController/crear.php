<h1>Crear DDT_recepcion</h1>

<form action="<?=base_url?>?controller=DDT_recepcionController&action=save" method="POST">

<!--muestra las id disponible de los Funcion_recepcion de modo de solo seleccionar
la id de las Funcion_recepcion que existen en la bd-->
<label for="id_funcion_recepcion">id_funcion_recepcion</label>
    <?php $id_funcion_recepciones = Utils::showFuncion_recepcion();?>
    <select name="id_funcion_recepcion" id="id_producto">
        <?php while($id_funcion_recepcion = $id_funcion_recepciones->fetch_object()): ?>
            <option value="<?=$id_funcion_recepcion->id?>">
                <?=$id_funcion_recepcion->id . " - " .$id_funcion_recepcion->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="recepcion">Recepcion:</label>
    <input type="checkbox" name="recepcion" id="recepcion" value="1">

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <input type="submit" value="guardar">
</form>