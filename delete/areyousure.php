<?php
include("../connection.php");
include("../funciones.php");

 if (!isset($_GET['id']) AND !isset($_GET['img'])) {
    header("Location: ../index.php");
    exit();
} 
 if (isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM juegos WHERE id = $id LIMIT 1";
  $result = mysqli_query($conn, $query);
}
if (isset($_GET['img'])){
    $img = $_GET['img'];
    $query = "SELECT * FROM juegos WHERE imagen = '$img' LIMIT 1";
    $result = mysqli_query($conn, $query);
  } 

//  $query = "SELECT * FROM juegos WHERE id = $id LIMIT 1";
  $result = mysqli_query($conn, $query);
  $result_tasks = mysqli_query($conn, $query);    
    $row = mysqli_fetch_assoc($result_tasks);
//echo $row['nombre'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de <?php echo ucwords(strtolower($row['nombre']))?></title>
</head>
<body>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    
    <style>
        .persona
        {
            width:166px;
            height:166px;
         }

        .details-cont{
            border: 3px solid black;
            width: 615px;
            /*height: 285px;*/
            margin-right: 17px;
            /*background-color: #e3e3e3;*/
            background: linear-gradient(90deg, rgba(181,181,181,1) 0%, rgba(250,250,250,1) 54%, rgba(255,255,255,1) 100%);


        }
        .details-todo{
            width: 615px;
            margin-right: 17px;
            display: flex;
            flex-direction: row;

        }
        .details-image-total{
            border-right: 2px solid black;
            width: 178px;
            padding-bottom: 11px;
            display: flex;
            justify-content: center;
            align-items:center

        }
        .details-datas{
            width: 433px;
            padding-bottom: 11px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .details-descripcion{
            border-top: 2px solid black;
            width: 607px;
            margin-right: 17px;
            background: rgb(181,181,181);
            background: linear-gradient(180deg, rgba(181,181,181,1) 0%, rgba(250,250,250,1) 61%, rgba(255,255,255,1) 100%);
            font-size:18px;
            padding-bottom:11px;
            padding-right:4px;
            padding-left:4px;
            text-align:center;

        }
        td{
         text-transform:uppercase;   
        }
        strong{
            
        }
        .nombre{
            text-transform:uppercase;
            font-size:20px;
            
         
        }
        .name{
            height:34px
        }
    </style>
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
                    <div class="details-cont">
                        <div class="details-todo">
                            <div class="details-image-total">
                                <img class="persona" src="../images/<?php echo $row['imagen'];?>.jpg">
                            </div>
                            <div class="details-datas">
                                <table>
                                    <tr class="name">
                                        <td colspan=2>
                                            <span class="gamename">
                                                <strong class="nombre"><?php echo $row['nombre']; ?></strong>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>genero:</strong></td>
                                        <td><?php echo $row['genero']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>jugadores:</strong></td>
                                        <td><?php echo convertirjugadores($row['jugadores']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>espacio mínimo:</strong></td>
                                        <td><?php echo $row['espacio']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>plataforma:</strong></td>
                                        <td><?php echo $row['plataforma']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>instalado:</strong></td>
                                        <td><?php echo $row['instalado']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>FORMATO:</strong></td>
                                        <td><?php echo $row['formato']; ?></td>
                                    </tr>
                                </table>
                                
                            </div>

                        </div>


                        <div class="details-descripcion">
                            <h3>¿STÁS SEGURO?</h3>
                            Si continua, este juego será eliminado definitivamente.<br><br>
                            <a href="deletegame.php?id=<?php echo $row['id']?>"><button class="borrar">BORRAR</button></a>
                            <a href="deletelist.php"><button class="volver">VOLVER</button></a>
                            
                        </div>

                    </div>
                    
                    
                </div> 
            </div>
        </div> 
    </div>
</body>
</html>