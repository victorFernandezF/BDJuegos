<?php
include("../connection.php");
include("../funciones.php");

    $query = "SELECT * FROM juegos ORDER BY nombre";
    //echo $query;
    $arreglo = array();
    $arreglonombre = array();
    $result_tasks = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result_tasks)) {    
        array_push($arreglo, $row['imagen']);
        array_push($arreglonombre, $row['nombre']);
    };


$i=0;
$cada = 0;
$fin = 5;
$filingas = 6;
$maximo = count($arreglo);
$filas = $maximo / $filingas;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver juegos</title>
</head>
<body>
<?php
include("../connection.php");
//include("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <title>Ver Juegos</title>
</head>
<body>
    <div class="container">
        <div class="item-tabla">
            <div class="titulo">
                <h1>BD - JUEGOS</h1>
            </div>    

            <div class="menu">
                <?php include("../menuses.php") ?>
            </div>
            <div class="texto-tabla">
                <div class="divdetabla">

    <table class="cr_table2 table table-bordered, tablamatch">
        <thead>
          <tr>
            <th colspan ="6">ELIMINAR JUEGO</th>
          </tr>
        </thead>
        <tbody>
            <?php while ($i < $filas) { ?>
                <tr>
                    <?php while(($cada <= $fin )&&($cada < $maximo)){ ?>
                        <td><a href="areyousure.php?img=<?php echo $arreglo[$cada]?>"><img class="persona" src="../images/<?php echo $arreglo[$cada]; ?>.jpg" title="<?php echo $arreglonombre[$cada]; ?>" ></a></td>
                        <?php $cada++;
                    
                    } $fin = $fin+6?>
                </tr>
            <?php $i++; } ?>
        </tbody>
      </table>
                    
                </div> 
            </div>
        </div> 
    </div>
</body>
</html>