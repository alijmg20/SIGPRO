<?php

include_once '../Controlador/conexion.inc.php';


if (isset($_POST["boton_agregar_contacto"])) {
    $correo_usuario = $_POST["correo_contacto"];
    if (relacion_repetida($correo_usuario, $conexion,$usuario['id']) === 1) { //FUNCION PARA VER SI EXISTE EL CLIENTE REGISTRADO

        $mensaje = 'before_cliente';
        
    }else if(!filter_var($correo_usuario,FILTER_VALIDATE_EMAIL)){
        $mensaje = 'bad_email';
        return;
    } else if (!empty($correo_usuario)) {
        $sql = "SELECT * FROM usuarios WHERE correo = :email";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':email', $correo_usuario, PDO::PARAM_STR);
        $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
        $id_contacto = $resultados['id'];  
        $id_usuario = $usuario['id'];
        $sql = 'INSERT INTO relacion_usuario_usuario (id_usuario,id_contacto) VALUES (:id_usuario,:id_contacto)';
        $consulta = $conexion->prepare($sql);
        if ($consulta->execute(array(
            ':id_usuario' => $id_usuario,
            ':id_contacto' => $id_contacto
        ))) {
            $mensaje = 'successfull';
        }
    }
}


// verificar si existe un correo del cliente ya registrado 
function relacion_repetida($correo_usuario, $conexion,$usuario)
{
    $sql = "SELECT * FROM usuarios WHERE correo = :email";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':email', $correo_usuario, PDO::PARAM_STR);
    $consulta->execute();
    $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
    $id_contacto = $resultados['id'];  

    $sql = 'SELECT COUNT(*) FROM relacion_usuario_usuario WHERE id_usuario = :id_usuario AND id_contacto = :id_contacto';
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':id_usuario', $usuario, PDO::PARAM_STR);
    $consulta->bindParam(':id_contacto', $id_contacto, PDO::PARAM_STR);
    $consulta->execute();
    $aux = $consulta->fetchColumn();
    if ($aux > 0) {
        return 1;
    } else {
        return 0;
    }

}