<?php
include("connection.php");
include("funciones.php");

if (!isset($_GET['id']) AND !isset($_GET['img'])) {
  header("Location: index.php");
  exit();
} 
if (isset($_GET['id'])){
$id = $_GET['id'];

}
if (isset($_GET['img'])){
  $img = $_GET['img'];
  $query = "SELECT id FROM juegos WHERE imagen = '$img' LIMIT 1";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $id= $row['id'];
} 
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
    $imagen = nombreMasBarraBaja($nombre);

    $uppernombre = strtoupper($nombre);  
    $plataforma = strtoupper($plataforma1);  

    $cambiaimagen = isset($_POST['contender']) ? "on" : "off";    
   
   
    if($cambiaimagen == "off"){
      $query = "UPDATE juegos SET nombre = '$nombre', genero = '$genero', instalado = '$instalado', espacio = '$espacio', jugadores = '$jugadores', formato = '$formato', descripcion = '$descripcion', plataforma = '$plataforma' WHERE id = $id";
      mysqli_query($conn, $query);
      header('Location: editselect.php?todos=si');
    }
    if($cambiaimagen == "on"){
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check if image file is a actual image or fake image
      
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      
      
      // Check if file already exists
      if (file_exists($target_file)) {
        unlink($target_file);
        //echo "Sorry, file already exists.";
        $uploadOk = 1;
      }
      
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      
      
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      rename($target_file, "images/$imagen.jpg");
      
      //exit();
      
      
      
      $query = "UPDATE juegos SET nombre = '$nombre', genero = '$genero', instalado = '$instalado', espacio = '$espacio', jugadores = '$jugadores', formato = '$formato', descripcion = '$descripcion', plataforma = '$plataforma', imagen ='$imagen' WHERE id = $id";
      mysqli_query($conn, $query);
  }
    //echo "<script>window.history.back()</script>";
    //echo "<script>window.history.back()<script>";
    header('Location: editselect.php?todos=si');

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
    <title>Editar</title>
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
                        <textarea class="descripcion" name="descripcion"><?php echo $descripcion?></textarea>
                    </fieldset>

                    <fieldset class="noborde">
                        <label for="plataforma">PLATAFORMA</label><br>
                        <input class="input" type="text" id="plataforma" name="plataforma" value="PS4" value="<?php echo $plataforma ?>">
                    </fieldset>
                    <fieldset class="noborde">
                                    <label for="switch">MODIFICAR IMAGEN</label><br>
                                    <label class="switch">
                                        <input type="checkbox" name="contender" id="contender">
                                        <div class="slider"></div>
                                    </label>
                    </fieldset>
                    <fieldset class="noborde">
                        <label for="plataforma">Select image to upload:</label><br>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </fieldset>

                    <fieldset class="noborde">
                        <input class="boton" type="submit" name="edit" value="EDITAR">           
                    </fieldset>                    
                </form>   
              </div>              
            </div>
</html>