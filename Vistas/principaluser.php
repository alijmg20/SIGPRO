<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<title>SIGPRO</title> <!--Titulo de pestanha-->
		<link rel="shortcut icon" type="image/x-icon" href="Logo/2.png" />
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
				<a class="navbar-brand" href="../index.php">
		    		<img src="Logo/Recortada.png" width="182" height="57" class="d-inline-block align-top" alt="" loading="lazy">
		  		</a> 
		  	</div>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white">Equipo</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white">Alertas</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white">Cliente</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white">Configuracion</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white">Informacion</a>
				<a href="#" class="list-group-item list-group-item-action bg-primary text-white">Ir a proyectos</a>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<!--Linea problema:	<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						
				    	<li class="nav-item dropdown">
				      		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>

				      		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				        		<a class="dropdown-item" href="#">Configuracion de perfil</a>
				        		<a class="dropdown-item" href="#">Invitaciones</a>
				        		<div class="dropdown-divider"></div>
				        		<a class="dropdown-item" href="#">Cerrar sesion</a>
				      		</div>
				    	</li>
				  	</ul>
			<!--Cierre linea problema:	</div> -->
			</nav>
		<!-- /#page-content-wrapper -->
		</div>
	</div>
	<!-- /#wrapper -->


		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
