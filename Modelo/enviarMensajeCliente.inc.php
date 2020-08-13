<?php
    include_once '../Controlador/conexion.inc.php';

    if(isset($_POST['boton_enviar_mensaje_cliente']) && isset($_POST['asuntomsj']) && isset($_POST['msjalcliente']) ){
        $asunto = $_POST['asuntomsj'];
        $mensaje = $_POST['msjalcliente'];

        $sql = 'SELECT * FROM proyecto 
        INNER JOIN cliente 
        ON cliente.id=proyecto.id_cliente WHERE proyecto.id ='.$id;
        $consulta = $conexion->prepare($sql);
         $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
        $correo_cliente = $resultados['email'];
        $header = "From: sigpro@mail.com "."\r\n";
        $header .="Reply-To: sigpro@mail.com "."\r\n";
        $header .="X-Mailer: PHP/".phpversion();
        $mail = mail($correo_cliente,$asunto,$mensaje,$header);
        if($mail){
            echo "Enviadoooo";
        }
    }


?>