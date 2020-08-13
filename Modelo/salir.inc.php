<?php

session_start();

session_unset();

session_destroy();

header('Location:/SIGPRO/index.php'); //CAMBIAR SI ES EN EL SERVIDOR POR "/"



?>