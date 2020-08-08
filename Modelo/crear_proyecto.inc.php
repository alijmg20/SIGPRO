
<?php

//EN PROCESO DE CONSTRUCCION


// Inclusiones: 

include_once '../Controlador/conexion.inc.php';

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


if (isset($_POST['registrar'])) {

    $nombre = $_POST['nombre_proyecto'];                    // nombre
    $descripcion_proyecto = $_POST['descripcion_proyecto'];         // descripcion
    $usuario_proyecto = $usuario['id'];           // id de usuario que crea el proyecto(------> variable $_SESSION declarada en ingresar.inc.php)
    $cliente_proyecto = $cliente;           // id del cliente(----> variable $_cliente declarada en agregar_cliente.inc.php)
    $termino_proyecto = 0;                                   // indicador si se termino o no                              
    if (!empty($_POST['fecha_final'])) {
        $fecha_final_proyecto = $_POST['fecha_final'];  // fecha entrega
        list($ano, $mes, $dia) = explode('/', $fecha_final_proyecto);
        $fecha_definitiva = $ano . '-' . $mes . '-' . $dia . ' 00:00:00';
    }

    if (!empty($nombre) && !empty($descripcion_proyecto) && !empty($usuario_proyecto) && !empty($cliente_proyecto) && !empty($fecha_final_proyecto)) {
        if (nombres_Repetidos($nombre, $conexion,$usuario['id']) ==1 ) { // validacion para no tener proyectos con el mismo nombre
            $mensaje = 'Ya existe un proyecto con ese nombre';
        } else {



            $sql = 'INSERT INTO proyecto (nombre,descripcion,id_usuario,id_cliente,terminado,fecha_inicio,fecha_final) VALUES (:nombre,:descripcion,:id_usuario,:id_cliente,:terminado,CURRENT_TIMESTAMP(),:fecha_final)';
            $consulta = $conexion->prepare($sql);

            if ($consulta->execute(array(
                ':nombre' => $nombre,
                ':descripcion' => $descripcion_proyecto,
                ':id_usuario' => $usuario_proyecto,
                ':id_cliente' => $cliente_proyecto,
                ':terminado' => $termino_proyecto,
                ':fecha_final' => $fecha_definitiva
            ))) {
                $proyecto = $conexion->lastInsertId();
                $mensaje = 'successfull';
            }
        }
        $sql = ' INSERT INTO relacion_usuario_proyecto(id_usuario,id_proyecto) VALUES (:id_usuario,:id_proyecto) ';
        $consulta = $conexion->prepare($sql);
        if ($consulta->execute(array(
            ':id_usuario' => $usuario_proyecto,
            ':id_proyecto' => $proyecto,
        ))) {
            $mensaje = 'successfull';
        }
    } else {
        $mensaje = 'date_wrong';
    }
}


//Funcion para buscar nombre de proyectos repetidos 
//----------------------------------------------------------------
function nombres_Repetidos($nombre, $conexion,$id_usuario)
{   
    $sql = "SELECT COUNT(*) FROM proyecto WHERE nombre = :nombre AND id_usuario = :id_usuario ";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_STR);
    $consulta->execute();
    $contador = $consulta->fetchColumn();
    if ($n = ($contador > 0)) {
        return $n;
    } else {
        return 0;
    }
}
