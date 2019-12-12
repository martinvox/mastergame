<!DOCTYPE html>
<html>
	<html>
	<head>
	
	<!-- Load js files -->
	<script src="/MasterGame/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/MasterGame/vendor/js/bootstrap.bundle.js"></script>
	<script src="/MasterGame/vendor/js/chart.js"></script>

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
		Estadisticas
	</title>
	</head>
	<body>

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
		style="position: sticky; z-index: 1071; top: 0;">
			<div class="d-flex justify-content-end">
		    <a class="navbar-brand" href="index.html"  style="color: #fff;">
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

					<?php
					//conecto a la BD
					require('../Conectar.php');
					$pdo = conectar();

					$stmt = $pdo->prepare('SELECT * FROM personales');
					$stmt->execute();
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
					//defino el tamaño de la tabla
					$tamañorow = sizeof($row);

					echo '<div class="container" style="margin-bottom:2rem;">';
					echo "Hay un total de ".$tamañorow." personas trabajando en el local";
					echo '</div>';

					$st = $pdo->prepare('SELECT * FROM socios');
					$st->execute();
					$ro = $st->fetchAll(PDO::FETCH_ASSOC);
					//defino el tamaño de la tabla
					$tamañoro = sizeof($ro);

					echo '<div class="container" style="margin-bottom:2rem;">';
					echo "Hay un total de ".$tamañoro." clientes";
					echo '</div>';

					echo '<div class="container-fluid" style="width: 500px; height: 800px;">

						<canvas id="myChart"></canvas>

						<script>
						var ctx = document.getElementById("myChart");
						var myChart = new Chart(ctx, {
						    type: "bar",
						    data: {
						        labels: ["Clientes", "Trabajadores"],
						        datasets: [{
						            label: "Personas",
						            data: ['.$tamañoro.','.$tamañorow.'],
						            backgroundColor: [
						                "rgba(255, 99, 132, 0.2)",
						                "rgba(255, 159, 64, 0.2)",
						            ],
						            borderColor: [
						                "rgba(255,99,132,1)",
										"rgba(255, 159, 64, 1)",
						            ],
						            borderWidth: 1
						       		 }]
						    },
						    options: {
						        scales: {
						            yAxes: [{
						                ticks: {
						                    beginAtZero:true
						                }
						            }]
						        }
						    }
						});
						</script>

					</div>';

				?>

	  			<a href="index.html" class="btn btn-primary">Volver al inicio</a>

		  			

	  			</main>

				<!-- Right Sidebar -->
				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</body>

</html>

