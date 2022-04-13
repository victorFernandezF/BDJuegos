<?php
include("connection.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

  // DRY - Don't Repeat Yourself
  $id = $_GET['id'];
  $query = "SELECT * FROM juegos WHERE id = $id LIMIT 1";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $genero = $row['genero'];
    $instalado = $row['instalado'];
    $espacio = $row['espacio'];
    $jugador = $row['jugadores'];
    $formato = $row['formato'];
    $descripcion = $row['descripcion'];
    $plataforma = $row['plataforma'];
    //echo $nombre;
  }

if(isset($_POST["edit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $instalado = $_POST['instalado'];
    $espacio = $_POST['espacio'];
    $formato = $_POST['formato'];
    $jugadores = $_POST['jugadores'];
    $formato = $_POST['formato'];
    $descripcion = $_POST['descripcion'];
    $plataforma1 = $_POST['plataforma'];

    $uppernombre = strtoupper($nombre);  
    $plataforma = strtoupper($plataforma1);  
    $query = "UPDATE juegos SET nombre = '$nombre', genero = '$genero', instalado = '$instalado', espacio = '$espacio', jugadores = '$jugadores', formato = '$formato', descripcion = '$descripcion', plataforma = '$plataforma' WHERE id = $id";
    mysqli_query($conn, $query);
    //echo "<script>window.history.back()</script>";
    //echo "<script>window.history.back()<script>";
    header('Location: editselect.php?toti=si');

    //echo $query;

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
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
                <?php include("menuses.php") ?>
            </div>
            <div class="texto">
              <div class="subtitulo">
                  
              
                <form class="formulario" action="" method="POST" enctype="multipart/form-data">
                    <fieldset class="noborde">
                        <label for="NOMBRE">NOMBRE DEL JUEGO:</label><br>
                        <input class="input" type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="genero">GENERO</label><br>
                        <input class="input" type="text" id="genero" name="genero" value="<?php echo $genero ?>">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="instalado">INSTALADO</label><br>
                        <select class="select" name="instalado" id="instalado">
                            <option value="NO" <?= $instalado == 'NO' ? 'selected' : '' ?>>NO</option>
                            <option value="SI" <?= $instalado == 'SI' ? 'selected' : '' ?>>SI</option>
                        </select>
                    </fieldset>
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="espacio">ESPACIO MÍNIMO</label><br>
                        <input class="input" type="text" id="espacio" name="espacio" value="<?php echo $espacio ?>">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="jugadores">JGADORES</label><br>
                        <input class="input" type="text" id="jugadores" name="jugadores" value="<?php echo $jugador ?>">
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="formato">FORMATO</label><br>
                        <select class="select" name="formato" id="formato">
                            <option value="físico" <?= $instalado == 'físico' ? 'selected' : '' ?>>FISICO</option>
                            <option value="digital" <?= $instalado == 'digital' ? 'selected' : '' ?>>DIGITAL</option>
                        </select>
                    </fieldset>

                    <fieldset class="noborde">
                        <label for="descripcion">DESCRIPCION</label><br>
                        <textarea class="descripcion" name="descripcion" placeholder="<?php echo $descripcion?>"></textarea>
                    </fieldset>

                    <fieldset class="noborde">
                        <label for="plataforma">PLATAFORMA</label><br>
                        <input class="input" type="text" id="plataforma" name="plataforma" value="PS4" value="<?php echo $plataforma ?>">
                    </fieldset>

                    <fieldset class="noborde">
                        <input class="boton" type="submit" name="edit" value="EDITAR">           
                    </fieldset>                    
                </form>   
              </div>              
            </div>
</html>