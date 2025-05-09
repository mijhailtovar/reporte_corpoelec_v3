<?php
while($ddt_envio = $DDT_envios->fetch_object()){
    //si pertenece a la proteccion
   if($ddt_envio->id_proteccion == $pro->id){

        // Obtén los objetos DateTime a partir de los timestamps
        $fecha_envio = new DateTime($ddt_envio->hora_creacion);
        $fecha_rep = new DateTime($rep->hora_creacion);

        // Extrae el año, mes, día, hora y minuto de cada fecha
        $minuto_envio = $fecha_envio->format('Y-m-d H:i');
        $minuto_rep = $fecha_rep->format('Y-m-d H:i');

       //y si tiene la misma fecha que el reporte
       /*
       echo " <br>id proteccion ddt envio: " . $ddt_envio->id_proteccion;
       echo "<br>H_ddt_env: " . $ddt_envio->hora_creacion . "  H_rep: " .$rep->hora_creacion;
    */
    
       if($minuto_envio == $minuto_rep){
           $ddt_envio_envio = $ddt_envio->envio;
       }
   }
}$DDT_envios->data_seek(0);
?>