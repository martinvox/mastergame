<?php
	require('../../Conectar.php');
?>

<?php

	// Recibo por POST los datos ingresados en crearremito.html
	$fecha= date("Y-m-d H:i:s");
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$telefono = $_POST['telefono'];
	$producto = $_POST['producto'];
	$garantia = $_POST['garantia'];
	$cantidad = $_POST['cantidad'];
	$valor = $_POST['valor'];

	//Conecto a la BD
	$pdo = conectar();

	//Ejecuto la consulta
	$insercion = $pdo -> prepare("INSERT INTO remitos (fecha, nombre, apellido, dni, telefono, producto, garantia, cantidad, valor) VALUES (:f, :e, :d, :c, :b, :a, :y, :x, :z);");
	$insercion -> bindValue(':f',$fecha);
	$insercion -> bindValue(':e',$nombre);
	$insercion -> bindValue(':d',$apellido);
	$insercion -> bindValue(':c',$dni);
	$insercion -> bindValue(':b',$telefono);
	$insercion -> bindValue(':a',$producto);
	$insercion -> bindValue(':y',$garantia);
	$insercion -> bindValue(':x',$cantidad);
	$insercion -> bindValue(':z',$valor);

	if ($insercion -> execute()) {
		//Si el remito fue agregado exitosamente
		echo "El remito fue agregado<br><a href=crearremito.html>Crear otro</a><br><a href=remitos.php>Ver Remitos</a><br><a href=../index.html>Volver al Menu</a>";
	}
	else {
		//Sino error y dejo links a eleccion del user
		echo "Error al agregar el remito<br>
			<a href=crearremito.html>
				Volver a intentarlo
			</a><br>
			<a href=remitos.php>
				Ver Remitos
			</a><br>
			<a href=../index.html>
				Volver al Menu
			</a>";
	}
?>