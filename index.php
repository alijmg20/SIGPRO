<?php

include_once 'Plantillas/header_index.inc.php';
?>

<nav class="navbar navbar-dark bg-primary navbar-expand-sm sticky-top">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<img src="Vistas/Logo/Recortada.png" width="182" height="57" class="d-inline-block align-top" alt="" loading="lazy">
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<div class="navbar-nav mr-auto">
			</div>
			<div class="d-flex flex-row justify-content-end">
				<a href="#iniciarsesion" data-toggle="modal" class="btn btn-warning mr-2">Iniciar sesion</a>
				<a href="#registro" data-toggle="modal" class="btn btn-outline-dark">Registro</a>
			</div>
		</div>
	</div>
</nav>


<br />

<section>
	<div class="container">

		<div class="row" style="padding: 20px">
			<div class="col-md-12 col-lg-1"></div>
			<!--Aux-->
			<div class="col-md-12 col-lg-5 d-flex justify-content-center">
				<img src="Vistas/Imagenes/eq.png" class="img-fluid rounded border" alt="Equipo">
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
				<img src="Vistas/Imagenes/por.png" class="img-fluid rounded border" alt="Equipo">
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
			<div class="modal-content card text-white bg-primary mb-3">
				<div class="card-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title text-center">Registro</h3>
				</div>

				<div class="modal-body">

					<div class="form-group">
						<label for="nombre">Nombre completo : </label>
						<input type="text" class="form-control" name="nombre" id="nombre">
					</div>

					<div class="form-group">
						<label for="email">Correo electronico : </label>
						<input type="email" name=" correoelectronico" class="form-control" id="correoelectronico" aria-describedby="emailHelp">
					</div>

					<div class="form-group">
						<label for="password">Contraseña : </label>
						<input type="password" class="form-control" name="password" id="password">
					</div>

					<div class="form-group">
						<label for="password_confirmacion">Repita su contraseña : </label>
						<input type="password" class="form-control" name="password_confirmacion" id="password_confirmacion">
					</div>


					<hr>
					<a style="color: white;">¿Ya posees una cuenta?</a>
					<a data-dismiss="modal" class="tooltip-test" title="Tooltip" data-toggle="modal" href="#iniciarsesion" style="color: white;">Iniciar Sesion</a>



				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-info">Registar</button>
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
			<div class="modal-content modal-content card text-white bg-primary mb-3">
				<div class="card-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title text-center">Iniciar Sesion</h3>
				</div>

				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="email">Correo electronico: </label>
							<input type="email" name=" correoelectronico" class="form-control" id="correoelectronico" aria-describedby="emailHelp">
						</div>

						<div class="form-group">
							<label for="password">Contraseña: </label>
							<input type="password" class="form-control" name="password" id="password">
						</div>

						<hr>
						<a style="color: white;">¿Todavia no tienes una cuenta?</a>
						<a data-dismiss="modal" class="tooltip-test" title="Tooltip" data-toggle="modal" href="#registro" style="color: white;">¡Registrate Aqui!</a>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-info">Iniciar sesion</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--FIN INICIAR SESION-->



<?php
include_once 'Plantillas/footer_index.inc.php';
