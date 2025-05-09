<?php
while($ddt_recepcion = $DDT_recepciones->fetch_object()){
    //si pertenece a la proteccion
   if($ddt_recepcion->id_proteccion == $pro->id){

        // Obtén los objetos DateTime a partir de los timestamps
        $fecha_recepcion = new DateTime($ddt_recepcion->hora_creacion);
        $fecha_rep = new DateTime($rep->hora_creacion);

        // Extrae el año, mes, día, hora y minuto de cada fecha
        $minuto_recepcion = $fecha_recepcion->format('Y-m-d H:i');
        $minuto_rep = $fecha_rep->format('Y-m-d H:i');

       //y si tiene la misma fecha que el reporte
       /*
       echo " <br>id proteccion ddt recepcion: " . $ddt_recepcion->id_proteccion;
       echo "<br>H_ddt_recep: " . $ddt_recepcion->hora_creacion . "  H_rep: " .$rep->hora_creacion;
        */

       if($minuto_recepcion == $minuto_rep){
           $ddt_recepcion_recepcion = $ddt_recepcion->recepcion;
       }
   }
}$DDT_recepciones->data_seek(0);
?>