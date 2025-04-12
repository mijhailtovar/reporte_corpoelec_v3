<h1>Gestionar bobinas</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id_interruptor</th>
        <th>disparo</th>
        <th>fecha</th>
    </tr>
    <?php 
        $alterna = 1;
        while($bobina = $bobinas->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$bobina->id; ?></td>
            <td><?=$bobina->id_interruptor; ?></td>
            <td><?=$bobina->disparo ? "Si" : "No" ; ?></td>
            <td><?=$bobina->fecha; ?></td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="<?=base_url;?>BobinaController/crear" class="button button-small" id="RegistrarMercancia">
    Registrar bobina
</a>
