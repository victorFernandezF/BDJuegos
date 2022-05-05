<?php
include("../general/connection.php");
include("../general/funciones.php");

if(isset($_POST["add"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $nombre = $_POST['nombre'];
    $contrazeña = $_POST['contraseña'];
    $password = md5($contrazeña);
    $uppernombre = strtoupper($nombre);  
    $query = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $result = mysqli_query($conn, $query);
    $datos = mysqli_fetch_array($result);
    $contra = $datos['password'];
    

    if($password == $contra){
        $_SESSION['usuario'] = $nombre;
        header("location: ../index.php");
    }else{
        header("location: ../login_form.php");
    }
 exit();
   
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../general/estilos.css">
<!--     <script src="../assets/js/general.functions.js" defer></script> -->
    <title>LET ME IN</title>
</head>
<body>
    <div class="container">
        <div class="item">
        <div class="titulo">
                
                <h1>BD - JUEGOS</h1>
            </div>
            <div class="menu">
                <?php include("../general/menuses.php") ?>
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