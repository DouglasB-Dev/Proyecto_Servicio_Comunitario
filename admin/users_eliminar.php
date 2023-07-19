<?php
include ("../php/bd_conexion.php");
$id = $_GET['id'];
$eliminar = "DELETE FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conn,$eliminar);

if ($resultado){
    header("Location: ../inicio.php#basededatos");
} else{
    echo "<script>alert('No se pudo eliminar');
    window.history.go(-1)</script>";
}

?>