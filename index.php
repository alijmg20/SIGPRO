<?php
$mensaje = '';
include_once 'Controlador/conexion.inc.php';
include_once 'Modelo/ingresar.inc.php';
include_once 'Modelo/agregar_usuario.inc.php';

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title>SIGPRO</title>
	<!--Titulo de pestaña-->
	<link rel="shortcut icon" type="image/x-icon" href="Vistas/logo/icono.png" />
	<meta name="description" content="Gestion de proyectos">
	<meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="Vistas/css/bootstrap.css">
	<link rel="stylesheet" href="Vistas/css/estilos.css">

</head>

<body>

<nav class="navbar navbar-dark bg-primary navbar-expand-sm sticky-top">
	<div class="container">
		<img src="Vistas/logo/logo.png" width="180" height="60" class="d-inline-block align-top" alt="" loading="lazy">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<div class="navbar-nav mr-auto">
			</div>
			<div class="d-flex flex-row justify-content-end">
				<a href="#iniciarsesion" data-toggle="modal" class="btn btn-primary btn-outline-light text-white mr-2">Iniciar sesion</a>
				<a href="#registro" data-toggle="modal" class="btn btn-dark text-white">Registro</a>

			</div>
		</div>
	</div>
</nav>

<br />

<?php 
	//Alerta de que ha sido creado satisfactoriamente el usuario

if ($mensaje === 'successfull') { ?>
	<div class="container text-center">
		<div class="alert alert-success" role="alert">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Registrado exitosamente

		</div>
	</div>

<?php
	$mensaje = '';

	//Alerta de que el usuario ingreso mal la contraseña

}  else if ($mensaje === 'bad_password') {
?>
	<div class="container text-center">
		<div class="alert alert-danger" role="alert">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Las contraseñas no coinciden
		</div>
	</div>
<?php
	$mensaje = '';

		//Alerta de que el usuario no ingreso todos los datos
}else if($mensaje === 'date_wrong'){
?>
	<div class="container text-center">
		<div class="alert alert-danger" role="alert">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			No ha ingresado todos los Datos!
		</div>
	</div>

<?php
	$mensaje = '';

	//Alerta de que ya tiene una cuenta registrada

}else if($mensaje === 'before_register'){
?>

<div class="container text-center">
		<div class="alert alert-warning" role="alert">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Ya este usuario esta registrado!
		</div>
	</div>

	<?php
	$mensaje = '';

	//Alerta de que el usuario y la contraseña no coinciden

}else if($mensaje === 'wrong_user'){
?>

<div class="container text-center">
		<div class="alert alert-danger" role="alert">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Datos ingresados invalidos
		</div>
	</div>

<?php
	}
	$mensaje = '';
?>







<section>
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 col-lg-1"></div>
			<!--Aux-->
			<div class="col-md-12 col-lg-5 d-flex justify-content-center">
				<img src="Vistas/img/equipo.png" class="img-fluid rounded border" alt="Equipo">
			</div>
			<div class="col-md-12 col-lg-5">
				<p class=" text-justify">
					<h4>¿Por qué utilizar Sigpro?</h4>
					En muchas ocasiones se considera la gestión de proyectos como un papel secundario y un gasto adicional, ocasionando con mucha frecuencia conflictos entre los mismos integrantes del equipo de trabajo, debido a que el líder no lleva una organización estable y precisa de la tarea que debe cumplir cada participante, obstaculizándose poder realizar satisfactoriamente el trabajo.
					</br>
					Esto genera problemas en el presente y futuro del proyecto por los retrasos a los que conlleva, obteniendo una pérdida de tiempo y recursos notables. Por lo tanto, la gestión de proyectos es un tema de suma importancia al iniciar uno, de ello dependerá su desarrollo y resultado final.
					</br>
					¿Estás empezando un proyecto y no sabes cómo comunicarte con tu equipo? ¿Quieres llevar una buena organización y gestión del trabajo? Con Sigpro tendrás la solución a tus interrogantes, siendo el software más reconocido y usado por los estudiantes en la actualidad.
				</p>
			</div>
			<div class="col-md-12 col-lg-1"></div>
			<!--Aux-->
		</div>

		<div class="row" style="padding: 20px">
			<div class="col-md-12 col-lg-1"></div>
			<!--Aux-->
			<div class="col-md-12 col-lg-5">
				<p class=" text-justify">
					<h4>¿Qué te ofrece?</h4>
					El triángulo de hierro en todo proyecto es prioridad para alcanzar el éxito y se basa en cumplir con el presupuesto, plazos y alcance. Sigpro te ofrece una variedad de herramientas para garantizar una excelente gestión de proyectos, permitiendo organizar y dividir tu trabajo con el resto de participantes, programando una fecha y tiempo límite, creando notificaciones y alertas en caso de aproximarse o no cumplir con la tarea asignada. A parte de llevar un control interno del proyecto, te permite mantener una comunicación con el cliente para mantenerlo informado del avance del proyecto.
				</p>
			</div>
			<div class="col-md-12 col-lg-5 d-flex justify-content-center">
				<img src="Vistas/img/porcentaje.png" class="img-fluid rounded border" alt="Porcentaje">
			</div>
			<div class="col-md-12 col-lg-1"></div>
			<!--Aux-->
		</div>

	</div>
</section>

</br>

<footer>
	<p class="container-fluid p-2 mb-1 bg-info text-white text-center">
		Equipo de Ingenieria del software de la Ucab - Todos los derechos reservados - 2020
	</p>
</footer>



<!--REGISTRO-->
<form method="POST" action="">
	<div class="modal fade" tabindex="-1" role="dialog" id="registro" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content card mb-3">
				<div class="card-header bg-primary text-white">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title text-center">Registro</h3>
				</div>

				<div class="modal-body">

					<div class="form-group">
						<input type="text" class="form-control" name="nombre" id="nombre_completo" placeholder="Nombre completo">
					</div>

					<div class="form-group">
						<input type="email" name=" correo_registro" class="form-control" id="correo_registro" placeholder="Correo electrónico">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password_registro" id="password_registro" placeholder="Contraseña">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="password_confirmacion" id="password_confirmacion" placeholder="Confirma tu contraseña">
					</div>


					<hr>
					<a >¿Ya posees una cuenta?</a>
					<a data-dismiss="modal" class="tooltip-test" title="Tooltip" data-toggle="modal" href="#iniciarsesion">Iniciar Sesion</a>



				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-lg btn-block" name="registro">Registar</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--FIN REGISTRO-->




<!--INICIAR SESION-->
<form method="POST" action="">
	<div class="modal fade" tabindex="-1" role="dialog" id="iniciarsesion" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content modal-content card mb-3">
				<div class="card-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title text-center text-white">Iniciar Sesion</h3>
				</div>

				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="email" name="correo_electronico" class="form-control" id="correo_electronico" aria-describedby="emailHelp" placeholder="Corre electrónico">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
						</div>

						<hr>
						<a >¿Todavia no tienes una cuenta?</a>
						<a data-dismiss="modal" class="tooltip-test" title="Tooltip" data-toggle="modal" href="#registro">¡Registrate Aqui!</a>
					</form>
				</div>

				<div class="modal-footer">
					<button type="submit" name="iniciarSesion" class="btn btn-primary btn-lg btn-block">Iniciar sesion</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--FIN INICIAR SESION-->


<script src="Vistas/js/jquery.js"></script>
	<script src="Vistas/js/bootstrap.min.js"></script>
</body>

</html>
