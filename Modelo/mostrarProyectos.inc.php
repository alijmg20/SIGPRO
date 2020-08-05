<?php



include_once '../Controlador/conexion.inc.php';


$sql = 'SELECT * FROM relacion_usuario_proyecto INNER JOIN proyecto ON relacion_usuario_proyecto.id_proyecto = proyecto.id 
WHERE relacion_usuario_proyecto.id_usuario ='.$usuario['id'];

$consulta = $conexion->prepare($sql);
$consulta->execute();
$resultado = $consulta->fetchAll();
$datos_todos_los_proyectos = $resultado; //Esta variable guarda los datos de todos los proyectos donde participa el usuario todos los datos


?>