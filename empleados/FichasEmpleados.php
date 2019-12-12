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
		Ficha de Empleados
	</title>
	</head>
	<body>

		<!-- Navbar -->
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

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">

				<h1 style="text-align: center; margin-bottom: 2rem;">Personal</h1>
				<?php
					require('../Conectar.php');
				?>
				<?php 
					//Nos conectamos a la BD
					$pdo = conectar();
					//Ejecuto la consulta
					$stmt = $pdo->prepare('SELECT personales.id as id, personales.nombre, personales.apellido, personales.DNI, personales.fecha_ingreso_laboral, labores.nombre as laburo FROM personales JOIN labores ON personales.labor_id=labores.id');
					$stmt->execute();
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

				   	//tabla
				   	echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
				   			<thead class="thead-dark">
					   			<tr>
					   				<th scope="col"> Nombre </th>
					   				<th scope="col"> Apellido </th>
					   				<th scope="col"> DNI </th>
					   				<th scope="col"> Labor </th>
					   				<th scope="col"> Fecha de Ingreso </th>
					   				<th scope="col"> Editar </th>
					   				<th scope="col"> Eliminar </th>
					   			</tr>
				   			</thead>
				   			<tbody>';
				   		foreach ($row as $key) {
				   		 	echo '<tr>';
							    echo '<td>'. $key['nombre']. '</td>';
							    echo '<td>'. $key['apellido'] .'</td>';
							    echo '<td>'. $key['DNI'] .'</td>';
							    echo '<td>'. $key['laburo'] .'</td>';
							    echo '<td>'. $key['fecha_ingreso_laboral'] .'</td>';

							    //Celda con el link para editar:
							   echo '<td>
							    		<a href="modificarEmpleados.php?id='.$key['id'].'">
							    			<button class="btn btn-info">
								    			<i class="far fa-edit"></i>	
								    		</button>
							    		</a>
							    	 </td>';
							    //Celda con el link para eliminar:
							    echo '<td>
							    		<a href="baja.php?id='.$key['id'].'">
							    			<button class="btn btn-danger">
								    			<i class="far fa-trash-alt"></i>	
								    		</button>
							    		</a>
							    	 </td>
							   	</tr>';
							}
						echo '</tbody>
					  </table>';
				?>

				<a href="../index.html" class="btn btn-primary" style="margin-top: 2rem;">Volver al inicio</a>

				</main>

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc" style="margin-top: 2rem;">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Sumar un nuevo trabajador 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="../index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</body>
</html>

