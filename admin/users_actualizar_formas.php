<?php
include ("../php/bd_conexion.php");

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$rol = $_POST["rol"];


$actualizar = "UPDATE usuarios SET id='$id',`nombre`='$nombre',usuario='$usuario',clave='$clave',Clave='$clave',rol='$rol' WHERE id ='$id'";
$resultado = mysqli_query($conn,$actualizar);
if ($resultado){
    echo "<script>alert('Se ha actualizado el equipo con éxito, reinicie la página.'); window.location='usuarios.php#bd_usuarios';</script>";
} else {
    echo "<script>alert('No se pudo actualizar la información'); window.history.go(-1)</script>";
}

?>