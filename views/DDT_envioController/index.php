<h1>Gestionar DDT_envio</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id_funcion_envio</th>
        <th>envio</th>
        <th>fecha</th>
    </tr>
    <?php 
        $alterna = 1;
        while($DDT_envio = $DDT_envios->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$DDT_envio->id; ?></td>
            <td><?=$DDT_envio->id_funcion_envio; ?></td>
            <td><?=$DDT_envio->envio ? "Si" : "No" ; ?></td>
            <td><?=$DDT_envio->fecha; ?></td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>DDT_envioController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar DDT_envio
</a>
