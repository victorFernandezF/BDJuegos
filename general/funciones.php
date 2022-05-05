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

function nombreMasBarraBaja($nombre){
    $result = str_replace(" ",'_',$nombre);
    return strtolower($result);
  }
?>