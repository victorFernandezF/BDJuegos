<?php
session_start();

echo "<a href='login.php'> LOGUEARSE </a><br><br>";
echo "<a href='logout.php'> SALIRSE </a><br><br>";


if (!isset($_SESSION['usuario'])){
    echo "<h1>HOLA USUARIO DESCONOCIDO</h1>";
}else{
    $usuario = $_SESSION['usuario'];
    echo "<h1>HOLA $usuario </h1>";
}








?>