<?php

session_start();

include_once '../Controlador/conexion.inc.php';

	if(isset($_SESSION['id_usuario'])){
		$consulta = $conexion ->prepare('SELECT * FROM usuarios WHERE id =:id');
		$consulta->bindParam(':id',$_SESSION['id_usuario']);
		$consulta->execute();
		$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

		$usuario = $resultado;
	}


?>

<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<title>SIGPRO</title> <!--Titulo de pestanha-->
		<link rel="shortcut icon" type="image/x-icon" href="logo/icono.png" />
		<meta name="description" content="Gestion de proyectos">
		<meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
		<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
		<link rel="stylesheet" href="css/bootstrap.css">

		<link href="css/simple-sidebar.css" rel="stylesheet">

	</head>

	<body>

	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-primary border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<a class="navbar-brand" href="intex.html">
		    		<img src="logo/logo.png" width="180" height="60" class="d-inline-block align-top" alt="" loading="lazy">
		  		</a> 
		  	</div>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px"> 
					<img src="img/iconos/group.png" width="40" style="padding-right: 10px;"> Equipo</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/alarm.png" width="40" style="padding-right: 10px"> Alertas</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/client.png" width="40" style="padding-right: 10px"> Cliente</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/conf.png" width="40" style="padding-right: 10px"> Configuracion</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/info.png" width="40" style="padding-right: 10px"> Informacion</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/back.png" width="40" style="padding-right: 10px"> Ir a proyectos</a>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom sticky-top">

				<div class="d-sm-block d-md-none">
					<img src="logo/minilogo.png" width="50" class="d-inline-block align-top">
				</div>

				<div style="padding-top: 10px">
					<h5> Nombre del proyecto</h5>
				</div>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<hr class="bg-dark">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						
				    	<li class="nav-item dropdown">
				      		<a class="nav-link dropdown-toggle d-flex justify-content-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="img/iconos/user.png" width="30"> </a>

				      		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				        		<a class="dropdown-item" href="#"> <img src="img/iconos/confblack.png" width="30" style="padding-right: 10px;"> Configuracion de perfil</a>
				        		<a class="dropdown-item" href="#"> <img src="img/iconos/mail.png" width="30" style="padding-right: 10px;"> Invitaciones</a>
				        		<div class="dropdown-divider"></div>
				        		<a class="dropdown-item" href="../Modelo/salir.inc.php"> <img src="img/iconos/logout.png" width="30" style="padding-right: 10px;"> Cerrar sesion</a>
				      		</div>
				    	</li>
				    	<li class="nav flex-column  d-sm-block d-md-none">
				    		<div style="padding-top: 5px">
					    		<div class="d-flex justify-content-center" style="padding-bottom: 10px">
									<a class="text-secondary" href="#">
										<img src="img/iconos/groupblack.png" width="30" style="padding-right: 10px;"> Equipo</a>
								</div>
							</div>
							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#">
									<img src="img/iconos/alarmblack.png" width="30" style="padding-right: 10px"> Alertas</a>
							</div>
							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#"> 
									<img src="img/iconos/clientblack.png" width="30" style="padding-right: 10px"> Cliente</a>
							</div>
							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#">
									<img src="img/iconos/confblack.png" width="30" style="padding-right: 10px"> Configuracion</a>
							</div>
							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#"> 
									<img src="img/iconos/infoblack.png" width="30" style="padding-right: 10px"> Informacion</a>
							</div>
							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#"> 
									<img src="img/iconos/backblack.png" width="30" style="padding-right: 10px"> Ir a proyectos</a>
							</div>
						</li>
				  	</ul>
				</div>
			</nav>
		<!-- /#page-content-wrapper -->

		<!--mensaje de que funciona la variable usuario-->

		<h1>Welcome <?php echo $usuario['nombre_completo'] ?></h1>

	</div>
	<!-- /#wrapper -->


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
