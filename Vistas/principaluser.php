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
if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$id_usuario = $_GET['usuario'];
	$sql = "SELECT * FROM proyecto WHERE id=$id ";
	$result = $conexion->prepare($sql);
	$result->execute(array("NameProyect"));
	$name = $result->fetch(PDO::FETCH_ASSOC);
}



$mensaje = '';
$proyecto = 0;
include_once '../Modelo/mostrarContactos.inc.php';
include_once '../Modelo/crear_actividad.inc.php';
$mensaje = '';




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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/estilos.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<!--DatePicker-->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- <META HTTP-EQUIV="REFRESH" CONTENT="2"> -->

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

				<a href="#chatgeneral" data-toggle="modal" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/group.png" width="40" style="padding-right: 10px"> Chat</a>

				<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/alarm.png" width="40" style="padding-right: 10px"> Alertas</a>

				<a href="#clientmsj" data-toggle="modal" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/client.png" width="40" style="padding-right: 10px"> Cliente</a>

				<a href="#configuracion" class="list-group-item list-group-item-action bg-primary text-white" data-toggle="modal" style="padding-top: 20px; padding-bottom: 20px">
					<img src="img/iconos/conf.png" width="40" style="padding-right: 10px"> Configuracion</a>

				<a href="#continfo" data-toggle="collapse" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
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
					<!--1 Nombre proyecto -->
					<h5>
						<?php
						echo $name['nombre'];
						?>
					</h5>
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
									<a class="text-secondary" href="#chatgeneral" data-toggle="modal">
										<img src="img/iconos/groupblack.png" width="30" style="padding-right: 10px">Chat</a>
								</div>
							</div>

							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#">
									<img src="img/iconos/alarmblack.png" width="30" style="padding-right: 10px"> Alertas</a>
							</div>

							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#clientmsj" data-toggle="modal">
									<img src="img/iconos/clientblack.png" width="30" style="padding-right: 10px"> Cliente</a>
							</div>

							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#">
									<img src="img/iconos/confblack.png" width="30" style="padding-right: 10px"> Configuracion</a>
							</div>

							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="#continfo" data-toggle="collapse">
									<img src="img/iconos/infoblack.png" width="30" style="padding-right: 10px"> Informacion</a>
							</div>

							<div class="d-flex justify-content-center" style="padding-bottom: 10px">
								<a class="text-secondary" href="userwindow.php">
									<img src="img/iconos/backblack.png" width="30" style="padding-right: 10px"> Ir a proyectos</a>
							</div>

						</li>
					</ul>
				</div>
			</nav>
			<!-- /#page-content-wrapper -->

			<!--Main Content-->

			<!--.................................................INFORMACION......................................................-->
			<div class="contenerdorinfo collapse" id="continfo">

				<div class="d-flex justify-content-end" style="margin-right: 5px; margin-top: 5px;">
					<button type="button" class="close" data-toggle="collapse" data-dismiss="collapse" data-target="#continfo" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<h4 class="d-flex justify-content-center">Informacion</h4>

				<p class="etiquetainfo" style="margin-top: 20px">Fecha de inicio</p>
				<p class="infoetiqueta">2020/07/17</p>

				<p class="etiquetainfo">Fecha de entrega</p>
				<p class="infoetiqueta">2020/08/12</p>

				<p class="etiquetainfo">Tiempo restante</p>
				<p class="infoetiqueta">4 dias</p>

				<p class="etiquetainfo">Porcentaje completado</p>
				<p class="infoetiqueta">60%</p>

				<p class="etiquetainfo">Descripcion</p>
				<div class="infoetiqueta">
					<p class="text-break">Haciendo milagos aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaas</p>
				</div>
			</div>
			<!--...............................................FIN INFORMACION....................................................-->

			<div style="margin: 20px 20px 20px 20px;">
				<a href="#crearactividad" data-toggle="modal">Crear actividad</a>
			</div>

			<div style="margin: 20px 20px 20px 20px;">
				<div id="actividadnueva">
					<a data-toggle="modal" href="#crearitem" class="text-dark">
						Actividad 0 <span style="color: #252bff;"> (Nuevo) (Eres lider) </span>
					</a>
				</div>
			</div>


			<div style="margin: 20px 20px 20px 20px;">
				<a href="#crearactividad" data-toggle="modal">Crear actividad</a>
			</div>

			<!--2 Contenido de actividades  -->
			<table class="table table-bordered">
				<thead>
					<tr>

						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Lider</th>
						<th>Terminado </th>
						<th>Fecha de inicio</th>
						<th>Fecha de cierre</th>
					</tr>
				</thead>
				<tbody>

					<?php
					// tomo bbd actividades y las muestro
					// mostrar actividades
					$sql = "SELECT * FROM actividades WHERE id_proyecto=$id";
					$resultado = $conexion->prepare($sql);
					$resultado->execute(array("Actividades"));
					$consulta = $resultado->fetch(PDO::FETCH_ASSOC);
					$idlider = $consulta['id_usuario'];
					// Toma de lideres 
					// echo $idlider;
					$sqlider = "SELECT nombre_completo FROM usuarios WHERE id=$idlider";
					$lider_result = $conexion->prepare($sqlider);
					$lider_result->execute(array("Lideres"));
					$namelider = $lider_result->fetch(PDO::FETCH_ASSOC);

					while ($aux = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
						<tr>

							<td>
								<a data-toggle="modal" href="#crearitem" class="text-dark">
									<?php echo $aux['nombre']; ?>
								</a>
							</td>
							<td><?php echo $aux['descripcion']; ?></td>
							<td><?php echo $namelider['nombre_completo']; ?></td>
							<td><?php echo $aux['terminado']; ?></td>
							<td><?php echo $aux['fecha_inicio']; ?></td>
							<td><?php echo $aux['fecha_final']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>





			<!--Main content END-->
		</div>
	</div>

	<!-- /#wrapper -->

	<!--.................................................MODAL DE CREAR ACTIVIDAD......................................................-->
	<form method="POST">
		<div class="modal fade" id="crearactividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">

				<div class="modal-content">

					<div class="modal-header bg-primary">
						<div class="col-1"></div>
						<div class="col-10 modal-title text-center">
							<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Crear actividad</h5>
						</div>
						<div class="col-1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<div class="modal-body">


						<div class="form-group row">
							<label for="nombreactividad" class="col-sm-6 col-form-label">Nombre de la actividad:</label>
							<div class="col-sm-6">
								<input type="text" name="nombreactividad" class="form-control border border-primary" id="nombreactividad">
							</div>
						</div>

						<div class="form-group row">
							<label for="poncentajeactividad" class="col-sm-6 col-form-label">Porcentaje de actividad:</label>
							<div class="col-sm-6">
								<input type="text" name="poncentajeactividad" class="form-control border border-primary" id="poncentajeactividad">
							</div>
						</div>

						<div class="form-group row">
							<label for="fechafin" class="col-sm-6 col-form-label">Fecha de entrega:</label>
							<div class="input-group date js-datepicker col-sm-6">
								<input type="text" name="fechafin" class="form-control"><span class="input-group-addon" id="fechafin"><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>

						<div class="form-group row">
							<label for="descripcion" class="col-sm-6 col-form-label">Descripcion:</label>
							<div class="col-md-6">
								<textarea class="form-control border border-primary" name="descripcion" id="descripcion" rows="3"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="lideractividad" class="d-flex justify-content-center">Lider de la actividad:</label>
							<select multiple class="form-control" name="lider_actividad[]" id="lideractividad" name="lideractividad">
								<?php
								if (!empty($contactoVistaUsuario)) {
									foreach ($contactoVistaUsuario as $fila) :
								?>
										<option value="<?php echo $fila['id'] ?>"> <?php echo $fila['nombre_completo'] ?> </option>
									<?php endforeach;
								}
								if (!empty($ContactoVistaContacto)) {
									foreach ($ContactoVistaContacto as $fila) :
									?>
										<option value="<?php echo $fila['id'] ?>"> <?php echo $fila['nombre_completo'] ?> </option>
								<?php endforeach;
								} ?>
							</select>
						</div>



					</div>

					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" name="guardar" class="btn btn-primary" data-target="#">Aceptar</button>
					</div>

				</div>
			</div>
		</div>
	</form>
	<!--...............................................FIN MODAL DE CREAR ACTIVIDAD....................................................-->


	<!--.........................................................MODAL CREAR ITEM................................................................-->
	<div class="modal" id="crearitem" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<div class="col-1"></div>
					<div class="col-10 modal-title text-center">
						<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Crear Item</h5>
					</div>
					<div class="col-1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>


				<form action="../Modelo/agregar_actividades_item.php" method="POST">
					<div class="modal-body">
						<div class="form-row">
							<!-- ================================================== -->
							<div class="form-group col-md-4">
								<label for="nombreaitem">Nombre del item:</label>
								<input type="text" name="nombreaitem" class="form-control border border-primary" id="nombreaitem" placeholder="Nombre">
							</div>





							<!-- mando la url a agregar_actividades_item.php para poder regresarme -->
							<!-- <?echo $url = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
																echo $url;
								?>
							<input type="hidden" name="url" value="<?php echo $url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>" /> -->







							<div class="form-group col-md-4">
								<label for="encargado">Encargado:</label>
								<select class="form-control border border-primary " name="encargado" id="encargado">
									<option selected>...</option>
									<option>Ali Mata</option>
									<option>Miguel Angel Lugo</option>
									<option>Angelymar Poyo</option>
								</select>
							</div>
							<!-- ================================================== -->
							<div class="form-group col-md-4">
								<label for="fechaentrega">Fecha de entrega:</label>
								<input type="text" name="fechaEntrega" class="form-control date js-datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>
						<!-- Mas items================================================== -->
						<a href="#masitems" data-dismiss="modal" data-toggle="modal">
							<div class="col-12 d-flex justify-content-center rounded-lg" style="background-color: #838383">
								<img src="img/iconos/plus.png" width="30">
							</div>
						</a>
						<div class="modal-footer d-flex justify-content-center">
							<button type="submit" name="add_item" class="btn btn-primary" data-toggle="modal">Aceptar</button>
							<!-- <button type="submit" name="add_item" class="btn btn-primary" data-dismiss="modal" data-target="principaluser.php" data-toggle="modal">Aceptar</button> -->
						</div>
					</div>
				</form>


			</div>
		</div>
	</div>
	<!--.......................................................FIN MODAL CREAR ITEM..............................................................-->




	<!--.....................................................MENU PRINCIPAL............................................................-->
	<!--.....................................................CHAT............................................................-->
	<form method="POST" onsubmit="return enviarChat();" >
		<div class="modal" id="chatgeneral" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<div class="col-1"></div>
						<div class="col-10 modal-title text-center">
							<h5 class="modal-title text-white font-weight-bold" id="myLargeModalLabel">Chat</h5>
						</div>
						<div class="col-1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="messaging">
								<div class="inbox_msg">
									<div class="mesgs">
										<div class="msg_history"  >
 												<div id="respa"></div>
											<div class="type_msg">
												<div class="input_msg_write">
													<input type="text" id="mensaje_chat" name="mensaje_chat" class="write_msg" placeholder="Escribir mensaje" />
													<button class="msg_send_btn" type="submit">
														<img src="img/iconos/sendsuccess.png" id="enviarchat">
													</button>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer d-flex justify-content-center">
							<button data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#principaluser.php">Aceptar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--...................................................FIN CHAT..........................................................-->


	<!--.....................................................ALERTA............................................................-->
	<!--...................................................FIN ALERTA..........................................................-->


	<!--.....................................................CLIENTE............................................................-->
	<div class="modal" id="clientmsj" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<div class="col-1"></div>
					<div class="col-10 modal-title text-center">
						<h5 class="modal-title text-white font-weight-bold" id="myLargeModalLabel">Mensajeria al cliente</h5>
					</div>
					<div class="col-1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="modal-body">
					<form method="POST">
						<div class="form-group">
							<label for="msjalcliente">Escribir mensaje</label>
							<textarea class="form-control" id="msjalcliente" name="msjalcliente" rows="3"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button data-dismiss="modal" type="button" class="btn btn-primary" disabled="">Enviar</button>
				</div>
			</div>
		</div>
	</div>
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
										<input type="text" name="comentario" class="form-control" placeholder="Comentario">
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
									<a class="nav-link btn-lg btn-block" href="#">
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
	<!--...................................................FIN MENU PRINCIPAL..........................................................-->


	<!--mensaje de que funciona la variable usuario PARA DEBUGIN-->

	<!--<h1>Welcome <?php echo $usuario['nombre_completo'] ?></h1>-->
	<?php 
	
	?>

	<script>
		//Funcion para evitar recargar la pagina

		function enviarChat() {
			var mensaje_chat = document.getElementById("mensaje_chat").value;
			

			var datosEnviados ='mensaje_chat=' + mensaje_chat+'&idproyecto='+<?php echo $id ?>+'&id_usuario='+<?php echo $id_usuario ?> ;

			$.ajax({
				type: 'POST',
				url: '../Modelo/mostrarMensajesChat.inc.php',
				data: datosEnviados,
				success: function(resp) {
					$("#respa").html(resp)
				}
			});
			return false;

		}
		
	</script>


	<?php  ?>



	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/datepick.js"></script>
</body>

</html>