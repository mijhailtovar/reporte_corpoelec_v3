<?php
     while ($f_env = $Funcion_envios->fetch_object()) {
        //si pertenece a la proteccion
        if($f_env->id_proteccion == $pro->id){
            //y si tiene la misma fecha que el reporte
            if($f_env->hora_creacion == $rep->hora_creacion){
                $f_env_name = $f_env->nombre;
                $f_env_envio = $f_env->envio;
            }
        }
    }$Funcion_envios->data_seek(0);
?>