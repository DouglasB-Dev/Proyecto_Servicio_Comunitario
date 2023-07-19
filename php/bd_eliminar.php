<?php
include ("bd_conexion.php");
$id = $_GET['id'];
$eliminar = "DELETE FROM computadoras WHERE ID_computadoras = '$id'";
$resultado = mysqli_query($conn,$eliminar);

if ($resultado){
    header("Location: ../inicio.php");
} else{
    echo "<script>alert('No se pudo eliminar');
    window.history.go(-1)</script>";
}

?>