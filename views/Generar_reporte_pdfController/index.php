<h1>Buscar reporte</h1>

<form action="<?=base_url?>?controller=Generar_reporte_pdfController&action=obtenerReporte" method="POST">

    <label for="nombre">nombre</label>
    <?php $subestaciones = Utils::showSubestaciones();?>
    <select name="nombre" id="id_producto">
        <?php while($sub = $subestaciones->fetch_object()): ?>
            <option value="<?=$sub->nombre?>">
                <?=$sub->id . " - " .$sub->nombre?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <input type="submit" value="guardar">
</form>