<h1>Gestionar funcion_recepciones</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id proteccion</th>
        <th>nombre</th>
        <th>recepcion</th>
        <th>fecha</th>
    </tr>
    <?php 
        $alterna = 1;
        while($funcion_recepcion = $funcion_recepciones->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$funcion_recepcion->id; ?></td>
            <td><?=$funcion_recepcion->id_proteccion; ?></td>
            <td><?=$funcion_recepcion->nombre; ?></td>
            <td><?=$funcion_recepcion->recepcion ? "Si" : "No" ; ?></td>
            <td><?=$funcion_recepcion->fecha; ?></td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>Funcion_recepcionController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar funcion_recepcion
</a>
