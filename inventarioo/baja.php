<link rel="stylesheet" href="estilo.css">
<?php
	include('../Conectar.php');
	
	$pdo = conectar();

	/* Preparamos la eliminacion */

	$eliminar=$pdo->prepare("DELETE FROM productos WHERE id=:num");

	/* Vinculamos el par�metro :num con el id que se obtiene por GET */
	
	$eliminar->bindValue(':num',$_GET['id']);

	/* Ejecutamos la eliminaci�n, mostrando un mensaje de �xito o error seg�n corresponda */
	if($eliminar->execute()) {
		/* Si es exitosa la eliminacion */
		echo "Producto eliminado correctamente";
		header("Location: nuevo.php");
	}
	else {
		/* Cualquier error que suceda */
		echo "Error al querer eliminar el producto";
	}
	echo '<center><a href=index.html>Volver al inicio</a></center>';
?>