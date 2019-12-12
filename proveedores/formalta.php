<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/MasterGame/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/MasterGame/vendor/js/bootstrap.bundle.js"></script>

	<!-- Load CSS & Icons library -->
	<link rel="stylesheet" href="/MasterGame/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Responsive design for mobile navigation -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />


	<style>
		* { margin: 0px; padding: 0px; }
		body {
			font-size: 120%;
			background: #F8F8FF;
		}
		.header {
			width: 40%;
			margin: 50px auto 0px;
			color: white;
			background: #5F9EA0;
			text-align: center;
			border: 1px solid #B0C4DE;
			border-bottom: none;
			border-radius: 10px 10px 0px 0px;
			padding: 20px;
		}
		form, .content {
			width: 40%;
			margin: 0px auto;
			padding: 20px;
			border: 1px solid #B0C4DE;
			background: white;
			border-radius: 0px 0px 10px 10px;
		}
		.input-group {
			margin: 10px 0px 10px 0px;
		}
		.input-group label {
			display: block;
			text-align: left;
			margin: 3px;
		}
		.input-group input {
			height: 30px;
			width: 93%;
			padding: 5px 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}
		#user_type {
			height: 40px;
			width: 98%;
			padding: 5px 10px;
			background: white;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}
		.btn {
			padding: 10px;
			font-size: 15px;

			border: none;
			border-radius: 5px;
		}
		.error {
			width: 92%; 
			margin: 0px auto; 
			padding: 10px; 
			border: 1px solid #a94442; 
			color: #a94442; 
			background: #f2dede; 
			border-radius: 5px; 
			text-align: left;
		}
		.success {
			color: #3c763d; 
			background: #dff0d8; 
			border: 1px solid #3c763d;
			margin-bottom: 20px;
		}
		.profile_info img {
			display: inline-block; 
			width: 50px; 
			height: 50px; 
			margin: 5px;
			float: left;
		}
		.profile_info div {
			display: inline-block; 
			margin: 5px;
		}
		.profile_info:after {
			content: "";
			display: block;
			clear: both;
		}
	</style>

	<title>
		Formulario de Alta
	</title>
	</head>
	<body>
		<!--Navbar -->
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky; z-index: 1071; top: 0;">
			<div class="d-flex justify-content-end">
		    <a class="navbar-brand" href="../index.html"  style="color: #fff;">
			    <img src="/MasterGame/images/mg2.jpg" width="80" height="30" class="d-inline-block align-top" data-toggle="tooltip" data-placement="bottom" title="Sistema de Logística Master Game">
			    Sistema de Logística
			   </a>
			<div class="nav navbar-nav navbar-right">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
			    		<li class="nav-item active">
			    			<a class="nav-link" href="../index.html" style="margin-right: 1rem; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../empleados/FichasEmpleados.php" style="color: #fff;">Personal</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../proveedores/Proveedores.php" style="color: #fff;">Proveedores</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../clientes/crud.php" style="color: #fff;">Clientes</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../inventarioo/nuevo.php" style="color: #fff;">Gestionar Stock</a>
			    		</li>
			    	</ul>
			    	<span class="navbar-text">
			    	</span>
				</div>
			</div>
		</nav>
		
		<!-- Form -->

		<div class="container" align="center">
			<h1>Alta de Proveedores</h1>

		<form method="post" action="alta.php">
			<div class="input-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" value="" required minlength="3">
			</div>
			<div class="input-group">
				<label>Teléfono:</label>
				<input type="number" name="telefono" required minlength="2000000">
			</div>
			<div class="input-group">
				<label>CUIT:</label>
				<input type="number" name="CUIT" required min="10000000">
			</div>
			<div class="input-group">
				<label>Dirección:</label>
				<input type="text" name="direccion"  name="direccion" required minlength="8">
			</div>
			<div class="input-group">
				<button type="submit" class="btn btn-success" name="register_btn">Dar de Alta</button>
			</div>
		</form>
			<div class="card text-center" style="width: 20rem;">
			   <div class="card-body">
			    <p class="card-text">
			    	<a href="Proveedores.php" class="btn btn btn-primary"> Volver a la página de Proveedores </a>
			    </p>
			    <p class="card-text">
			    	<a href="../index.html" class="btn btn btn-primary"> Volver al Inicio </a>
			    </p>
			  </div>
			</div>
		</div>
	</body>
</html>