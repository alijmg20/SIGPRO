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

if (isset($_POST["registrar"])) {

    $nombre_completo = $_POST['nombre'];
    $correo_registro = $_POST['correo_registro'];
    $password_registro = $_POST['password_registro'];
    $password_confirmacion = $_POST['password_confirmacion'];
    if (!empty($nombre_completo) && !empty($correo_registro) && !empty($password_registro) && !empty($password_confirmacion)) {
        $sql = 'SELECT * FROM usuarios WHERE usuarios.correo ='.$correo_registro;
        $consulta = $conexion->prepare($sql);
       $usuario = $consulta->execute();

        if(!filter_var($correo_registro, FILTER_VALIDATE_EMAIL)){

            
        }else if($usuario &&$password_registro === $password_confirmacion) {
            $sql = 'INSERT INTO  usuarios(nombre_completo,correo,clave) VALUES (:nombre_completo,:correo,:clave)';

            $consulta = $conexion->prepare($sql);
            $password_registro_cifrado = md5($password_registro);

            $consulta -> execute(array(
                ':nombre_completo' => $nombre_completo,
                ':correo' => $correo_registro,
                ':clave' => $password_registro_cifrado,
            ));


        }else{

        }
    }
}
