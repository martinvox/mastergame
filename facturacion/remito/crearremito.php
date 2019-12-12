<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/MasterGame/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/MasterGame/vendor/js/bootstrap.bundle.js"></script>
	<script src="/MasterGame/vendor/jquery/jquery-ui.min.js"></script>

	<!-- Load CSS & Icons library -->
	<link rel="stylesheet" href="/MasterGame/css/bootstrap.css">
	<link rel="stylesheet" href="/MasterGame/vendor/jquery/jquery-ui.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Responsive design for mobile navigation -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		body {
		    font-family: Arial;
		}

	</style>
	</style>

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />

	<title>
		Clientes
	</title>
	</head>
	<body>

		<!-- Navbar -->
<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky; z-index: 1071; top: 0;">
			<div class="d-flex justify-content-end">
		    <a class="navbar-brand" href="../../index.html"  style="color: #fff;">
			    <img src="/MasterGame/images/mg2.jpg" width="80" height="30" class="d-inline-block align-top" data-toggle="tooltip" data-placement="bottom" title="Sistema de Logística Master Game">
			    Sistema de Logística
			   </a>
			<div class="nav navbar-nav navbar-right">
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
			    		<li class="nav-item active">
			    			<a class="nav-link" href="../../index.html" style="margin-right: 1rem; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../../empleados/FichasEmpleados.php" style="color: #fff;">Personal</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../../proveedores/Proveedores.php" style="color: #fff;">Proveedores</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../../clientes/crud.php" style="color: #fff;">Clientes</a>
			    		</li>
			    		<li class="nav-item" style="margin-right: 1rem;">
			    			<a class="nav-link" href="../../inventarioo/nuevo.php" style="color: #fff;">Gestionar Stock</a>
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

				<!-- End of Left Sidebar -->

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" style="background-color: #eee;">
				
					<!-- Formulario -->
					<div class="container">
						<form action="altaremito.php" method="post">

							<fieldset>

							<!-- Nombre Formulario -->
							<legend>Remito</legend>

							<!-- Row -->
							<div class="form-row">

								<!-- Nombre Imput -->
								<div class="col-md-6">
									<label>Nombre</label>
		    						<div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
										<input  name="nombre" placeholder="Nombre" class="form-control"  type="text" required>
								 	</div>
								</div>
							
								<!-- Apellido input-->
								<div class="col-md-6">
									<label>Apellido</label>
		    						<div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
										<input name="apellido" placeholder="Apellido" class="form-control"  type="text" required>
								 	</div>
								</div>
							</div>

							<!-- Otro Row -->
							<div class="form-row">

								<!-- DNI input-->
								<div class="col-md-4">
									<label>Tipo Documento</label>
		    						<div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card"></i></span>
							  			<select name="tipo_documento" class="form-control selectpicker" required>
										    <option value=" ">Tipo de Documento</option>
										    <option value="cuit">CUIT</option>
										    <option value="dni">DNI</option>
										    <option value="lib_enrol">Libreta Enrolamiento</option>
											<option value="ced_ident">Cedula de Identidad</option>
											<option value="lib_civica">Libreta Cívica</option>
											<option value="pasaporte">Pasaporte</option>
										</select>
							    </div>
							  </div>
							  <div class="col-md-8">
									<label>Número</label>
		    						<div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card"></i></span>
							  			<input name="dni" placeholder="DNI" class="form-control"  type="number" required>
							    </div>
							  </div>
							</div>

							<!-- Telefono input-->
								<div class="col-md-6">
									<label>Teléfono</label>
		    						<div class="input-group-prepend">
									    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
							  			<input name="telefono" placeholder="(341)4808080" class="form-control"  type="number" required>
							    	</div>
								</div>
							</div>


							<!-- Text areas -->
							<!-- ROW-->
							<div class="form-row">
								<div class="col-md-6">
								    <label>Productos</label>
								    <div class="input-group-prepend">
								        <span class="input-group-text" id="basic-addon1"><i class="fas fa-boxes"></i></span>
								        <div class="input-group-prepend">
								        	<textarea class="form-control" name="producto" placeholder="Productos" cols="40" rows="5" required></textarea>
								    	</div>
									</div>
								</div>
								<div class="col-md-6">
								    <label>Garantías</label>
								    <div class="input-group-prepend">
								        <span class="input-group-text" id="basic-addon1"><i class="fas fa-file"></i></span>
								        <textarea class="form-control" name="garantia" placeholder="Garantías" cols="40" rows="5" required></textarea>
								    </div>
								</div>
							</div>

							<!-- ROW-->
							<div class="form-row">
								<div class="col-md-6">
							    	<label>Valor</label>
								    <div class="input-group-prepend">
								        <span class="input-group-text" id="basic-addon1"><i class="fa fa-hand-holding-usd"></i></span>
								        	<textarea class="form-control" name="valor" placeholder="Valor" cols="40" rows="5" required></textarea>
								    </div>
								</div>
								<div class="col-md-6">
									<label>Cantidad</label>
							   		<div class="input-group-prepend">
								        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol"></i></span>
								        <textarea class="form-control" name="cantidad" placeholder="Cantidad" cols="40" rows="5" required></textarea>
								    </div>
							    </div>
							</div>

						</fieldset>

						<!-- SUBMIT -->

						<div class="container">
							<div class="row justify-content-center">
								<div class="col-1">
									<input type="submit" value="Agregar remito" class="btn btn-success" style="margin: 3rem 0rem 0rem 0rem;">
								</div>
							</div>
						</div>

						</form>
						<!-- Cierre de Formulario -->
					</div>

					
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-1">
								<a class="fa fa-home" style="margin-top: 1.5rem; margin-left: 2rem; font-size: 50px; color: #17a2b8" title="Volver al inicio" href="../../index.html"></a>
							</div>
						</div>
					</div>

				</main>

				<!-- End of Main Content -->

			</div>

		</div>

		<!-- End of Content -->

	</body>
</html>