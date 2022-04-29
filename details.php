<?php
include("connection.php");
include("funciones.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

  // DRY - Don't Repeat Yourself
  $id = $_GET['id'];
  $query = "SELECT * FROM juegos WHERE id = $id LIMIT 1";
  $result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Cojones</title>
</head>
<body>
    <div class="container">
        <div class="item-tabla">
            <div class="titulo">
                <h1>BD - JUEGOS</h1>
            </div>    

            <div class="menu">
                <?php include("menuses.php") ?>
            </div>
            <div class="texto-tabla">
                <div class="divdetabla">

                    <!-- CONNTENIDO -->
                    <table class="cr_table table table-bordered, tablamatch">
                        <thead>
                            <tr>
                                <th colspan="7">DETALLES</th>
                            </tr>
                            <tr>
                                <th>NOMBRE</th>
                                <th>GENERO</th>
                                <th>jugadores</th>
                                <th>ESPACIO MINIMO</th>
                                <th>PLATAFORMA</th>
                                <th>descripcion</th>
                                <th>IMAGEN</th>

                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    //$query = "SELECT * FROM juegos WHERE instalado = 'SI' ORDER BY nombre ASC";
                                    $result_tasks = mysqli_query($conn, $query);    
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                        <?php $id= $row['id'];?>
                                            <td class="mayusculones"><?php echo $row['nombre']; ?></td>
                                            <td><span class="<?php echo arrejuntar($row['genero']); ?>"><?php echo $row['genero']; ?></span></td>
                                            <td><?php echo convertirjugadores($row['jugadores']); ?></td>
                                            <td><?php echo $row['espacio']; ?></td>
                                            <td><?php echo $row['plataforma']; ?></td>
                                            <td><p><?php echo $row['descripcion']; ?></p></td>
                                            <td><img class="mini-img" src="images/<?php echo $row['imagen']?>.jpg"></td>

                                        </tr>
                                    <?php }
                                ?>
                            </form>               
                        </tbody>    
                    </table>
                </div> 
            </div>
        </div> 
    </div>
</body>
</html>