<?php
	require('../Conectar.php');
?>
<?php
	$pdo = conectar();
	$modificacion=$pdo->prepare("UPDATE remitos SET
	                                nombre = :nombre, apellido = :apellido, dni = :dni, telefono = :telefono, producto = :producto, garantia = :garantia, valor = :valor
	                                WHERE nro_remito=:nro_remito");
	$modificacion->bindValue(':nro_remito',$_POST['nro_remito']);
	$modificacion->bindValue(':nombre',$_POST['nombre']);
	$modificacion->bindValue(':apellido',$_POST['apellido']);
	$modificacion->bindValue(':dni',$_POST['dni']);
	$modificacion->bindValue(':telefono',$_POST['telefono']);
	$modificacion->bindValue(':producto',$_POST['producto']);
	$modificacion->bindValue(':garantia',$_POST['garantia']);
	$modificacion->bindValue(':valor',$_POST['valor']);
	if($modificacion->execute()) {
	    echo "Datos modificados correctamente<br><a href=remitos.php>Volver a remitos</a>";
	}
	else {
	    echo "Error al modificar los datos del remito";
	}
?>