
<?php

include_once '../Controlador/conexion.inc.php';


//Primera consulta donde buscamos en el id_contacto 
//(Desde la vista del usuario en la tabla por eso el nombre de la variable contactoVistaUsuario) 


$sql = 'SELECT * FROM relacion_usuario_usuario INNER JOIN usuarios 
        ON relacion_usuario_usuario.id_contacto = usuarios.id 
        WHERE relacion_usuario_usuario.id_usuario =' . $usuario['id'];


$consulta = $conexion->prepare($sql);
$consulta->execute();
$resultado = $consulta->fetchAll();  //Esta funcion devuelve todos los datos de la consulta
$contactoVistaUsuario = $resultado;


//Segunda consulta donde buscamos en el id_usuario 
//(Desde la vista del contacto en la tabla por eso el nombre de la variable ContactoVistaContacto)

$sql = 'SELECT * FROM relacion_usuario_usuario INNER JOIN usuarios 
        ON relacion_usuario_usuario.id_usuario = usuarios.id 
        WHERE relacion_usuario_usuario.id_contacto =' . $usuario['id'];


$consulta = $conexion->prepare($sql);
$consulta->execute(); 
$resultado = $consulta->fetchAll(); //Esta funcion devuelve todos los datos de la consulta
$ContactoVistaContacto = $resultado;

?>

