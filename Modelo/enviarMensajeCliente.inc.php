<?php
    include_once '../Controlador/conexion.inc.php';

    if(isset($_POST['boton_enviar_mensaje_cliente'])){
        $asunto = $_POST['asuntomsj'];
        $mensaje_correo = $_POST['msjalcliente'];

        $sql = 'SELECT * FROM proyecto 
        INNER JOIN cliente 
        ON cliente.id=proyecto.id_cliente WHERE proyecto.id ='.$id;
        $consulta = $conexion->prepare($sql);
        $resultados = $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
        $correo_cliente_enviar = $resultados['email'];
        $header = "From: sigproIngenieria@gmail.com". "\r\n";
        $header.="Reply-To: sigproIngenieria@gmail.com"."\r\n";
        $header.="X-Mailer: PHP/".phpversion();
        $mail = @mail($correo_cliente_enviar,$asunto,$mensaje_correo,$header);
        if($mail){
            echo "enviadooooooooooo";
        }
    }


?>