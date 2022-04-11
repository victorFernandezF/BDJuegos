<?php
include("connection.php");
include("funciones.php");

 if(isset($_POST["ver"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $todos = $todos = isset($_POST['todos']) ? "si" : "no";
    $where = "WHERE 1";
    $plataforma = $plat = isset($_POST['plataforma']) ? "si" : "no";
    $genero = $plat = isset($_POST['genero']) ? "si" : "no";
    $jugadores = $plat = isset($_POST['jugadores']) ? "si" : "no";
    $instalado = $plat = isset($_POST['instalado']) ? "si" : "no";

    if($todos == 'si'){
        $where = $where;  
      };  

    if($plataforma == 'si'){
      $plataforma2 = $_POST['plataforma2'];
      $where = "$where AND plataforma = '$plataforma2'";  
    };

    if($genero == 'si'){
        $genero2 = $_POST['genero2'];
        $where = "$where AND genero = '$genero2'";  
      };
      
      if($jugadores == 'si'){
        $jugadores2 = $_POST['jugadores2'];
        $where = "$where AND jugadores = '$jugadores2'";  
      };

      if($instalado == 'si'){
        $instalados2 = $_POST['instalados2'];
        $where = "$where AND instalado = '$instalados2'";  
      };


    $query = "SELECT * FROM juegos $where ORDER BY nombre ";
    //echo $query;

}
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
                                <th colspan="5">JUEGOS instalados</th>
                            </tr>
                            <tr>
                                <th>NOMBRE</th>
                                <th>GENERO</th>
                                <th>jugadores</th>
                                <th>ESPACIO MINIMO</th>
                                <th>PLATAFORMA</th>
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