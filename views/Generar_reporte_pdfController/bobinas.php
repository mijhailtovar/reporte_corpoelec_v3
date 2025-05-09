<?php
$COUNT_BOBINA = 0;
while($bobina = $Bobinas->fetch_object()){
    //si pertenece a la proteccion
   if($bobina->id_proteccion == $pro->id){

        // Obtén los objetos DateTime a partir de los timestamps
        $fecha_bobina = new DateTime($bobina->hora_creacion);
        $fecha_rep = new DateTime($rep->hora_creacion);

        //echo $bobina->hora_creacion . "<br>";

        // Extrae el año, mes, día, hora y minuto de cada fecha
        $minuto_bobina = $fecha_bobina->format('Y-m-d H:i');
        $minuto_rep = $fecha_rep->format('Y-m-d H:i');

       //y si tiene la misma fecha que el reporte
       /*
       echo " <br>id proteccion ddt bobina: " . $bobina->id_proteccion;
       echo "<br>H_ddt_env: " . $bobina->hora_creacion . "  H_rep: " .$rep->hora_creacion;
    */
    
        
            $bobina_disparo = $bobina->disparo;
            
            if($minuto_bobina == $minuto_rep){
                $disparos_bobinas[$COUNT_BOBINA] = $bobina->disparo;
                $COUNT_BOBINA++;
            }
            
            
   }
}$Bobinas->data_seek(0);
?>