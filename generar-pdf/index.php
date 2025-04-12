<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . "/../models/Subestacion.php";
require_once __DIR__ . "/../models/Reporte.php";
require_once __DIR__ . '/../vendor/autoload.php';

//genera un aobjeto mpdf
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);


$sub = $subestacion->fetch_object();
$rep = $reporte->fetch_object();

$html = '<style type="text/css">
        body{
            font-family: Calibri;
        }
        h1 {
            font-size: 40px;
            font-weight: bold;
            letter-spacing: 1px;
            text-align: center;
            border-bottom: 1px solid black;
            margin-bottom: 20px;
            padding: 25px;
            padding-top: 0px;
        }
        p {
            font-size: 20px;
        }
        ul{
            background: green;
            color: white;
        }

        table {
        text-align: center;
        width: 100%;

        border-collapse: collapse;
        margin: auto;
        }

        table caption {
            /*
            text-align: center;
            background-color: #01B1EA;
            width: 30%;
            border-radius: 5px;
            display: block;
            */
            font-size: 1.4em;
            text-align: center;
            padding-top: 25px;
        }

        table td,
        table th {
            border: 1px solid #1e2794;
            /* padding: 10px, 10px, 5px, 5px; */
        }

        table th {
            padding-top: 5px;
            padding-bottom: 5px;

            background-color: #1d60b3;
            color: white;
        }

        th {
            font-weight: bold;
        }

        table tr td{
           font-size: 20px;
        }
        table tr.alterna td {
            background-color: #9bc4f7;
        }
    </style>';

$html .= "<h1>Plan especial de protecciones aragua</h1>";
//escribe en el objeto pdf
$mpdf->WriteHTML($html);
// borra el objeto html para escribir cosas diferentes
$html = "";

/* aqui empieza el bucle de las lineas de transmision
donde se recorren todas las lineas de transmision */
$alterna = 1; 
while($lin = $lineas->fetch_object()){
/*
    if ($alterna % 2 == 0) {
        $clase_alterna = "alterna";
    }else{
        $clase_alterna = '';
    }
*/
    /**tabla de los datos de la subestacion y las lineas, 
     * por cada linea de transmision una pagina */
    $html .= "<table>";

    $html .= "<tr class='alterna'>";
    $html .= "<td>". $sub->nombre . "</td>";
    $html .= "<td>". "fecha:" . "</td>";
    $html .= "<td>". $rep->fecha . "</td>";
    $html .= "</tr>";

    $html .= '<tr><td>' . $lin->nombre . '</td><td>Permiso:</td><td>' . 'P/T- ' . $rep->numero_de_permiso . '</td></tr>';

    $html .= "</table>";

    //separador
    $html .= '<div style="width: 305px; height: 25px;" ></div>';

    //tabla de las protecciones
    while ($pro = $protecciones->fetch_object()) {
        // si la proteccion pertenece a la linea de transmision
        if ($pro->id_linea_de_transmision == $lin->id) {
            $html .= "<table>";

            //fila del nombre de la proteccion
            $html .= '<tr class="alterna"><td colspan="4">' . $pro->nombre . '</td></tr>';

            //reinicia el contador de interruptores
            $interruptores->data_seek(0);

            //fila del nombre del interruptor
            $html .= '<tr>';
            $cantidad_interruptores = 0;
            while ($intr = $interruptores->fetch_object()) {
                if ($intr->id_proteccion == $pro->id) {
                    $html .= '<td colspan="2">' . $intr->nombre . '</td>';
                    $cantidad_interruptores++;
                }
            }
            $html .= '</tr>';

            

            //fila de las bobinas si disparo o no
            if ($cantidad_interruptores <= 0) {
                //no hagas ninguna fila de bobinas si no hay interruptores
            }
            elseif($cantidad_interruptores <= 1){
                $html .= '<tr><td>Bobina 1</td><td>Bobina 2</td></tr>';

                $html .= '<tr>';
                while ($intr = $interruptores->fetch_object()) {
                    while ($bob = $Bobinas->fetch_object()) {
                        if ($bob->id_interruptor == $intr->id) {
                            $html .= '<td>' . 'Disparo: ' . ($bob->disparo ? 'SI' : 'NO'). '</td>';
                        }
                    }            
                }            
                $html .= '</tr>';

                //reinicia el contaador de interruptores
                $interruptores->data_seek(0);

            }elseif($cantidad_interruptores >= 2){
                $html .= '<tr><td>Bobina 1</td><td>Bobina 2</td><td>Bobina 1</td><td>Bobina 2</td></tr>';

                $html .= '<tr>';
                while ($intr = $interruptores->fetch_object()) {
                    $count = 1;
                    while ($bob = $Bobinas->fetch_object()) {
                        if ($bob->id_interruptor == $intr->id) {
                            if($count == 1){
                                $html .= '<td>' . ($count ? 'Disparo: ' : '' ) . ($bob->disparo ? '√' : 'X') . '</td>';
                            }else{
                                $html .= '<td>' . ($bob->disparo ? '√' : 'X') . '</td>';
                            }
                            $count = 0;
                        }
                    }            
                }            
                $html .= '</tr>';
            }
            $html .= "</table>";

            $html .= '<div style="width: 305px; height: 25px;" ></div>';

            //fila de interruptores y DDT
            $html .= "<table>";

            //fila del encabezado las funciones recepcion y envio
            $html .= '<tr class="alterna"><td colspan="2">Envio de HF</td><td colspan="2">Recepcion de HF</td>';
            $html .= '<td>Envio DDT</td><td>Recepcion DDT</td></tr>';

            //fila del nombre de las funciones tanto de envio como de recepcion
            $html .= '<tr>';
            $count_2 = 0;
            while ($fun_env = $Funcion_envios->fetch_object()) {
                if ($fun_env->id_proteccion == $pro->id) {
                    $html .= '<td>' . $fun_env->nombre . '</td>';
                }elseif($count_2 < 2){
                    $html .= '<td>NA</td>';
                }
                $count_2++;
            }

            while ($fun_rep = $Funcion_recepciones->fetch_object()) {
                if ($fun_rep->id_proteccion == $pro->id) {
                    $html .= '<td>' . $fun_rep->nombre . '</td>';
                }elseif($count_2 < 2){
                    $html .= '<td>NA</td>';
                }
                $count_2++;
            }
            $html .= '</tr>';

            //reinicio de contadores de las funciones envio y recepcion para iterar otra vez sobre los
            //registros en la DB
            $Funcion_envios->data_seek(0);
            $Funcion_recepciones->data_seek(0);

            //fila de los disparos tanto de la funcion envio como la funcion recepcion y los DDT
            $html .= '<tr>';
            $count_1 = 0;
            $count_2 = 0;
            $count_3 = 0;
            $count_4 = 0;
            
            //funcion envios
            while ($fun_env = $Funcion_envios->fetch_object()) {
                if ($fun_env->id_proteccion == $pro->id) {
                    $html .= '<td>' . ($fun_env->envio ? '√' : 'X') . '</td>';
                }elseif($count_1 < 2){
                    $html .= '<td>NA</td>';
                }
                $count_1++;
            }

            //funcion recepcion
            while($fun_rep = $Funcion_recepciones->fetch_object()){
                if ($fun_rep->id_proteccion == $pro->id) {
                    $html .= '<td>' . ($fun_rep->recepcion ? '√' : 'X') . '</td>';
                }elseif($count_2 < 2){
                    $html .= '<td>NA</td>';
                }
                $count_2++;
            }
            $html .= '</tr>';

            //reinicia para iterar las DDT
            $Funcion_envios->data_seek(0);
            //DDT_envio
            while ($fun_env = $Funcion_envios->fetch_object()) {
                while ($DDT_env = $DDT_envios->fetch_object()) {
                    if ($DDT_env->id_funcion_envio == $fun_env->id) {
                        $html .= '<td>' . ($DDT_env->envio ? '√' : 'X') . '</td>';
                    }elseif($count_1 < 2){
                        $html .= '<td>NA</td>';
                    }
                    $count_1++;
                }
            }

            //reinicia para iterar las DDT
            $Funcion_recepciones->data_seek(0);
            //DDT_envio
            while ($fun_rep = $Funcion_recepciones->fetch_object()) {
                while ($DDT_rep = $DDT_recepciones->fetch_object()) {
                    if ($DDT_rep->id_funcion_recepcion == $fun_rep->id) {
                        $html .= '<td>' . ($DDT_rep->recepcion ? '√' : 'X') . '</td>';
                    }elseif($count_1 < 2){
                        $html .= '<td>NA</td>';
                    }
                    $count_1++;
                }
            }


            $html .= "</table>";
            $html .= '<div style="width: 305px; height: 25px;" ></div>';

        }
        $alterna++;
    }

    //escribe en el objeto pdf, es decir escribe una pagina
    $mpdf->WriteHTML($html);
    // borra el objeto html para escribir cosas diferentes
    $html = "";
    // genera otra pagina, por cada linea genera otra pagina
    $mpdf->AddPage();
    // vuelve al principio de las protecciones para poder capturar otras
    // protecciones que coincidan con la linea de transmision
    $protecciones->data_seek(0);
    $interruptores->data_seek(0);
    $Funcion_envios->data_seek(0);
    $Funcion_recepciones->data_seek(0);
}


//genera el objeto pdf
$mpdf->Output();

//cierra las
$lineas->close();
$protecciones->close();