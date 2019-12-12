<?php
	require('../Conectar.php');
	$pdo = conectar();
	
	/* Se prepara la modificaci�n */
	$modificacion=$pdo->prepare("UPDATE productos SET nombre = :nombre, marca = :marca, precio = :precio, modelo = :modelo WHERE id = :num");
	
	/* Se vinculan los par�metros con los datos que se reciben por POST: */
	$modificacion->bindValue(':nombre',$_POST['nombre']);
	$modificacion->bindValue(':marca',$_POST['marca']);
	$modificacion->bindValue(':modelo',$_POST['modelo']);
	$modificacion->bindValue(':precio',$_POST['precio']);
	$modificacion->bindValue(':num',$_POST['id']);
	
	/* Se ejecuta la modificaci�n preparada anterior */
	if($modificacion ->execute()) {
		try {
			$modificacion->execute();
			echo "Exito ! El producto fue modificado";
			header("Location: nuevo.php");
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	else {
		/* Si sucedi� alg�n error */
		echo "Error ! No se pudo cambiar la informaci�n de los juegos";
	}
?>