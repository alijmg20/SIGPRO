<?php

/**
 * Tipo: Funcion de insertar usuarios
 * Parametros: 
 *  $nombre_completo  $correo_registro $password_registro $password_confirmacion 
 * 
 */


//Inclusion del controlador

include_once 'Controlador/conexion.inc.php';


//-------------------------------------------------------------------------------------------------
if (isset($_POST['registro'])) {
    $nombre_completo = $_POST['nombre'];
    $correo_registro  = $_POST['correo_registro'];
    $password_registro = $_POST['password_registro'];
    $password_confirmacion = $_POST['password_confirmacion'];


    if (!empty($nombre_completo) && !empty($correo_registro) && !empty($password_registro) && !empty($password_confirmacion)) {
        if (buscarRepetidos($correo_registro, $conexion) ==1 ) {
            $mensaje = 'before_register';
        }else if(!filter_var($correo_registro,FILTER_VALIDATE_EMAIL)){
            $mensaje = 'bad_email';
            return;
        } else {
            if ($password_confirmacion === $password_registro ) {

                $sql = 'INSERT INTO usuarios(nombre_completo,correo,clave) VALUES (:nombre_completo,:correo,:clave)';
                $consulta = $conexion->prepare($sql);
                $password_cifrado = password_hash($password_registro, PASSWORD_BCRYPT);

                if ($consulta->execute(array(
                    ':nombre_completo' => $nombre_completo,
                    ':correo' => $correo_registro,
                    ':clave' => $password_cifrado,
                ))) {
                    $mensaje = 'successfull';
                }
            }
             else {
                $mensaje = 'bad_password';
            }
        }
    } else {
        $mensaje = 'date_wrong';
    }
}

function buscarRepetidos($correo, $conexion)
{
    $sql = "SELECT COUNT(*) FROM usuarios WHERE correo = :correo";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':correo',$correo,PDO::PARAM_STR);
    $consulta->execute();
    $contador = $consulta->fetchColumn();
    if ($n = ($contador > 0)) {
        return $n;
    } else {
        return 0;
    }
}
