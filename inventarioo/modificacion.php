<link rel="stylesheet" href="estilo.css">
<?php
	include('../Conectar.php');
	$pdo = conectar();
	
	/* Se preparan los datos actuales de los juegos */
	
	$productoactual=$pdo->prepare("SELECT nombre FROM productos WHERE id=:num");
	$precio=$pdo->prepare("SELECT precio FROM productos WHERE id=:num");
	
	/* Se linkea el parámetro :num con el id que se recibe por GET */
	
	$productoactual->bindValue(':num',$_GET['id']);
	$precio->bindValue(':num',$_GET['id']);

	/* Se ejecuta la preparacion */
	
	$productoactual->execute();
	$precio->execute();
	$info = $productoactual->fetchAll(PDO::FETCH_ASSOC);
	$precio1=$precio->fetchAll(PDO::FETCH_ASSOC);
	

	/* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
	
	echo '<form action="prodmodificado.php" method="post">';
	echo "<input name='id' type='hidden' value='{$_GET['id']}'>";
	echo "Nombre del producto: <input name='nombre' value='{$info[0]['nombre']}'><br>";
	echo '</select><br>';
	echo "Precio: <input name='precio' value='{$precio1[0]['precio']}'><br>";
	echo '<input type="submit" value="Modificar producto">';
	echo '</form>';
	echo '<center><a href=index.html>Volver al inicio</a></center>';
?>