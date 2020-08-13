<?php

include_once '../Controlador/conexion.inc.php';

$id= $_POST['idproyecto'];
$usuario = $_POST['id_usuario'];
if(isset($_POST['mensaje_chat'])){

    $mensaje = $_POST['mensaje_chat'];
    echo $mensaje;
    echo $id;
    echo $usuario;
    $sql = 'INSERT INTO chat (mensaje,id_usuario,id_proyecto) VALUES (:mensaje,:id_usuario,:id_proyecto)';
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
    $consulta->bindParam(':id_usuario', $usuario, PDO::PARAM_STR);
    $consulta->bindParam(':id_proyecto', $id, PDO::PARAM_STR);
    $consulta->execute();
}


$sql = "SELECT * FROM chat 
INNER JOIN usuarios 
ON chat.id_usuario = usuarios.id 
WHERE id_proyecto = :id
ORDER BY chat.id ASC";
$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id, PDO::PARAM_STR);
$consulta->execute();
$resultado = $consulta->fetchAll();
$mensajes_chat = $resultado;
?>

<?php
if (!empty($mensajes_chat)) {
    foreach ($mensajes_chat as $fila) :
        if ($fila['id_usuario'] !== $usuario) {
?>

            <div class="incoming_msg">
                <div class="received_msg">
                    <div class="received_withd_msg">
                        <div class="textchat">
                            <strong class="primary-font"><?php echo $fila['nombre_completo']  ?></strong>
                            <p><?php echo $fila['mensaje'] ?></p>
                        </div>
                        <span class="time_date"> <?php $fila['fecha_envio_mensaje'] ?></span>
                    </div>
                </div>
            </div>

        <?php
        } else {


        ?>
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p><?php echo $fila['mensaje'] ?></p>
                    <span class="time_date"> <?php echo $fila['fecha_envio_mensaje'] ?></span>


                </div>
            </div>
<?php
        }
    endforeach;
}
?>