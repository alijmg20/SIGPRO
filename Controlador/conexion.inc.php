<?php


//Tipo Variables
/*
    @$database = nombre de la base de datos    
*/ 
$database = 'bf4bgnb9lkplnxugz94i';


/*
    @$user = nombre del usuario proporcionado por el servidor Clever Cloud    
*/ 
$user = 'uunskjudzsrb7i5r';


/*
    @$password = Contraseña proporcionada por el servidor de Clever Cloud
*/ 
$password = '9joVxWk6YK23UzOjdeAk';

//---------------------------------------------------------------------------------------------------------------------------------

    /*
    Contenido: Bloque Try/Catch
    Tipo: Variable de conexion con la base de datos
    */
    try {
        $conexion = new PDO('mysql:host=bf4bgnb9lkplnxugz94i-mysql.services.clever-cloud.com;dbname='.$database,$user,$password);
    } catch (PDOException $ex) {
        echo 'ERROR : >>>>>>>   '.$ex->getMessage();
    }

    //Condicion para visualizar por consola si se pudo realizar la conexion con la base de datos exitosamente
    if($conexion){
        ?> 
        
         <script>
             console.log("Bdd conectada");
         </script>
     <?php   
     }
    




?>