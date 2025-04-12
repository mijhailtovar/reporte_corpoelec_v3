<h1>inserta fecha para el reporte general</h1>

<form action="<?=base_url?>?controller=Generar_reporte_pdfController&action=general" method="POST">

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">

    <input type="submit" value="Generar reporte general">
</form>