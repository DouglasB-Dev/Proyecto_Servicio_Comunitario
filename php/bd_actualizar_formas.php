<?php
include ("bd_conexion.php");

$id = $_POST["ID_computadoras"];
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

$actualizar = "UPDATE computadoras SET SerialPC='$serial',`Nombre Equipo`='$nombre_equipo',Ubicación='$ubicacion',Usuario='$usuario',Clave='$clave',SO='$so',Especificaciones='$especificaciones',Operativa='$operativa',Office='$office',Navegador='$navegador' WHERE ID_computadoras ='$id'";
$resultado = mysqli_query($conn,$actualizar);
if ($resultado){
    echo "<script>alert('Se ha actualizado el equipo con éxito, reinicie la página.'); window.location='../inicio.php#basededatos';</script>";
} else {
    echo "<script>alert('No se pudo actualizar la información'); window.history.go(-1)</script>";
}

?>