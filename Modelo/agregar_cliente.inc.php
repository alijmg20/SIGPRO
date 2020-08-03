<?php

/**
 * Tipo: Funcion para guardar clientes 
 * Parametros: 
 *  $nombre_cliente  $correo_cliente 
 * 
 */
//Inclusion 
include_once '../Controlador/conexion.inc.php';


//-------------------------------------------------------------------------------------------------
if (isset($_POST['registrar'])) {

    $nombre_cliente = $_POST['nombre_cliente'];
    $correo_cliente  = $_POST['correo_cliente'];

    if (!empty($_POST['nombre_cliente']) && !empty($_POST['nombre_cliente'])) {

        if (cliente_Repetidos($correo_cliente, $conexion) == 1) { //FUNCION PARA VER SI EXISTE EL CLIENTE REGISTRADO

            $mensaje = 'before_cliente';

        } else {
            //SE INSERTA DENTRO DE LA BASE DE DATOS EL CLIENTE
            $sql = 'INSERT INTO cliente(nombre_completo,email) VALUES (:nombre_completo,:email)';
            $consulta = $conexion->prepare($sql);
            //SI TODO SALIO BIEN SE GUARDA Y SE EJECUTA
            if ($consulta->execute(array(':nombre_completo' => $nombre_cliente, ':email' => $correo_cliente))) {
                $mensaje = 'successfull';
            }
        }
        // SE CONSULTA EN LA TABLA CLIENTE PARA OBTENER EL ID DEL CLIENTE QUE EL USUARIO INGRESO
        $sql = "SELECT * FROM cliente WHERE email = :email";

        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':email', $correo_cliente, PDO::PARAM_STR);
        $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = $resultados['id'];  // guardar id del cliente en variable 


    } else if (!empty($correo_cliente)) {

        // SE CONSULTA EN LA TABLA CLIENTE PARA OBTENER EL ID DEL CLIENTE QUE EL USUARIO INGRESO
        $sql = "SELECT * FROM cliente WHERE email = :email";

        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':email', $correo_cliente, PDO::PARAM_STR);
        $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);
        $cliente = $resultados['id'];      // guardar id del cliente en variable 
        $mensaje = 'cliente_encontrado';


    }




}

//-------------------------------------------------------------------------------------------

// verificar si existe un correo del cliente ya registrado 
function cliente_Repetidos($correo_cliente, $conexion)
{
    $sql = "SELECT COUNT(*) FROM cliente WHERE email = :email";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':email', $correo_cliente, PDO::PARAM_STR);
    $consulta->execute();
    $aux = $consulta->fetchColumn();
    if ($n = ($aux > 0)) {
        return $n;
    } else {
        return 0;
    }
}
