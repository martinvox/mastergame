
<?php

    function conectar() {
        //Esta función conviene que esté en un archivo aparte, para reutilizarla en todos los archivos.
        //Datos del servidor
        $servidor =  'localhost';
        $nombreBD = 'sistema';
        $usuario = 'root';
        $clave = '';
        try {
            //Instanciamos un nuevo objeto de la clase PDO, y lo guardamos en $pdo.
            $pdo = new PDO("mysql:host=$servidor;dbname=$nombreBD;charset=utf8", $usuario, $clave);
            //Retornamos el objeto $pdo.
            return $pdo;
        }
        catch (PDOException $e) {
            //Si falló la conexión del try, lanza una excepción que capturamos aquí.
            echo "¡Error!" . $e->getMessage() . "<br>";
        }
    }

?>