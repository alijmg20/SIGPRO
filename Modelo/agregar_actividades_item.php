<?php
include_once '../Controlador/conexion.inc.php';

if (isset($_POST['add_item'])) {

    $nombreDeItem = $_POST['nombreaitem'];
    // $encargadoItem = $_POST['encargado'];
    $encargadoItem = 73;
    $fecha_EntregaItem = $_POST['fechaEntrega'];
    $idActividades=2;

    // $sql="INSERT INTO items (nombre,id_usuario,fecha_final,id_actividades) VALUES (?,?,?,?) ";
    // $resultado=$conexion->prepare($sql);
    // $resultado->execute([$nombreDeItem,$encargadoItem,$fecha_EntregaItem,$idActividades]);
   
    try {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO items (nombre, id_usuario, Fecha_final,id_actividades)
    VALUES ('$nombreDeItem', '$encargadoItem', '$fecha_EntregaItem',$idActividades)";
    // use exec() because no results are returned
    $conexion->exec($sql);
    echo "Se ah guardado dato satisfactoriamente ";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
        
    }
else {
    echo "ERROR ";
}