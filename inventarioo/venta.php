<?php
	require('../Conectar.php');
	$pdo = conectar();
	
	/* Se prepara la modificación */
	$modificacion=$pdo->prepare("UPDATE productos SET activo = 0 WHERE id = :num");
	$modificacion1=$pdo->prepare( "INSERT INTO venta (precio_venta, producto_id, cliente_id, empleado_id) VALUES (:venta, :num, :cliente, :empleado)");
	
	/* Se vinculan los parámetros con los datos que se reciben por POST: */
	//$modificacion->bindValue(':activo',$_POST['activo']);
	$modificacion->bindValue(':num',$_POST['id']);

	$modificacion1->bindValue(':venta',$_POST['valor_venta']);
	$modificacion1->bindValue(':cliente',$_POST['cliente']);
	$modificacion1->bindValue(':empleado',$_POST['empleado']);
	$modificacion1->bindValue(':num',$_POST['id']);

	var_dump($_POST);

	/* Se ejecuta la modificación preparada anterior */
	if( $modificacion -> execute() &&  $modificacion1 -> execute() ) {
		try {
			$modificacion->execute();
			$modificacion1->execute();
			echo "Exito ! El producto fue vendido";
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