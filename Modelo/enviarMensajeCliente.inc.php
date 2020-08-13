<?php
    include_once '../Controlador/conexion.inc.php';

    if(isset($boton_enviar_mensaje_cliente)){
        $asunto = $_POST['asuntomsj'];
        $mensaje = $_POST['msjalcliente'];

        $sql = 'SELECT * FROM proyecto 
        INNER JOIN cliente 
        ON cliente.id=proyecto.id_cliente WHERE proyecto.id ='.$id;
        $consulta = $conexion->prepare($sql);
        $resultado = $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
        $correo_cliente = $resultado['correo'];
        $header = "From: sigproIngenieria@gmail.com". "\r\n";
        $header.="Reply-To: sigproIngenieria@gmail.com"."\r\n";
        $header.="X-Mailer: PHP/".phpversion();
        $mail = @mail($correo_cliente,$asunto,$mensaje,$header);
        if($mail){
            echo "CORREO ENVIADOOOOO";
        }
    }


?>