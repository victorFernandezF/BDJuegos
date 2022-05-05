<?php
include("../connection.php");
include("../funciones.php");

if(isset($_POST["add"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    $contrazeña = $_POST['contraseña'];
    $password = md5($contrazeña);
    
    $uppernombre = strtoupper($nombre);  
        $query = "INSERT INTO usuarios(nombre, password) VALUES ('$uppernombre', '$password')";
        echo $query;
        $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Query Failed.");
            }
        header('Location: newuser.php');
    
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
    <title>Añadir Usuario</title>
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
                        <label for="NOMBRE">NOMBRE DEL USUARIO:</label><br>
                        <input class="input" type="text" id="nombre" name="nombre" placeholder="Paco">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="genero">CONTRASEÑA</label><br>
                        <input class="input" type="password" id="contraseña" name="contraseña">
                    </fieldset>
                    <fieldset class="noborde">
                        <input class="boton" type="submit" name="add" value="AÑADIR">           
                    </fieldset>                    
                </form>   
              </div>              
            </div>
</html>