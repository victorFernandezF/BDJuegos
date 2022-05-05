<?php
include("../connection.php");
include("../funciones.php");
if(!isset($_SESSION['usuario'])){
  header("location:../index.php");
}
if (!isset($_GET['id'])) {
  header("Location: ../index.php");
  exit();
} 

$id = $_GET['id'];

$query = "DELETE FROM juegos WHERE id = $id";
//echo $query;
$result = mysqli_query($conn, $query);
header('Location: deletelist.php');














?>