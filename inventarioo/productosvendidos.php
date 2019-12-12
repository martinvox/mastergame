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

	<style>
		body {
		    font-family: Arial;
		}
	</style>

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />

	<title>
		Inventario
	</title>
	</head>
	<body>

		<!-- Navbar -->
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky;">
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

		<!-- Content -->
		<div class="container-fluid" style="margin-top: 3rem;">
			<div class="row flex-xl-nowrap">

				<!-- Left Sidebar -->
				<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
				</div>

				<!-- Main body -->
				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
					

						<!-- Tabla para Productos Vendidos -->
						<?php
							require('../Conectar.php');
						/* Conexión al servidor */
						$pdo=conectar();

						echo "<h1>Listado de Productos Vendidos</h1>";

						/* Se creará una simple tabla que mostrará todos los productos cargados y la opción de eliminarlos o modificarlos */
						$modificar1= $pdo->prepare("SELECT 
							productos.id, 
							productos.nombre as nombreprod, 
							productos.marca, 
							productos.modelo, 
							productos.precio, 
							productos.activo,
							venta.id as ventaid, 
							venta.precio_venta, 
							socios.nombre as nombrecliente, 
							socios.apellido as apellidocliente, 
							personales.nombre as nombreempleado, 
							personales.apellido as apellidoempleado 
							FROM venta
								JOIN socios 
									ON venta.cliente_id=socios.id 
								JOIN personales 
									ON venta.empleado_id=personales.id 
								JOIN productos
									ON venta.producto_id=productos.id 
						");
						$modificar1-> execute();
						$modificacion1 = $modificar1->fetchAll(PDO::FETCH_ASSOC);
						
						/* Mostramos los resultados en una tabla: */

						/* Encabezado de la tabla */
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th>Numero</th>
										<th>Producto</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Precio</th>
										<th>Precio de venta</th>
										<th>Cliente</th>
										<th>Vendedor</th>
									</tr>
								</thead>';

							/* Cuerpo de la Tabla */
						foreach ($modificacion1 as $unaModificacion1) {
							echo '<tr>';
							echo '<td>'.$unaModificacion1['ventaid'].'</td>';
							echo '<td>'.$unaModificacion1['nombreprod'].'</td>';
							echo '<td>'.$unaModificacion1['marca'].'</td>';
							echo '<td>'.$unaModificacion1['modelo'].'</td>';
							echo '<td>'.$unaModificacion1['precio'].'</td>';
							echo '<td>'.$unaModificacion1['precio_venta'].'</td>';
							echo '<td>'.$unaModificacion1['nombrecliente'].' '.$unaModificacion1['apellidocliente'].'</td>';
							echo '<td>'.$unaModificacion1['nombreempleado'].' '.$unaModificacion1['apellidoempleado'].'</td>';
						}
						?>
						</table style="margin-bottom: 3rem;">

						<!-- Contenedor para los botones -->
						<div class="container">
							<!-- Posiciono en Fila -->
							<div class="row">
								<!-- Elijo la ubicación espacial de cada botón -->
								<div class="col-6">
									<!-- Link -->
									<a class="btn btn-info" href=../index.html><i class="fa fa-home"></i> Volver al inicio </a>
								</div>
							</div> <!-- /Cierre de la fila -->
						</div> <!-- /Cierre del Contenedor -->
					</main> <!-- /Cierre del Contenido Principal -->

				<!-- Right Sidebar -->
				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
						</li>
					</ul>
				</div> <!-- /Cierre de la barra Derecha -->

			</div>

		</div>

	</body> 
	
</html>
