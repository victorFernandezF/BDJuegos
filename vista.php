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
include("connection.php");
    //$array = array("1", "2", "3", "4", "5","6","7","8","9","10","11","12","13","14","15","16","17","18");
    $arreglo = array();
    $query = "SELECT imagen FROM juegos ORDER BY nombre ASC
    ";
    $result_tasks = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result_tasks)) {    
        array_push($arreglo, $row['imagen']);
    };


    $i=0;
    $cada = 0;
    $fin = 5;
    $filingas = 6;
    $maximo = count($arreglo);
    $filas = $maximo / $filingas;
    //echo "$maximo / $filingas = $filas";





//exit();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
      .titulaso{
        height:150px;
        width:150px;
      }
      .campeon{
        border: 5px solid #d81616;
        width:200px;
        height:200px;
      }
      .persona
      {
        width:166px;
        height:166px;
      }
      .personaje:hover
      {
        width:170px;
        
      }
      .papucho{
        position:relative;
      }
      .mijito{
        position:absolute; 
        top: 63px;
        left : 27px;
      }
   </style>

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
        <table class="cr_table2 table table-bordered, tablamatch">
        <thead>
          <tr>
            <th colspan ="6">JUEGOS</th>
          </tr>
        </thead>
        <tbody>
            <?php while ($i < $filas) { ?>
                <tr>
                    <?php while(($cada <= $fin )&&($cada < $maximo)){ ?>
                        <td><a href="details.php?img=<?php echo $arreglo[$cada]?>"><img class="persona" src="images/<?php echo $arreglo[$cada]; ?>.jpg" title="<?php echo $arreglo[$cada]; ?>" ></a></td>
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
</body>
</html>