<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $opciones_checkbox = ['1', '2', '3', '4'];

    for ($i = 0; $i < 4; $i++) {
        $nombre_checkbox_visible = 'disparo_' . $opciones_checkbox[$i];
        $nombre_checkbox_existencia = 'existe_bob_' . $opciones_checkbox[$i];

        // Verificar si la bobina existió en el formulario
        if (isset($_POST[$nombre_checkbox_existencia]) && $_POST[$nombre_checkbox_existencia] == '1') {
            // Verificar si el checkbox de disparo estaba marcado
            if (isset($_POST[$nombre_checkbox_visible]) && $_POST[$nombre_checkbox_visible] == '1') {
                $objetos_bobinas[$i]->setsetDisparo(1); // Disparo activado
            } else {
                $objetos_bobinas[$i]->setsetDisparo(0); // Disparo no activado
            }
            var_dump($objetos_bobinas[$i]);
            // Guardar el estado de la bobina
            //$objetos_bobinas[$nombre_bobina]->save();
        } else {
            echo "Advertencia: No se encontró información para la bobina: " . htmlspecialchars($objetos_bobinas[$i]) . "<br>";
        }
    }
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Bobinas</title>
    <style>
        .oculto {
            display: none;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label>Control de Bobinas:</label><br>
            <?php
            $nombres_bobinas_form = ['bobina_1', 'bobina_2', 'bobina_3', 'bobina_4'];

            foreach ($nombres_bobinas_form as $nombre_bobina) {
                $nombre_checkbox_visible = 'disparo_' . str_replace(' ', '_', $nombre_bobina);
                $nombre_checkbox_existencia = 'existe_' . str_replace(' ', '_', $nombre_bobina);

                echo '<div>';
                echo '<label for="' . $nombre_checkbox_visible . '">' . htmlspecialchars(ucfirst(str_replace('_', ' ', $nombre_bobina))) . ' Disparo:</label>';
                echo '<input type="checkbox" id="' . $nombre_checkbox_visible . '" name="' . $nombre_checkbox_visible . '" value="1"> <br>';
                echo '<input type="checkbox" name="' . $nombre_checkbox_existencia . '" value="1" class="oculto" checked>';
                echo '</div>';
            }
            ?>
        </div>

        <button type="submit">Guardar Estado de Bobinas</button>
    </form>
</body>
</html>