<?php

include_once "../Controlador/conexion.inc.php";

if(isset($_POST['btn_buscar'])){
    $buscar_texto = $_POST['buscar'];
    $buscar = $conexion->prepare( 'SELECT * FROM proyecto WHERE nombre LIKE :campo AND id_usuario =:id_usuario ; ' );
    $buscar -> execute(array(
        ':id_usuario'=>$usuario['id'],
        ':campo' => "%".$buscar_texto."%"
    ));
    
    $resultado = $buscar->fetchAll();
    $datos_todos_los_proyectos = $resultado;
    
}