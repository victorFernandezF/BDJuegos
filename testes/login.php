<?php

session_start();
$usuario = "PEPE";


$_SESSION['usuario'] = $usuario; 

header("location: testaferro.php");

?>