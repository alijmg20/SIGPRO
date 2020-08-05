<?php

include_once '../Controlador/conexion.inc.php';
if (isset($_POST["boton_agregar_contacto"])) {
    $correo_usuario = $_POST["correo_contacto"];
    if (relacion_repetida($correo_usuario, $conexion) == 1) { //FUNCION PARA VER SI EXISTE EL CLIENTE REGISTRADO

        $mensaje = 'before_cliente';
        
    } else if (!empty($correo_usuario)) {
        $sql = 'SELECT * FROM usuarios WHERE correo ='.$correo_usuario;
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchColumn();
        $id_contacto = $resultado['id'];
        $id_usuario = $usuario['id'];
        $sql = 'INSERT INTO relacion_usuario_usuario(id_usuario,id_contacto) VALUES (:id_usuario,:id_contacto)';
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
function relacion_repetida($correo, $conexion)
{
    $sql = "SELECT COUNT(*) FROM relacion_usuario_usuario INNER JOIN usuarios
    ON relacion_usuario_usuario.id_contacto = usuarios.id 
    WHERE usuarios.correo =" . $correo;

    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $aux = $consulta->fetchColumn();

    $sql = "SELECT COUNT(*) FROM relacion_usuario_usuario INNER JOIN usuarios
    ON relacion_usuario_usuario.id_usuario = usuarios.id WHERE usuarios.correo =" . $correo;

    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $aux2 = $consulta->fetchColumn();

    if ($aux > 0 || $aux2 > 0) {
        return 1;
    } else {
        return 0;
    }
}
