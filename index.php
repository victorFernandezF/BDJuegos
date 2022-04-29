<?php
function contarjuegosinstalados(){
    include("connection.php");
    $chorizo = "SELECT count(*) as juegos FROM juegos WHERE instalado = 'SI'";
    $resultado = mysqli_query($conn, $chorizo);
    $row = mysqli_fetch_array($resultado);
    $jinstalados = $row['juegos'];
    return $jinstalados;
};

function contarjuegos(){
    include("connection.php");
    $chimichanga = "SELECT count(*) as juegos FROM juegos";
    $resultado = mysqli_query($conn, $chimichanga);
    $row = mysqli_fetch_array($resultado);
    $juegarros = $row['juegos'];
    return $juegarros;
};

function arrejuntar($genero){
    $hay = strpos($genero, " ");
    if($hay == ""){
        $mamawebo = $genero;
    }else{
        $cotorra = explode(" ", $genero);
        $mamawebo = "$cotorra[0]-$cotorra[1]";
    };
 return $mamawebo;
};

function convertirjugadores($jugadores){
    $hay = strpos($jugadores, "-");
    if($jugadores == "1"){
        $alcachofa = "1 Jugador";
    }elseif($hay ==""){
        $alcachofa = "$jugadores Jugadores";
    }else{
        $amapola = explode("-", $jugadores);
        $alcachofa = " De $amapola[0] a $amapola[1] jugadores";
 
    };
    return $alcachofa;
}




//exit();


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
                    <fieldset class="noborde">
                        <label for="NOMBRE">JUEGOS EN TOTAL: <?php echo contarjuegos() ?> </label><br>
                        <label for="NOMBRE">JUEGOS INSTALADOS: <?php echo contarjuegosinstalados() ?> </label><br>
                    </fieldset>   
                    <!-- CONNTENIDO -->
                    <table class="cr_table table table-bordered, tablamatch">
                        <thead>
                            <tr>
                                <th colspan="6">JUEGOS instalados</th>
                            </tr>
                            <tr>
                                <th>NOMBRE</th>
                                <th>GENERO</th>
                                <th>jugadores</th>
                                <th>ESPACIO MINIMO</th>
                                <th>PLATAFORMA</th>
                                <th>imágen</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $query = "SELECT * FROM juegos WHERE instalado = 'SI' ORDER BY nombre ASC";
                                    $result_tasks = mysqli_query($conn, $query);    
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                    <?php
                                       $id= $row['id'];
                                       $link = "details.php?id=$id";?>
                                       <tr onclick="window.location.href='<?php echo $link?>'">
                                            <td class="mayusculones"><?php echo $row['nombre']; ?></td>
                                            <td><span class="<?php echo arrejuntar($row['genero']); ?>"><?php echo $row['genero']; ?></span></td>
                                            <td><?php echo convertirjugadores($row['jugadores']); ?></td>
                                            <td><?php echo $row['espacio']; ?></td>
                                            <td><?php echo $row['plataforma']; ?></td>
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
</body>
</html>