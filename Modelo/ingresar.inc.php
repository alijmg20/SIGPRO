<?php

//Inclusion del controlador
session_start();
include_once 'Controlador/conexion.inc.php';

if (isset($_POST['iniciarSesion'])) {
    $correo_electronico = $_POST['correo_electronico'];
    $password = $_POST['password'];

    if (!empty($correo_electronico) && !empty($password)) {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE correo = :correo";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':correo', $correo_electronico, PDO::PARAM_STR);
        $consulta->execute();
        $contador = $consulta->fetchColumn();
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";
        $consulta_datos = $conexion->prepare($sql);
        $consulta_datos->bindParam(':correo', $correo_electronico, PDO::PARAM_STR);
        $consulta_datos->execute();
        $resultados = $consulta_datos->fetch(PDO::FETCH_ASSOC);
        if ($contador > 0 && password_verify($password, $resultados['clave'])) {
            $_SESSION['id_usuario'] = $resultados['id'];
            header('Location: Vistas/userwindow.php');
        } else {
            $mensaje = 'wrong_user';
        }
    }
}
