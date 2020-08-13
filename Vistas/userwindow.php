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

include_once '../Modelo/agregar_contacto.inc.php';


$mensaje = '';
$cliente = '';
$proyecto = 0;



include_once '../Modelo/agregar_cliente.inc.php';

include_once '../Modelo/crear_proyecto.inc.php';

include_once '../Modelo/agregar_participante.inc.php';

include_once '../Modelo/mostrarContactos.inc.php';
include_once '../Modelo/mostrarProyectos.inc.php';


$mensaje = '';
$cliente = '';
$proyecto = 0;




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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">

</head>

<body>

	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-primary border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<img src="logo/logo.png" width="180" height="60" class="d-inline-block align-top" alt="" loading="lazy">
			</div>
			<div class="list-group list-group-flush">

				<a href="#agregarcontacto" data-toggle="modal" class="list-group-item list-group-item-action bg-primary text-white font-weight-bolder text-center" style="padding-top: 20px; padding-bottom: 20px"> Contactos <img src="img/iconos/adduser.png" width="35" style="padding-left: 10px;">
				</a>
				<?php

				//CONSULTAR EN mostrarContactos.inc.php
				// Aqui se muestran todos los contactos en la barra lateral izquierda desde la vista del id_usuario
				if (!empty($contactoVistaUsuario)) {

					foreach ($contactoVistaUsuario as $fila) :
				?>
						<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
							<img src="img/iconos/userwhite.png" width="40" style="padding-right: 10px"><?php echo $fila['nombre_completo'] ?></a>
					<?php endforeach;
				}
				//CONSULTAR EN mostrarContactos.inc.php
				// Aqui se muestran todos los contactos en la barra lateral izquierda desde la vista del id_contacto

				if (!empty($ContactoVistaContacto)) {

					foreach ($ContactoVistaContacto as $fila) :
					?>
						<a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="padding-top: 20px; padding-bottom: 20px">
							<img src="img/iconos/userwhite.png" width="40" style="padding-right: 10px"><?php echo $fila['nombre_completo'] ?></a>
				<?php endforeach;
				} ?>

			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom sticky-top">

				<div class="d-sm-block d-md-none">
					<img src="logo/minilogo.png" width="50" class="d-inline-block align-top">
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


						<!--Solo para dispositivos pequeños-->
						<li class="nav flex-column  d-sm-block d-md-none">
							<div style="padding-top: 5px">
								<div class="d-flex justify-content-center" style="padding-bottom: 10px">
									<a class="text-secondary" href="#">
										<img src="img/iconos/groupblack.png" width="30" style="padding-right: 10px;"> Equipo</a>
								</div>
							</div>
						</li>
						<!--Fin-->
					</ul>
				</div>
			</nav>

			<div id="page-content-wrapper" class="bg-light d-flex justify-content-center">
				<div class="barrabusqueda">
					<form>
						<div class="form-row d-flex justify-content-center">
							<div class="col-11">
								<input class="form-control form-control-sm" type="text" placeholder="Buscar proyecto">
							</div>
							<div class="col-1">
								<a href="#">
									<img src="img/iconos/lupa.png" class="rounded" style="margin-left: -10px;">
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- /#page-content-wrapper -->



			<?php
			//PRUEBA DE QUE FUNCIONA LA FUNCION DE AGREGAR CLIENTE;
			//echo $proyecto; 
			//echo $id_contacto;
			?>


			<!--Main content-->

			<!--Nuevo Proyecto-->
			<div class="cajanueva">
				<a class="text-white" href="#nuevoproyecto" data-toggle="modal"><img src="img/userwindow/nuevopropro.png">
					<p class="d-flex justify-content-center" style="margin: 3px">
						Nuevo proyecto
					</p>
				</a>
			</div>
			<!--Fin de Nuevo Proyecto-->


			<!--Ejemplo de Nuevo Proyecto-->
			<?php
			if (!empty($datos_todos_los_proyectos)) {
				foreach ($datos_todos_los_proyectos as $fila) :
					$Rand = str_pad(dechex(Rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT); //generador de numeros aleatorios para los colores
			?>

					<div class="cajanueva">
						<a class="text-white" href="principaluser.php?id=<?php echo $fila['id']?>&usuario=<?php echo $usuario['id'] ?>">
							<div style="padding-bottom: 150px; background: #<?php echo $Rand ?>"></div>
							<p class="d-flex justify-content-center" style="margin: 3px">
								<?php echo $fila['nombre'] ?>
							</p>
						</a>
					</div>
			<?php endforeach;
			} ?>

			<!--Fin de Ejemplo de Nuevo Proyecto-->

			<!-- Main Col END -->

		</div>
	</div>
	<!-- /#wrapper -->

	<!-- Modal crear proyecto -->

	<!--INICIO DEL FORMULARIO PRINCIPAL-->
	<form method="POST">
		<div id="inicio"></div>
		<div class="modal fade" id="nuevoproyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<div class="col-1"></div>
						<div class="col-10 modal-title text-center">
							<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Crear Proyecto</h5>
						</div>
						<div class="col-1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<!--Cuerpo del modal-->
					<div class="modal-body">

						<!--Nombre del proyecto-->
						<div class="form-group row">
							<label for="nombreproyecto" class="col-sm-6 col-form-label">Nombre del proyecto</label>
							<div class="col-sm-6">
								<input type="text" class="form-control border border-primary" name="nombre_proyecto" id="nombreproyecto">
							</div>
						</div>
						<!--Fin de nombre del proyecto-->

						<!--Fecha de fin-->
						<div class="form-group row">
							<label for="inputState" class="col-sm-6 col-form-label">Fecha de entrega</label>
							<div class="col-sm-6">
								<!--<select id="inputState" class="form-control border border-primary">
										<option selected>AAAA/MM/DD</option>
										<option>-->
								<div class="input-group date js-datepicker border border-primary">
									<input type="text" class="form-control" name="fecha_final"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div>
								<!--</option>
									</select>-->
							</div>
						</div>
						<!--Fin de fecha de fin-->

						<!--Cliente-->
						<div class="form-group row">
							<label for="botoncliente" class="col-6 col-form-label">Cliente</label>
							<div class="col-6 d-flex flex-row-reverse">
								<button data-dismiss="modal" type="button" class="btn btn-outline-primary" id="botoncliente" data-toggle="modal" data-target="#agregarcliente">Añadir</button>
							</div>
						</div>
						<!--Fin de cliente-->

						<!--Participantes-->
						<div class="form-group row">
							<label for="botonparticipantes" class="col-6 col-form-label">Participantes</label>
							<div class=" col-6 d-flex flex-row-reverse">
								<button data-dismiss="modal" type="button" class="btn btn-outline-primary" id="botonparticipantes" data-toggle="modal" data-target="#agregarpart">Añadir</button>
							</div>
						</div>
						<!--Fin de participantes-->

						<!--Descripcion-->
						<div class="form-group row">
							<label for="descripcion" class="col-sm-6 col-form-label">Descripcion</label>
							<div class="col-md-6">
								<textarea class="form-control border border-primary" name="descripcion_proyecto" id="Descripcion" rows="3"></textarea>
							</div>
						</div>
						<!--Fin de descripcion-->


					</div>
					<!--Fin del cuerpo del modal-->

					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" name="registrar" class="btn btn-primary">Aceptar</button>
					</div>
				</div>
			</div>
		</div>


		<!--Agregar Cliente-->
		<div class="modal fade" id="agregarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<div class="col-1"></div>
						<div class="col-10 modal-title text-center">
							<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Agregar Cliente</h5>
						</div>
						<div class="col-1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<!--Cuerpo del modal-->

					<div class="modal-body">

						<!--Formulario y boton de envio-->
						<div class="form-group">
							<label for="exampleInputname">Nombre del cliente</label>
							<div class="form-group row">
								<div class="col-1"></div>
								<input for="enviar" type="text" class="col-9 border border-primary" name="nombre_cliente" id="nombre_cliente">
							</div>
							<label for="exampleInputEmail1">Correo del cliente</label>
							<div class="form-group row d-flex justify-content-center">
								<div class="col-1"></div>
								<input for="enviar" type="email" class="col-8 border border-primary" name="correo_cliente" id="correo_cliente" aria-describedby="emailHelp">
								<div class="col-2 d-flex justify-content-start">
									<a href="#"><img src="img/iconos/40.png" id="enviar"></a>
								</div>
							</div>
						</div>
						<!--Fin de Formulario y boton de envio-->


					</div>
					<!--Fin del cuerpo del modal-->

					<div class="modal-footer d-flex justify-content-center">
						<button data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoproyecto">Aceptar</button>
					</div>
				</div>
			</div>
		</div>


		<!--Fin de Agregar Cliente-->

		<!--Agregar participantes-->
		<div class="modal fade" id="agregarpart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<div class="col-1"></div>
						<div class="col-10 modal-title text-center">
							<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Agregar Participantes</h5>
						</div>
						<div class="col-1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<!--Cuerpo del modal-->

					<div class="modal-body">

						<!--Lista de participantes-->
						<div class="form-group">
							<label for="exampleFormControlSelect2" class="d-flex justify-content-center">Contactos</label>

							<!--MISMO CONCEPTO QUE EN LA LINEA 70 Y 71 PARA MOSTRAR LOS CONTACTOS-->

							<select name="controlParticipantes[]" multiple class="form-control" id="exampleFormControlSelect2">

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

							<!--MISMO CONCEPTO QUE EN LA LINEA 70 Y 71 PARA MOSTRAR LOS CONTACTOS-->

						</div>
						<!--Fin de Lista de participantes-->

						<!--Formulario y boton de envio-->
						<div class="form-group">
							<label for="exampleInputEmail1">Usuario no agregado</label>
							<div class="form-group row d-flex justify-content-center">
								<div class="col-1"></div>
								<input for="enviar" type="email" class="col-9 border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introducir Correo">
								<div class="col-2 d-flex justify-content-start">
									<a href="#"><img src="img/iconos/40.png" id="enviar"></a>
								</div>
							</div>
						</div>
						<!--Fin de Formulario y boton de envio-->
					</div>
					<!--Fin del cuerpo del modal-->

					<div class="modal-footer d-flex justify-content-center">
						<button data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoproyecto">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		<!--Fin de Agregar Participantes-->
	</form>
	<!--FINAL DEL FORMULARIO PRICIPAL-->

	<form action="" method="POST">
		<!--Agregar Contacto-->
		<div class="modal fade" id="agregarcontacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<div class="col-1"></div>
						<div class="col-10 modal-title text-center">
							<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Agregar Contacto</h5>
						</div>
						<div class="col-1">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<!--Cuerpo del modal-->

					<div class="modal-body">

						<!--Formulario y boton de envio-->
						<div class="form-group">
							<label for="exampleInputEmail1">Correo del contacto</label>
							<div class="form-group row d-flex justify-content-center">
								<div class="col-1"></div>
								<input for="enviar" type="email" class="col-8 border border-primary" name="correo_contacto" aria-describedby="emailHelp">
								<div class="col-2 d-flex justify-content-start">
									<a href="#"><img src="img/iconos/40.png" id="enviar"></a>
								</div>
							</div>
						</div>
						<!--Fin de Formulario y boton de envio-->


					</div>
					<!--Fin del cuerpo del modal-->

					<div class="modal-footer d-flex justify-content-center">
						<button  type="submit" name="boton_agregar_contacto" class="btn btn-primary" >Aceptar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--Fin de Agregar Contacto-->




	<!-- Modal confirmar -->
	<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<div class="col-1"></div>
					<div class="col-10 modal-title text-center">
						<h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Verificar datos</h5>
					</div>
					<div class="col-1">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>

				<!--Cuerpo del modal-->
				<div class="modal-body">
					<form>
						<!--Nombre del proyecto-->
						<div class="form-group row">
							<label for="nombreproyecto" class="col-sm-6 col-form-label">Nombre del proyecto:</label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Ejemplo de nombre">
							</div>

						</div>
						<!--Fin de nombre del proyecto-->

						<!--Fecha de fin-->
						<div class="form-group row">
							<label for="inputState" class="col-sm-6 col-form-label">Fecha de entrega</label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Ejemplo de fecha">
							</div>
						</div>
						<!--Fin de fecha de fin-->

						<!--Cliente-->
						<div class="form-group row">
							<label for="botoncliente" class="col-6 col-form-label">Cliente</label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Ejemplo de cliente">
							</div>
						</div>
						<!--Fin de cliente-->

						<!--Participantes-->
						<div class="form-group row">
							<label for="botonparticipantes" class="col-6 col-form-label">Participantes</label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Ejemplo de participantes">
							</div>
						</div>
						<!--Fin de participantes-->

						<!--Descripcion-->
						<div class="form-group row">
							<label for="descripcion" class="col-sm-6 col-form-label">Descripcion</label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Ejemplo de descripcion">
							</div>
						</div>
						<!--Fin de descripcion-->

					</form>
				</div>
				<!--Fin del cuerpo del modal-->

				<div class="modal-footer d-flex justify-content-center">
					<button type="button" class="btn btn-primary" data-target="principaluser.php">Aceptar</button>
				</div>
			</div>
		</div>
	</div>



	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/datepick.js"></script>
</body>

</html>