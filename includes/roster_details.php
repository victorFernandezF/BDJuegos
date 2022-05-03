<?php
$buscar = $_GET["img"];
include ("../includes/conecsion.php");
include ("../includes/functions.php");

$query = "SELECT * FROM roster_chorri WHERE imagen='$buscar'";
  $result = mysqli_query($conn, $query);
   
  if (mysqli_num_rows($result) == 1) { 
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $sexo = $row['setso'];
    $altura = $row['altura'];
    $peso = $row['peso'];
    $media = $row['media'];
    $fecha = $row['fechaNacimiento'];
    $contrato = $row['contrato'];
    $real = $row['nreal'];
   }
   if($sexo == "H"){
       $sexito = "HOMBRE";
   }else{
       $sexito = "MUJER";
   }
   $edad = calculaedad($fecha);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../includes/estilos.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FICHA DE <?php echo $nombre?></title>
</head>
<body>
    <div class="contenedor">

<div class="view-contenido">
            <div class="view-titulo">
                <h1><?php echo $nombre?></h1>
            </div>
            <div class="view-formulo">
                <table class="view_table">
                    <tr>
                        <td>
                            <img src="../../../wwesupernews/roster/<?php echo $buscar?>.png" width="200px">
                        </td>
                        <td class="td">
                            <table class="view_table2">
                                <tr>
                                    <td class="n">NOMBRE REAL:</td>
                                    <td class="n2"><?php echo $real?></td>
                                </tr>
                                <tr>
                                    <td class="n">sexo:</td>
                                    <td class="r"><?php echo $sexito?></td>
                                </tr>
                                <tr>
                                    <td class="n">edad:</td>
                                    <td class="r"><?php echo "$edad AÑOS"?></td>
                                </tr>
                                <tr>
                                    <td class="n">altura:</td>
                                    <td class="r"><?php echo "$altura m"?></td>
                                </tr>
                                <tr>
                                    <td class="n">peso:</td>
                                    <td class="r"><?php echo "$peso Kg"?></td>
                                </tr>
                                <tr>
                                    <td class="n">media:</td>
                                    <td class="r"><?php echo $media?></td>
                                </tr>
                                <tr>
                                    <td class="n">contrato:</td>
                                    <td class="n2"><?php echo $contrato?></td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>
</html>




?>