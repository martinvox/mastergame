<?php
	require('../../Conectar.php');
?>
<?php
	$pdo = conectar();
	$consulta=$pdo->prepare("SELECT nro_remito, fecha, nombre, apellido, dni, telefono, producto, garantia, cantidad, valor FROM remitos WHERE nro_remito=:nro_remito");
	$consulta->bindValue(':nro_remito',$_GET['id']);
	$consulta->execute();
	$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
	echo '<form action="guardarmodif.php" method="post">';
	echo "<input name='nro_remito' type='hidden' value='{$_GET['id']}'>";
	echo "Nombre: <input name='nombre' value='{$datos[0]['nombre']}'><br>";
	echo "Apellido: <input name='apellido' value='{$datos[0]['apellido']}'><br>";
	echo "DNI: <input name='dni' value='{$datos[0]['dni']}'><br>";
	echo "Telefono: <input name='telefono' value='{$datos[0]['telefono']}'><br>";
	echo "Productos: <input name='producto' value='{$datos[0]['producto']}'><br>";
	echo "Garantías: <input name='garantia' value='{$datos[0]['garantia']}'><br>";
	echo "Cantidad: <input name='cantidad' value='{$datos[0]['cantidad']}'><br>";
	echo "Valores: <input name='valor' value='{$datos[0]['valor']}'><br>";
	echo '<input type="submit" value="Modificar datos">';
	echo '</form>';
?>