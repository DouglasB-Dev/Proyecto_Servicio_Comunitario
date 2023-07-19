<?php
include ("../php/bd_conexion.php");

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$rol = $_POST["rol"];


$insertar = "INSERT INTO `usuarios` (`nombre`,`usuario`,`clave`,`rol`) VALUES ('$nombre','$usuario','$clave','$rol')";
$resultado = mysqli_query($conn,$insertar);

if ($resultado){
    echo"<script>alert('Se ha registrado el equipo con éxito');window.location='usuarios.php';</script>";
} else{
    echo "<script>alert('No se pudo registrar')</script>";
}

?>