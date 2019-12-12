<?php	
	require('../../Conectar.php');
?>
<?php
	//Conectar a la BD
	$pdo = conectar();

	//Consulta
	$consulta=$pdo->prepare("SELECT nro_remito, fecha, nombre, apellido, dni, telefono, producto, garantia, cantidad, valor FROM remitos WHERE nro_remito=:nro_remito");
	$consulta->bindValue(':nro_remito',$_GET['id']);
	$consulta->execute();
	$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($datos as $info){
		$nro_remito = $info['nro_remito'];
		$fecha = $info['fecha'];
		$nombre = $info['nombre'];
		$apellido = $info['apellido'];
		$dni = $info['dni'];
		$telefono = $info['telefono'];
		$producto = $info['producto'];
		$garantia = $info['garantia'];
		$cantidad = $info['cantidad'];
		$valor = $info['valor'];
	}
	$listaprod = explode (";", $producto);
	$listag = explode (";", $garantia);
	$listaval = explode (";", $valor);
	$sum=0;
	$sum2=0;
	echo '
		<!DOCTYPE html>
		<html>
			<head>
			
			<!-- Load js files -->
			<script src="/MasterGame/jquery/jquery-3.2.1.min.js"></script>
			<script src="/MasterGame/js/bootstrap.bundle.js"></script>

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
				Remito N° '.$nro_remito.' 
			</title>
			</head>
			<body>
				<table border="3" width=100% class="table table-hover" style="text-align:center;">
					<th style="text-align:center;">
						<h1> MASTER GAME </h1>
						De Emanuel Bruno Dalli
						<br>Cordoba 959
						<br>Rosario, Santa Fe, Argentina
						<br>Telefono: +543416527513
						<br><br>RESPONSABLE INSCRIPTO
					</th>
					<th>
					</th>
					<th style="text-align:center;">
						<h1>REMITO</h1>';

						$nro_serie_remito = 0001;
						$agregarCeros = str_pad($nro_serie_remito, 4, "0", STR_PAD_LEFT);
						$agregarCerosRemito = str_pad($nro_remito, 6, "0", STR_PAD_LEFT);
						echo '
						<h2> N°de Remito: '.$agregarCeros.' - '.$agregarCerosRemito.' </h2>
						(Comprobante no válido como factura)
						<br>Fecha y hora de venta: '.$fecha.'
						<br>CUIL: 20-33213722-4
						<br>Ingresos Brutos:
						<br>Inicio de actividades:
					</th>	
				</table>
 
				<table border="3" width=100% class="table table-hover" style="text-align:center;">
					<thead class="thead-dark">
						<tr>
							<th style="text-align:center"; colspan="3">
								INFORMACIÓN DEL CLIENTE 
							</th>
						</tr>
					</thead>
					<tbody style="text-align:left";>
						<tr>
							<td>
								Apellido y Nombre:'.$apellido.', '.$nombre.'<br>
								Número de Documento:'.$dni.'<br>
								Telefono:'.$telefono.'<br>
							</td>
						</tr>
					</tbody>
				</table>

				<table border="3" width=100% class="table table-hover" style="text-align:center; margin-bottom:0px;">
					<thead class="thead-dark">
						<tr>
							<th>
								PRODUCTOS
							</th>
						</tr>
					</thead>
					<tbody class="thead-dark">
						<tr>	

						<table border="3" width=100%  height=100% class="table table-hover" style="text-align:center;">
							<thead class="thead-dark">
								<tr>
									<th width=10%>
									Código
								</th>
								<th width=35%>
									Descripción
								</th>
								<th width=35%>
									Garantía
								</th>
								<th width=10%>
									Cantidad
								</th>
								<th width=10%>
									Valor
								</th>
								</tr>
							</thead>	
							<tbody class="thead-dark">
							<tr>
								<td width=10%>';
									//foreach ($listaprod as $l) {
										echo "Codigo Producto <br>";
									//}
							echo "	</td>
									<td width=40%>";
										foreach ($listaprod as $l) {
											echo "$l <br>";
										}	
							echo "	</td>
									<td width=40%>";
										foreach ($listag as $l0) {
											echo "$l0 <br>";
										}
							echo "	</td>
									<td width=40%>";
									echo "$cantidad";		
							echo "	</td>
									<td width=10%>";
										foreach ($listaval as $l2) {
											echo "$$l2 <br>";
											$sum2= ($sum2 + $l2)*$cantidad;
										}	
							echo '	</td>	
								</tr>
								<tr>
									<td colspan="4" style="text-align:right;">
										Monto Final:
									</td>
									<td>
										'."$$sum2" ?>
									</td>
								</tr>
							</tbody>
						</table>
						</tr>
					</tbody>		
				</table>
		
		<div class="container" style="margin-top: 7rem;">
			<div class="row">
				<div class="col">
					<div class="col">
					........................................................................
					</div>
					<div class="col" style="margin-left: 6rem";>
						Recibí conforme
					</div>
				</div>
				<div class="col">
					<div class="col">
					........................................................................
					</div>
					<div class="col" style="margin-left: 6rem;">
						Firma y Aclaración
					</div>
				</div>
			</div>
		</div>
		<div class="d-print-none">
			<div class="container" style="margin-top: 2rem;">
				<div class="row">
					<div class="col">
						<button class="btn btn-info" id='printPageButton' onClick='javascript:window.print();'>Imprimir remito</button>
					</div>
					<div class="col">
						<form action=remitos.php>
							<button class="btn btn-success" id='printPageButton2'>Volver a remitos</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>  