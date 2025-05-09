

<h1>Gestionar Subestaciones</h1>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"] == "complete"): ?>
    <strong class="alert_green">Registro eliminado exitosamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"] == "failed"): ?>
    <strong class="alert_red">El registro fallo eliminarse en la BD</strong>
<?php endif; ?>
<?php Utils::deleteSession("delete"); ?>
<!--separador de  el aviso de eliminacion y la tabla-->
<div style="width: 305px; height: 25px;" ></div>

<table>
    <colgroup>
        <col class="columna-uno">
        <col>
        <col class="columna-tres">
     </colgroup>
    <tr>
        <th>id</th>
        <th>nombre</th>
    </tr>
    <?php 
/*
var_dump($L_transmisiones->fetch_object());
die;
*/
        
        while($sub = $subestaciones->fetch_object()): 
    ?>
        <tr class="alterna" >
            <td><?=$sub->id; ?></td>
            <td><?=$sub->nombre; ?></td>
            <td class="box">
                <a href="?controller=SubestacionController&action=eliminar&id=<?=$sub->id; ?>" class="button button-red button-delete">eliminar</a>
            </td>

            <?php 
                while($lin = $L_transmisiones->fetch_object()): 
                    if($lin->id_subestacion == $sub->id):
                ?>
                <tr>
                    <td><?=$lin->id; ?></td>
                    <td><?=$lin->nombre; ?></td>
                    <td><?=$lin->anillo; ?></td>
                </tr>
                <?php
                    endif;
                endwhile;

                $L_transmisiones->data_seek(0);
            ?>

        </tr>
    <?php

        endwhile;
     ?>
</table>


<a href="?controller=SubestacionController&action=crear" class="button button-small" id="RegistrarMercancia">
    Registrar Subestacion
</a>
