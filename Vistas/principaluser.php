<?php

/*
IMPORTANTE PARA BACKEND LA SESION SIEMPRE SE DEBE INICIAR EN TODAS LAS VENTANAS 
QUE SE REALICEN PQ SINO NO ENCUENTRAS LOS DATOS DEL USUARIO

*/

//CON ESTO SE INICIA UNA SESION EN CADA VENTANA
session_start();

include_once '../Controlador/conexion.inc.php';

//CON ESTE IF SE CONSIGUE TODA LA INFORMACION DEL CLIENTE EN LA BASE DE DATOS
if (isset($_SESSION['id_usuario'])) {
	$consulta = $conexion->prepare('SELECT * FROM usuarios WHERE id =:id');
	$consulta->bindParam(':id', $_SESSION['id_usuario']);
	$consulta->execute();
	$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

	$usuario = $resultado;
}


?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title>SIGPRO</title>
	<!--Titulo de pestanha-->
	<link rel="shortcut icon" type="image/x-icon" href="logo/icono.png" />
	<meta name="description" content="Gestion de proyectos">
	<meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<!--DatePicker-->	
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">

</head>

<body>

	<!--Wrapper-->
	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-primary border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<img src="logo/logo.png" width="180" height="60" class="d-inline-block align-top" alt="" loading="lazy">
			</div>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/group.png" width="40" style="padding-right: 10px;"> Equipo</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/alarm.png" width="40" style="padding-right: 10px"> Alertas</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/client.png" width="40" style="padding-right: 10px"> Cliente</a>
				<a href="#configuracion" class="list-group-item list-group-item-action bg-primary text-white" data-toggle="modal" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/conf.png" width="40" style="padding-right: 10px"> Configuracion</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/info.png" width="40" style="padding-right: 10px"> Informacion</a>
				<a href="userwindow.php" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
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

			<!--Main Content-->	
			<!--Main content END-->
		</div>
	</div>
	<!-- /#wrapper -->


<!--.....................................................EQUIPO............................................................-->
<!--...................................................FIN EQUIPO..........................................................-->


<!--.....................................................ALERTA............................................................-->
<!--...................................................FIN ALERTA..........................................................-->


<!--.....................................................CLIENTE............................................................-->
<!--...................................................FIN CLIENTE..........................................................-->


<!--.....................................................CONFIGURACION............................................................-->
		<form method="POST" action="">
			<div class="modal fade" tabindex="-1" role="dialog" id="configuracion" aria-hidden="true">
				<div class="modal-dialog modal-md">
					<div class="modal-content modal-content card mb-3">
						<div class="card-header bg-primary">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title text-center text-white">Configuracion</h5>
						</div>

						<div class="modal-body">
							<form>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<h6 class="pt-2">Nombre del proyecto:</h6>
										</div>
										<div class="col-6">
											<input type="text" name="nombre_proyecto" class="form-control" placeholder="Proyecto">
										</div>
									</div>									
								</div>
								<!--DATEPICKER-->
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<h6 class="pt-2">Fecha de fin:</h6>
										</div>
										<div class="col-6 input-group date js-datepicker">
											<input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
										</div>
									</div>									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<h6 class="pt-2">Participantes:</h6>
										</div>
										<div class="col-6">
											<button type="button" class="btn btn-primary btn-lg btn-block" name="añadir_participante" data-toggle="modal" data-target="#añadir_participante">Añadir participantes</button>
										</div>
									</div>									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<h6 class="pt-2">Comentario:</h6>
										</div>
										<div class="col-6">
											<input type="text" name="comentario" class="form-control"  placeholder="Comentario">
										</div>
									</div>									
								</div>
							</form>
						</div>

						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-primary px-5" data-dismiss="modal">Aceptar</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--AÑADIR PARTICIPANTE-->
		<form method="POST" action="">
			<div class="modal fade" tabindex="-1" role="dialog" id="añadir_participante" aria-hidden="true">
				<div class="modal-dialog modal-md">
					<div class="modal-content modal-content card mb-3">
						<div class="card-header bg-primary">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title text-center text-white">Añadir participante</h5>
						</div>
						
						<div class="modal-body">
							<form>
								<!--AGREGAR CONTACTOS-->
								<ul class="nav nav-pills" style="height: 250px; overflow-y: scroll;">
								  	<li class="nav-item">
								    	<a class="nav-link btn-lg btn-block" href="#" >
								    		<div class="d-flex flex-row">
								    			<div class="p-2 bd-highlight col-10 " id="truncar-texto">
								    				<button type="button" class="btn btn-primary btn-circle btn-sm"><img src="img/iconos/user.png" width="18"></button> Contacto 1aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa 
								    			</div>
								    			<div class="p-2 bd-highlight justify-content-end col-2">
								    				<button type="button" class="btn btn-primary btn-circle btn-sm"><img src="img/iconos/40.png" width="18"></i></button>
								    			</div>
								    		</div>
								    		
								    	</a>
								    	
								  	</li>
								</ul>

								<div class="form-group">
									<div class="row pt-3">
										<div class="col-10">
											<input class="form-control" placeholder="Introducir correo electronico">
										</div>
										<div class="col-2">
											<button type="button" class="btn btn-primary btn-circle"><img src="img/iconos/40.png" width="32"></i></button>	
										</div>
									</div>									
								</div>
							</form>
						</div>

						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-primary px-5" data-dismiss="modal">Aceptar</button>
						</div>
					</div>
				</div>
			</div>
		</form>	
		<!--FIN AÑADIR PARTICIPANTE-->
<!--...................................................FIN CONFIRGURACION..........................................................-->


<!--.....................................................INFORMACION............................................................-->
<!--...................................................FIN INFORMACION..........................................................-->


<!--.....................................................IR A PROYECTOS............................................................-->
<!--...................................................FIN IR A PROYECTOS..........................................................-->


			<!--mensaje de que funciona la variable usuario PARA DEBUGIN-->

			<!--<h1>Welcome <?php echo $usuario['nombre_completo'] ?></h1>-->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/datepick.js"></script>
</body>

</html>
