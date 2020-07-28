<?php

session_start();

session_unset();

session_destroy();

header('Location:/'); //CAMBIAR SI ES EN EL SERVIDOR POR "/"



?>