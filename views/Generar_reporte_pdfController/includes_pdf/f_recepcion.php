<?php
    while ($f_recep = $Funcion_recepciones->fetch_object()) {
        //si pertenece a la proteccion
        if($f_recep->id_proteccion == $pro->id){
            
            //y si tiene la misma fecha que el reporte
            if($f_recep->hora_creacion == $rep->hora_creacion){
                $f_recep_name = $f_recep->nombre;
                $f_recep_recepcion = $f_recep->recepcion;
            }
        }
    }$Funcion_recepciones->data_seek(0);
?>