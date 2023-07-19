<?php
include ("bd_conexion.php");

$serial = $_POST["serial"];
$nombre_equipo = $_POST["nombre"];
$ubicacion = $_POST["ubicacion"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$so = $_POST["so"];
$especificaciones = $_POST["especificaciones"];
$operativa = $_POST["operativa"];
$office = $_POST["office"];
$navegador = $_POST["navegador"];

$insertar = "INSERT INTO `computadoras` (`SerialPC`,`Nombre Equipo`,`Ubicación`,`Usuario`,`Clave`,`SO`,`Especificaciones`,`Operativa`,`Office`,`Navegador`) VALUES ('$serial','$nombre_equipo','$ubicacion','$usuario','$clave','$so','$especificaciones','$operativa','$office','$navegador')";
$resultado = mysqli_query($conn,$insertar);

if ($resultado){
    echo"<script>alert('Se ha registrado el equipo con éxito');window.location='../inicio.php';</script>";
} else{
    echo "<script>alert('No se pudo registrar')</script>";
}

?>