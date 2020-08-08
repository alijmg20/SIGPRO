<?php
/* 
Funcion: Crear actividades 
Parametros a utilizar: 
$nombre_actividad    $descripcion_actividad   $lider   
$termino_actividad   $fechaI_actividad        $fechaE_actividad 
*/
// Inclusiones: 
include_once '../Controlador/conexion.inc.php';
//----------------------------------------------------------------------------------------------------------------



if (isset($_POST['guardar'])) {                                     // name del boton que esta en principaluser.php linea 251

    $id_proyecto = $_GET['id'];                                       // para obtener de la URL el id. 
    $lider = $_POST["lider_actividad"];                               // lider de actividad
    $nombre_actividad = $_POST['nombreactividad'];                    // nombre
    $descripcion_actividad = $_POST['descripcion'];                   // descripcion
    $termino_actividad = $_POST["poncentajeactividad"];               // termino de actividad                                                                   
    if (!empty($_POST['fechafin'])) {
        $fecha_final_actividad = $_POST['fechafin'];                    // fecha entrega
        list($ano, $mes, $dia) = explode('/', $fecha_final_actividad);
        $fecha_definitiva = $ano . '-' . $mes . '-' . $dia . ' 00:00:00';
    }

    // probar que se este guardando todos los datos de forma correcta 
    //echo $nombre_actividad; 
    //echo $descripcion_actividad; 
    //echo $termino_actividad; 
    //echo $fecha_definitiva; 
    //echo $id_proyecto; 
    //echo $lider[0];  



    if (!empty($nombre_actividad) && !empty($descripcion_actividad) && !empty($fecha_final_actividad) && !empty($lider)) {

        $sql = 'INSERT INTO actividades(nombre,descripcion,terminado,fecha_inicio,fecha_final, id_proyecto,id_usuario) VALUES (:nombre,:descripcion,:terminado,CURRENT_TIMESTAMP(),:fecha_final,:id_proyecto,:id_usuario)';
        $consulta = $conexion->prepare($sql);

        if ($consulta->execute(array(
            ':nombre' => $nombre_actividad,
            ':descripcion' => $descripcion_actividad,
            ':terminado' => $termino_actividad,
            ':fecha_final' => $fecha_definitiva,
            ':id_proyecto' => $id_proyecto,
            ':id_usuario' => $lider[0]

        ))) {
            $actividad = $conexion->lastInsertId();
            $mensaje = 'successfull';
        }
    }
}
