<?php
	require('../../Conectar.php');
?>
<?php
	$pdo = conectar();
	$eliminacion=$pdo->prepare("DELETE FROM remitos WHERE nro_remito=:nro_remito");
	$eliminacion->bindValue(':nro_remito',$_GET['id']);
	if($eliminacion->execute()) {
	    echo "Remito eliminado correctamente
		<br><a href=remitos.php>Volver a remitos</a>
		<br><a href=../index.html>Volver al menu</a>";
	}
	else {
	    echo "Error al eliminar el remito
		<br><a href=remitos.php>Intentar nuevamente</a>
		<br><a href=../index.html>Volver al menu</a>";
	}
?>