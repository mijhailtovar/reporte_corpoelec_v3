<h1>Gestionar Reportes</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <colgroup>
        <col class="columna-dos">
        <col class="columna-dos">
        <col>
        <col>
        <col>
    </colgroup>
    <tr>
        <th>id</th>
        <th>id L transmision</th>
        <th>fecha</th>
        <th>N_permiso</th>
        <th>observaciones</th>
    </tr>
    <?php 
        $alterna = 1;
        while($rep = $reportes->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$rep->id; ?></td>
            <td><?=$rep->id_linea_de_transmision; ?></td>
            <td><?=$rep->fecha; ?></td>
            <td><?=$rep->numero_de_permiso; ?></td>
            <td><?=$rep->observaciones; ?></td>
            <td class="box">
                <a href="<?=base_url?>ReporteController/eliminar&id=<?=$rep->id; ?>" class="button button-red button-delete">eliminar</a>
            </td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>ReporteController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar reporte
</a>
