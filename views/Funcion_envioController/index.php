<h1>Gestionar Funcion_envio</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id_proteccion</th>
        <th>nombre</th>
        <th>recepcion</th>
        <th>fecha</th>
    </tr>
    <?php 
        $alterna = 1;
        while($Funcion_envio = $Funcion_envios->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$Funcion_envio->id; ?></td>
            <td><?=$Funcion_envio->id_proteccion; ?></td>
            <td><?=$Funcion_envio->nombre; ?></td>
            <td><?=$Funcion_envio->envio ? "Si" : "No" ; ?></td>
            <td><?=$Funcion_envio->fecha; ?></td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>Funcion_envioController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar Funcion_envio
</a>
