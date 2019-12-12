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
		Clientes
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

		<!-- Content -->

		<div class="container-fluid" style="margin-top: 3rem;">
			<div class="row flex-xl-nowrap">

				<!-- Left Sidebar -->

				<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
					
				</div>

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
					<h1> Clientes </h1>
					<?php
						require('../Conectar.php');

						$pdo = conectar();
						//La función conectar() está definida en Conectar.php, y conecta a la BD, 
						//retornando un objeto de clase PDO con la conexión.

						$consulta = $pdo->prepare("SELECT 
							*
							FROM socios");

						//Aqui no hay parámetros, puede ejecutarse esta consulta con
						// $pdo->query(), lo omitimos por brevedad.

						$consulta -> execute();
						$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

						//Mostramos los resultados en una tabla:
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido</th>
										<th scope="col">DNI</th>
										<th scope="col">Telefono</th>
										<th scope="col">Direccion</th>
										<th scope="col">Editar</th>
										<th scope="col">Borrar</th>
									</tr>
								</thead>
								<tbody>';
									foreach ($resultado as $elSocio) {
									    echo '<tr>';
									    echo '<td>'. $elSocio['nombre']. '</td>';
									    echo '<td>'. $elSocio['apellido'] .'</td>';
									    echo '<td>'. $elSocio['DNI'] .'</td>';
									    echo '<td>'. $elSocio['telefono'] .'</td>';
									    echo '<td>'. $elSocio['direccion'] .'</td>';


									    //Celda con el link para editar:
									   echo '<td>
									    		<a href="modificar.php?id='.$elSocio['id'].'">
									    			<button class="btn btn-info">
										    			<i class="far fa-edit"></i>	
										    		</button>
									    		</a>
									    	 </td>';
									    //Celda con el link para eliminar:
									   /* Modal */
										echo '<td>
												<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal'.$elSocio['id'].'">
												  <i class="fa fa-trash-alt"></i>
												</button>';

												//Acá genero un modal para cada elemento del foreach
												echo '<div class="modal fade" id="exampleModal'.$elSocio['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel1">Borrar Producto</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">';

												      echo "Desea borrar al cliente ".$elSocio['socio'].' '.$elSocio['apellido']."?";
												      
												      $pdo = conectar();

														/* Preparamos la eliminacion */
														$eliminar=$pdo->prepare("DELETE FROM socios WHERE id=:num");

														/* Vinculamos el parámetro :num con el id que se obtiene por el foreach */
														$eliminar->bindValue(':num',$elSocio['id']);

													echo '<div class="modal-footer">';
															echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>
															<a class="btn btn-danger" href="baja.php?id='.$elSocio['id'].'">
															Borrar
														</a>
													</div>
												  </td>';
										}
								echo '</tbody>
							  </table>';
					?>
					<div class="container">
						<div class="row">
							<div class="col-6">
								<a class="btn btn-info" href=../index.html><i class="fa fa-home"></i> Volver al inicio </a>
							</div>

							<div class="col-6">
								<!-- Botón de Agregar -->
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
								  <i class="fa fa-plus"></i> Agregar un cliente
								</button>

								<!-- Modal (o ventana emergente) -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Agregar un cliente</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      							
											<!-- Se crea un formulario para agregar un nuevo juego, su genero y precio -->
											<form method="post" action="alta.php">
												<div class="input-group">
													<label>Nombre:</label>
													<input type="text" name="nombre" value="" required minlength="3">
												</div>
												<div class="input-group">
													<label>Apellido:</label>
													<input type="text" name="apellido" value="" required minlength="3">
												</div>
												<div class="input-group">
													<label>Teléfono:</label>
													<input type="number" name="telefono" required minlength="2000000">
												</div>
												<div class="input-group">
													<label>DNI:</label>
													<input type="number" name="DNI" required min="10000000">
												</div>
												<div class="input-group">
													<label>Dirección:</label>
													<input type="text" name="direccion"  name="direccion" required minlength="8">
												</div>

										      	<div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
										        <button type="submit" class="btn btn-primary">Agregar cliente</button>

											</form>
										</div>
										
								      </div> <!-- Cierre del Body del Modal -->
								    </div> <!-- Cierre del Contenido del Modal -->
								  </div> <!-- Cierre del Modal Dialog -->
								</div> <!-- Cierre del Modal -->
							</div> <!-- Cierre de la columna -->
						</div> <!-- Cierre de la fila -->
					</div> <!-- Cierre del Contenedor -->
				</main> <!-- Cierre del Contenido Principal -->

				<!-- Right Sidebar 

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Dar de alta a un nuevo cliente 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="../index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div> -->

			</div>

		</div>

	</body> 
</html>
