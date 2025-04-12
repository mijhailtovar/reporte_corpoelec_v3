<h1>Crear Subestacion</h1>

<form action="<?=base_url?>?controller=SubestacionController&action=save" method="POST">

    <label for="nombre">nombre</label>
    <input type="text" name="nombre">

    <input type="submit" value="guardar">
</form>