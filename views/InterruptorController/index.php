<h1>Gestionar interruptores</h1>

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
    </tr>
    <?php 
        $alterna = 1;
        while($interruptor = $interruptores->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$interruptor->id; ?></td>
            <td><?=$interruptor->id_proteccion; ?></td>
            <td><?=$interruptor->nombre; ?></td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>InterruptorController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar interruptor
</a>
