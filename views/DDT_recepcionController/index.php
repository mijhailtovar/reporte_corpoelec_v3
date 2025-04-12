<h1>Gestionar DDT_recepcion</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id_funcion_recepcion</th>
        <th>recepcion</th>
        <th>fecha</th>
    </tr>
    <?php 
        $alterna = 1;
        while($DDT_recepcion = $DDT_recepciones->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$DDT_recepcion->id; ?></td>
            <td><?=$DDT_recepcion->id_funcion_recepcion; ?></td>
            <td><?=$DDT_recepcion->recepcion ? "Si" : "No" ; ?></td>
            <td><?=$DDT_recepcion->fecha; ?></td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>DDT_recepcionController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar DDT_recepcion
</a>
