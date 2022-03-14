<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
<?php
include("connection.php");
//include("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Predicciones</title>
</head>
<body>
    <div class="container">
        <div class="item-tabla">
            <div class="titulo">
                <h1>VER JUEGOS</h1>
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
                                <th colspan="5">JUEGOS</th>
                            </tr>
                            <tr>
                                <th>NOMBRE</th>
                                <th>GENERO</th>
                                <th>INSTALADO</th>
                                <th>ESPACIO MINIMO</th>
                                <th>PLATAFORMA</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $query = "SELECT * FROM juegos ORDER BY 'nombre'";
                                    $result_tasks = mysqli_query($conn, $query);    
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                        <?php $id= $row['id'];?>
                                           <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['genero']; ?></td>
                                            <td><?php echo $row['instalado']; ?></td>
                                            <td><?php echo $row['espacio']; ?></td>
                                            <td><?php echo $row['plataforma']; ?></td>

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
</body>
</html>