<link rel="stylesheet" href="estilo.css">
<?php
	include('../Conectar.php');
	//$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$precio = $_POST['precio'];
	
	$pdo = conectar();

	/* Se preparan las sentencias con los valores deseados */
	
	$agregar=$pdo->prepare("INSERT INTO productos (nombre, marca, modelo, precio) VALUES (:nom, :marca, :modelo, :pre);");
	
	/* Se le asigna valores a la sentencia */
	$agregar->bindValue(':nom', $nombre);
	$agregar->bindValue(':marca', $marca);
	$agregar->bindValue(':modelo', $modelo);
	$agregar->bindValue(':pre', $precio);

	/* Se ejecuta lo preparado anteriormente, y se agrega un nuevo juego: */
	
	if (!$agregar -> execute()) {
		//Si la ejecución de agregar un juego no salió exitosa:		
		echo "Error al agregar el juego";
		die();
		}
	else {
		header("Location: nuevo.php");
	}

?>