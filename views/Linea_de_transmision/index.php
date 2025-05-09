<h1>Lineas de transmision</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id_subestacion</th>
        <th>nombre</th>
        <th>anillo</th>
    </tr>
    <?php 
        $alterna = 1;
        while($lin = $L_transmisiones->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$lin->id; ?></td>
            <td><?=$lin->id_subestacion; ?></td>
            <td><?=$lin->nombre; ?></td>
            <td><?=$lin->anillo; ?></td>
            <td class="box">
                <a href="?controller=Linea_de_transmisionController&action=eliminar&id=<?=$lin->id; ?>" class="button button-red button-delete">eliminar</a>
            </td>
        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>


<a href="?controller=Linea_de_transmisionController&action=crear" class="button button-small" id="RegistrarMercancia">
    Registrar Lineas de transmision
</a>
