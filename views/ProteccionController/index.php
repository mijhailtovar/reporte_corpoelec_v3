<h1>Gestionar Protecciones</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>

<table>
    <tr>
        <th>id</th>
        <th>id_L_Trans</th>
        <th>nombre</th>
        <th>marca</th>
        <th>modelo</th>
    </tr>
    <?php 
/*
var_dump($protecciones->fetch_object());
die;
*/

        $alterna = 1;
        while($pro = $protecciones->fetch_object()): 
    ?>
        <tr class="<?= ($alterna % 2 == 0) ? "alterna" : "" ?>" >
            <td><?=$pro->id; ?></td>
            <td><?=$pro->id_linea_de_transmision; ?></td>
            <td><?=$pro->nombre; ?></td>
            <td><?=$pro->marca; ?></td>
            <td><?=$pro->modelo; ?></td>
            <td class="box">
                <a href="?controller=ProteccionController&action=eliminar&id=<?=$pro->id; ?>" class="button button-red button-delete">eliminar</a>
            </td>

        </tr>
    <?php
        $alterna++; 
        endwhile;
     ?>
</table>



<a href="?controller=ProteccionController&action=crear" class="button button-small" id="RegistrarMercancia">
    Registrar Protecciones
</a>
