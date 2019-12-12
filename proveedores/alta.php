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

		<style>
			body {
			    font-family: Arial;
			}
		</style>

		<!-- Assign UTF-8 -->
		<meta charset="utf-8" />

		<title>
			Alta
		</title>

	</head>
	<body>

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
		<!-- End of Navbar -->

		<!-- Content -->
		<div class="container-fluid" style="margin-top: 3rem;">
			<div class="row flex-xl-nowrap">

				<!-- Left Sidebar -->
				<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
					
				</div>
				<!-- End of Sidebar -->

				<!-- Main body -->
				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">

					<?php	
						require('../Conectar.php');
					?>
					<?php

						//Tomando por Post las variables del formulario:
						$nombre = $_POST['nombre'];
						$CUIT = $_POST['CUIT'];
						$telefono = $_POST['telefono'];
						$direccion = $_POST['direccion'];

						//Conecto a la BD
						$pdo = conectar();

						//Preparo la sentencia INSERT, con parámetros llamados :a, :b, :c, :d, :e, :f
						$insercion = $pdo -> prepare("INSERT INTO proveedores (nombre, CUIT, telefono, direccion) VALUES (:a, :b, :c, :d);");


						//Le asigno valor a los parámetros :a , :b, :c, :d, :e, :f
						$insercion -> bindValue(':a',$nombre);
						$insercion -> bindValue(':b',$CUIT);
						$insercion -> bindValue(':c',$telefono);
						$insercion -> bindValue(':d',$direccion);


						//Ejecutamos la sentencia preparada antes:
						if ($insercion -> execute() ) {
						 //Si la inserción fue exitosa:
							echo "El proveedor fue agregado."."<br><br>";
						}
						else {
						    echo "Error al agregar al proveedor";
						}
					
					?>	
					<!-- Links -->
					<a href="Proveedores.php" class="btn btn btn-primary"> Volver a la página de proveedores </a>
					<a href="../index.html" class="btn btn btn-primary"> Volver al Inicio </a>

				</main>
				<!-- End of Main Body-->

				<!-- Right Sidebar -->
				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Dar de alta a un nuevo proveedor 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>
				<!-- End of  Sidebar -->

			</div>

		</div>
		<!-- End of Content -->

	</body> 
</html>
