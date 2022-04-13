<?php
include("../connection.php");

/* $query = "SELECT MAX(orden) as 'orden' FROM eventos";
$orden = mysqli_query($conn, $query);
$ordenultimo = mysqli_fetch_array($orden);
//echo $ordenultimo['orden']; */

if(isset($_POST["add"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $instalado = $_POST['instalado'];
    $espacio = $_POST['espacio'];
    $formato = $_POST['formato'];
    $jugadores = $_POST['jugadores'];

    $plataforma1 = $_POST['plataforma'];

    $uppernombre = strtoupper($nombre);  
    $plataforma = strtoupper($plataforma1);  
    $query = "SELECT IF( EXISTS(SELECT * FROM juegos WHERE nombre =  '$uppernombre'), 'SI', 'NO') as 'existe'";
    $esta = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($esta);
      if ($row['existe'] == 'NO') {
        $query = "INSERT INTO juegos(nombre, genero, instalado, espacio, jugadores, formato, plataforma) VALUES ('$uppernombre', '$genero', '$instalado', '$espacio', '$jugadores','$formato', '$plataforma')";
        echo $query;
        $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Query Failed.");
            }
        header('Location: addgame.php');
    }else{
        echo'<script type="text/javascript">
        alert("Perdone, alma de pollo, ese juego ya está. a ver si miramos la lista primero.");
        window.location.href="../index.php";
        </script>';
    } 

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
<!--     <script src="../assets/js/general.functions.js" defer></script> -->
    <title>Añadir Evento</title>
</head>
<body>
    <div class="container">
        <div class="item">
        <div class="titulo">
                
                <h1>BD - JUEGOS</h1>
            </div>
            <div class="menu">
                <?php include("../menuses.php") ?>
            </div>
            <div class="texto">
              <div class="subtitulo">
                  
              
                <form class="formulario" action="" method="POST" enctype="multipart/form-data">
                    <fieldset class="noborde">
                        <label for="NOMBRE">NOMBRE DEL JUEGO:</label><br>
                        <input class="input" type="text" id="nombre" name="nombre" placeholder="Las aventuras de Mattias">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="genero">GENERO</label><br>
                        <input class="input" type="text" id="genero" name="genero" placeholder="ACCION">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="instalado">INSTALADO</label><br>
                        <select class="select" name="instalado" id="instalado">
                            <option value="NO">NO</option>
                            <option value="SI">SI</option>
                        </select>
                    </fieldset>
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="espacio">ESPACIO MÍNIMO</label><br>
                        <input class="input" type="text" id="espacio" name="espacio" placeholder="50 GB">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="jugadores">JGADORES</label><br>
                        <input class="input" type="text" id="jugadores" name="jugadores" placeholder="1-4">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="formato">FORMATO</label><br>
                        <select class="select" name="formato" id="formato">
                            <option value="físico">FISICO</option>
                            <option value="digital">DIGITAL</option>
                        </select>
                    </fieldset>

                    <fieldset class="noborde">
                        <label for="descripcion">DESCRIPCION</label><br>
                        <textarea class="descripcion" name="descripcion" placeholder="Matias es secuestrado por una banda de matones epilépticos y debe escapar como sea. 10/10"></textarea>
                    </fieldset>

                    <fieldset class="noborde">
                        <label for="plataforma">PLATAFORMA</label><br>
                        <input class="input" type="text" id="plataforma" name="plataforma" value="PS4" placeholder="PS3/PS4/PC">
                    </fieldset>


                    <fieldset class="noborde">
                        <input class="boton" type="submit" name="add" value="AÑADIR">           
                    </fieldset>                    
                </form>   
              </div>              
            </div>
</html>