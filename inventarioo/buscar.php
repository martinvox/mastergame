<?php
    require ('../Conectar.php');
    $pdo=conectar();

    $salida = "";

    $query = $pdo->prepare("SELECT * FROM productos WHERE nombre NOT LIKE '' ORDER By id LIMIT 100");

    if (isset($_POST['consulta'])) {
    	$q = $_POST['consulta'];
    	$query = $pdo->prepare("SELECT * FROM productos WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR marca LIKE '%$q%' OR modelo LIKE '%$q%' OR precio LIKE '$q' ");
    }   

    $query -> execute();
    $contar =  $query->rowCount();
    
    if ($contar>0) {
    	   echo'<table border=1 class="tabla_datos">
    			<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
                                <thead class="thead-dark" style="text-align:center";>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Producto</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Precio</th>
                                        <th>Baja</th>
                                        <th>Modificación</th>
                                        <th>Venta</th>
                                    </tr>
                                </thead>
    			

    	<tbody>';

        foreach ($query as $unaModificacion) {
            echo '<tr>';
            echo '<td>'.$unaModificacion['id'].'</td>';
            echo '<td>'.$unaModificacion['nombre'].'</td>';
            echo '<td>'.$unaModificacion['marca'].'</td>';
            echo '<td>'.$unaModificacion['modelo'].'</td>';
            echo '<td>'.$unaModificacion['precio'].'</td>';
    	   /* Modal */
                echo '<td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal'.$unaModificacion['id'].'">
                          <i class="fa fa-trash-alt"></i>
                        </button>';

                        //Acá genero un modal para cada elemento del foreach
                        echo '<div class="modal fade" id="Modal'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';//Modal
                        echo '<div class="modal-dialog" role="document">';
                            echo '<div class="modal-content">';
                              echo'<div class="modal-header">';
                                echo'<h5 class="modal-title" id="exampleModalLabel1">Borrar Producto</h5>'; //Titulo del Modal
                                echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">'; //Boton X para cerrar el modal. Cuerpo del Modal

                              //Pregunto al usuario si de verdad quiere borrar el producto
                              echo "Desea borrar el producto ".$unaModificacion['nombre'].' de ID '.$unaModificacion['id']."?";
                              
                              $pdo = conectar();

                                /* Preparamos la eliminacion */
                                $eliminar=$pdo->prepare("DELETE FROM productos WHERE id=:num");

                                
                                /* Vinculamos el parámetro :num con el id que se obtiene por el foreach */
                                $eliminar->bindValue(':num',$unaModificacion['id']);

                                

                            echo '<div class="modal-footer">'; //Pie del Modal
                                    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>'; //Cerrar Modal
                                    echo'<a class="btn btn-danger" href="baja.php?id='.$unaModificacion['id'].'">
                                    Borrar
                                    </a>'; //Aceptar la Baja, redirección
                            echo '</div>
                          </td>'; //Cierre de TD


            //Botón para abrir la ventana
            echo '<td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal'.$unaModificacion['id'].'">
                      <i class="fa fa-edit"></i>
                    </button>';

                    //Acá genero un modal para cada elemento del foreach
                    echo '<div class="modal fade" id="exampleModal'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Modificar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">';

                                //Conecto a la BD
                                $pdo = conectar();

                                /* Se preparan los datos actuales de los juegos */
                                $productoactual=$pdo->prepare("SELECT nombre, precio, marca, modelo FROM productos WHERE id=:num");
                                
                                /* Se linkea el parámetro :num con el id que se recibe por GET */
                                $productoactual->bindValue(':num',$unaModificacion['id']);

                                /* Se ejecuta la preparacion */
                                $productoactual->execute();

                                $info = $productoactual->fetchAll(PDO::FETCH_ASSOC);

                                /* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
                                
                                echo '<form action="prodmodificado.php" method="post">'; 
                                echo "<input name='id' type='hidden' value='{$unaModificacion['id']}'>"; //Dirijo el ID
                                echo "Nombre del producto: <input name='nombre' value='{$info[0]['nombre']}'><br>"; //Input Nombre
                                echo "Marca: <input name='marca' value='{$info[0]['marca']}'><br>"; //Input Marca
                                echo "Modelo: <input name='modelo' value='{$info[0]['modelo']}'><br>"; // Input Modelo
                                echo "Precio: <input type='number' name='precio' value='{$info[0]['precio']}'>"; //Input Precio
                                echo '<div class="modal-footer">'; //Pie del Modal
                                echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'; //Botón de cerrar
                                echo '<button type="submit" class="btn btn-primary">Modificar producto</button>'; //Botón para enviar el formulario a prodmodificado.php
                                echo '</form> 
                                </div>                                      
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>';

                // Celda para declarar la venta del producto y cambiar su estado de activo 1 a 0
                echo '<td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_venta'.$unaModificacion['id'].'">
                      <i class="fa fa-dollar-sign"></i>
                    </button>'; //Botón para Abrir el Modal

                    //Acá genero un modal para cada elemento del foreach
                    echo '<div class="modal fade" id="Modal_venta'.$unaModificacion['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Vender Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             <div class="container-fluid">
                                <div class="row">';

                                        /* Pregunto al Usuario si quiere vender el producto*/

                                        echo "Asigne un valor de venta para ".$unaModificacion['nombre'].' '.$unaModificacion['marca'].' '.$unaModificacion['modelo'].'<br>';

                                        echo '</div>';
                                        echo '<div class="row">';

                                        echo '<form action="venta.php" method="post">'; 

                                        //Conecto a la BD
                                        $pdo = conectar();

                                        /* Preparamos la venta*/
                                        $producto=$pdo->prepare("SELECT activo FROM productos WHERE id=:num");
                                        
                                        /* Se linkea el parámetro :num con el id que se recibe por GET */
                                        $producto->bindValue(':num',$unaModificacion['id']);

                                        /* Se ejecuta la preparacion */
                                        $producto->execute();

                                        $info1 = $producto->fetchAll(PDO::FETCH_ASSOC);
                                        echo '<input type="number" name="valor_venta" placeholder="Ingrese precio de venta" required> <br>';

                                  echo'</div>';
                                 echo '<div class="row">';
                                        echo '¿Quien realizo la venta?
                                        </div>
                                        <div class="row">';

                                        echo '<select name="empleado" required>';

                                            $pdo = conectar();

                                            $insercion = $pdo -> prepare("SELECT id, nombre, apellido FROM personales");
                                            $insercion -> execute();
                                            $ins1 = $insercion -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($ins1 as $ins) {
                                                echo '<option style="margin-bottom: 1rem;" value="'.$ins['id'].'">'.$ins['nombre'].' '.$ins['apellido'].'</option>';
                                            }
                                        echo '</select>';

                                    echo'</div>';

                                    echo '<div class="row">';
                                        echo '¿Que cliente compró el producto?
                                        </div>
                                        <div class="row">';

                                        echo '<select name="cliente" required>';

                                            $pdo = conectar();

                                            $insercion = $pdo -> prepare("SELECT id, nombre, apellido FROM socios");
                                            $insercion -> execute();
                                            $ins1 = $insercion -> fetchAll(PDO::FETCH_ASSOC);
                                            
                                            foreach ($ins1 as $ins) {
                                                echo '<option style="margin-bottom: 1rem;" value="'.$ins['id'].'">'.$ins['nombre'].' '.$ins['apellido'].'</option>';
                                            }
                                        echo '</select>';
                                        
                                    echo'</div>';
                                echo '</div>';
                            echo '</div>';
                                /*Pie del Modal*/
                            echo '<div class="modal-footer" style="margin-top: 1rem;">';
                                echo '<div class="row">';
                                /* Se arma un simple formulario para ingresar la informacion nueva de los juegos */
                                
                                echo "<input name='id' type='hidden' value='{$unaModificacion['id']}'>"; //Dirijo el ID
                                echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">No, cerrar</button>
                                    <button type="submit" class="btn btn-success">  
                                    Si, vender
                                    </button>
                                    </form>
                                </div>
                            </div>'; /* /Cierre del pie del modal*/                         
                     echo '</div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>';

        }//cierre del foreach
    }

    $pdo=null;
?>