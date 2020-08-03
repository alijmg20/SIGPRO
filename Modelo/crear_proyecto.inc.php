
<?php

//EN PROCESO DE CONSTRUCCION


// Inclusiones: 

include_once 'Controlador/conexion.inc.php';

/* 

Parametros a utilizar: 
$nombre             $descripcion_proyecto  $usuario_proyecto   $cliente_proyecto 
$termino_proyecto   $fechaI_proyecto       $fechaE_proyecto 

/*
1- Id del cliente = 
1.1. Guardar segun formulario en la tabla de cliente.  
1.2 Validar que ya no existe un cliente con el mismo correo. 

2- Terminado =
3- añadir particiapntes = 

*/


if (isset($_POST['nuevoproyecto'])) {
    $nombre = $_POST['nombreproyecto'];                    // nombre
    $descripcion_proyecto = $_POST['descripcion'];         // descripcion
    $usuario_proyecto = $_SESSION['id_usuario'];           // id de usuario que crea el proyecto(------> variable $_SESSION declarada en ingresar.inc.php)
    $cliente_proyecto = $_cliente['cliente_id'];           // id del cliente(----> variable $_cliente declarada en agregar_cliente.inc.php)
   // $termino_proyecto;                                   // indicador si se termino o no 
    $fechaI_proyecto = strtotime(date("Y-m-d",time()));    // fecha inicio                                 
    $fechaE_proyecto = strtotime($_POST['inputState']);    // fecha entrega


    if (!empty($nombre) && !empty($descripcion_proyecto) && !empty($usuario_proyecto) && !empty($cliente_proyecto)&& !empty($termino_proyecto) && !empty($fechaI_proyecto)&& !empty($fechaE_proyecto)) {
        if (nombres_Repetidos($nombre, $conexion) ==1 ) { // validacion para no tener proyectos con el mismo nombre
            $mensaje = 'Ya existe un proyecto con ese nombre';
        } else {
            if ($fechaE_proyecto>$fechaI_proyecto) {


                $sql = 'INSERT INTO proyecto(nombre,descripcion,id_usuario,id_cliente,terminado,fecha_inicio,fecha_final) VALUES (:nombre,:descripcion,:id_usuario,:id_cliente,:terminado,:fecha_inicio,:fecha_final)';
                $consulta = $conexion->prepare($sql);

                if ($consulta->execute(array(
                    ':nombre' => $nombre,
                    ':descripcion' => $descripcion_proyecto,
                    ':id_usuario' => $usuario_proyecto,
                    ':id_cliente' => $cliente_proyecto,
                    /* ':terminado' => $f,*/
                    ':fecha_inicio' => $fechaI_proyecto,
                    ':fecha_final' => $fechaE_proyecto,))) {
                    $mensaje = 'successfull';
                }
            } else {
                $mensaje = 'incorrect delivery date';
            }
        }
    } else {
        $mensaje = 'date_wrong';
    }
}


//Funcion para buscar nombre de proyectos repetidos 
//----------------------------------------------------------------
function nombres_Repetidos($nombre, $conexion)
{
    $sql = "SELECT COUNT(*) FROM proyecto WHERE nombre = :nombre";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $consulta->execute();
    $contador = $consulta->fetchColumn();
    if ($n = ($contador > 0)) {
        return $n;
    } else {
        return 0;
    }
}
