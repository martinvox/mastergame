<?php
	require('../Conectar.php');
	$pdo = conectar();
	
	/* Se prepara la modificación */
	$modificacion=$pdo->prepare("UPDATE productos SET activo = 1 WHERE id = :num");
	
	/* Se vinculan los parámetros con los datos que se reciben por POST: */
	//$modificacion->bindValue(':activo',$_POST['activo']);
	$modificacion->bindValue(':num',$_POST['id']);
	
	/* Se ejecuta la modificación preparada anterior */
	if($modificacion ->execute()) {
		try {
			$modificacion->execute();
			echo "Exito ! El producto fue devuelto";
			header("Location: nuevo.php");
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	else {
		/* Si sucedió algún error */
		echo "Error ! No se pudo cambiar la información de los juegos";
	}
?>