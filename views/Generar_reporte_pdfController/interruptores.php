<?php
    //interruptor 1
    while($interruptor_1 = $interruptores->fetch_object()){
        //interruptor 2
        while($interruptor_2 = $interruptores_2->fetch_object()){
            
            //si el interruptor 1 y el 2 pertenecen a la misma proteccion
                if($interruptor_1->id_proteccion == $pro->id && $interruptor_2->id_proteccion == $pro->id){

                    //si no es el mismo interruptor
                    if($interruptor_1->id != $interruptor_2->id){
                        //si la fecha de esos interruptores es igual (se introdujeron juntos)
                        //y ademas si tienen la misma fecha que reporte
                        if ($interruptor_1->hora_creacion == $interruptor_2->hora_creacion && $interruptor_1->hora_creacion == $rep->hora_creacion) {
                                $name_inter_1 = $interruptor_1->nombre;
                                $name_inter_2 = $interruptor_2->nombre;
                        }
                    }
                    //puede que no pertenescan a la misma prteccion o sea un solo interruptor por proteccion
                }else{
                    if ($interruptor_1->id_proteccion == $pro->id && $interruptor_1->hora_creacion == $rep->hora_creacion) {
                        $name_inter_1 = $interruptor_1->nombre;
                    }
                }
        }$interruptores_2->data_seek(0);
    }$interruptores->data_seek(0);
?>