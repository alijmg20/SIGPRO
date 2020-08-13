
<?php

include_once '../Controlador/conexion.inc.php';

$sql = 'SELECT * FROM actividades INNER JOIN usuarios
ON usuarios.id = actividades.id_usuario
WHERE actividades.id_proyecto ='.$id;
$consulta = $conexion->prepare($sql);
$consulta->execute();
$resultado = $consulta->fetchAll();
$actividades = $resultado;
?>