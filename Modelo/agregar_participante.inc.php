<?php

/**
 * Tipo: Funcion para añadir participantes al proyecto 
 * Parametros: 
 *  $id_proyecto_cliente  $participantes ( arreglo, para esto se modifico el userwindow en la linea 369 ----> name= participante[]) 
 * 
 */
//Inclusion 
include_once '../Controlador/conexion.inc.php';

// consultar para obtener el id del proyecto segun el nombre del proyecto
if (isset($_POST["registrar"])) {
        $contador = 0;

        $id_proyecto = $proyecto;  // -----------------> guardar en 
        if(isset($_POST["controlParticipantes"])) {
                $participantes= $_POST["controlParticipantes"]; 
                $contador = count($participantes);
        }
        
        
        //Recorremos el array de los particiapantes seleccionados 
        for ($i = 0; $i < $contador ; $i++) {

                // extraer id del participante seleccionado y guardarlo en variable, esta id la saco de la tabla usuario y la busco a traves del nombre 
                // guardar esa variable en la tabla relacion_usuario_proyecto 
                //guardar la variable con el id del proyecto en la tabla relacion_usuario_proyecto 

                // consultar para obtener el id del participante segun el nombre seleccionado
                  // guardar id del usuario seleccionado en una variable 
                // Insertar en tabla 

                $sql = 'INSERT INTO relacion_usuario_proyecto(id_usuario,id_proyecto) VALUES (:id_usuario,:id_proyecto)';
                $consulta = $conexion->prepare($sql);
                if ($consulta->execute(array(':id_usuario' => $participantes[$i], ':id_proyecto' => $id_proyecto)));
        }
}
