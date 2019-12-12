<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/MasterGame/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/MasterGame/vendor/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="/MasterGame/vendor/js/jquery.min.js"></script>
	<script type="text/javascript" src="/MasterGame/vendor/js/main.js"></script>

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
					<h1>Listado de Productos</h1>

						<div class="formulario">
							<label for="caja_busqueda">Buscar</label>
							<input type="text" name="caja_busqueda" id="caja_busqueda"></input>
						</div>

						<div id="datos"></div>';

						<!-- Contenedor para los botones -->
						<div class="container">
							<!-- Posiciono en Fila -->
							<div class="row">
								<!-- Elijo la ubicación espacial de cada botón -->
								<div class="col-3">
									<!-- Link -->
									<a class="btn btn-info" href=../index.html><i class="fa fa-home"></i> Volver al inicio </a>
								</div>
								<!-- Elijo la ubicación espacial de cada botón -->
								<div class="col-3">

									<!-- Botón de Agregar -->
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
									  <i class="fa fa-plus"></i> Agregar un nuevo ítem
									</button>

									<!-- Modal (o ventana emergente) -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document"> <!-- Ventana -->
									    <div class="modal-content"> <!-- Contenido -->
									      <div class="modal-header">	<!-- Encabezado del Modal -->
									        <h5 class="modal-title" id="exampleModalLabel">Agregar un producto</h5> <!-- Titulo del Modal -->
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!-- Botón de Cierre del Modal -->
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body"> <!-- Cuerpo del Modal -->
									      	<?php
									      		//Conecto a la BD
										        $pdo=conectar();
									
												/* Se crea un formulario para agregar un nuevo juego, su genero y precio */
												echo "<form action='alta.php' method='post' id='form' name='form'>";
												echo "Nombre de producto <input name='nombre' type='text' required><br>";
												echo "Marca <input name='marca' type='text' required><br>";
												echo "Modelo <input name='modelo' type='text' required><br>";
												echo "Precio: <input name='precio' type='number' required><br>";
												echo '</div>
										      	<div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										        <button type="submit" class="btn btn-primary">Agregar Producto</button>';

												echo '</form>
												</div>';
											?>
									      </div> <!-- /Cierre del Body del Modal -->
									    </div> <!-- /Cierre del Contenido del Modal -->
									</div> <!-- /Cierre del Modal -->
								</div> <!-- /Cierre de la columna -->
								<div class="col-3">
									<a class="btn btn-info" href=productosvendidos.php><i class="fa fa-hand-holding-usd"></i> Ir a productos vendidos </a>
								</div>
								<div class="col-3">
									<a class="btn btn-success" href="busqueda.php">
												Buscar <i class="fas fa-search"></i>
									</a>
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
