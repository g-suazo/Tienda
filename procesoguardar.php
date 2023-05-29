<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$phone = $_POST['phone'];
$correo = $_POST['correo'];
$detalle = $_POST['detalle'];

$query = "INSERT INTO consultas (nombre,phone,correo,detalle) VALUES('$nombre','$phone','$correo','$detalle')";
$resultado = $conexion->query($query);

if ($resultado){
    echo "Se envio la consulta";
} else {
    echo "No se envio la consulta";
}

?>

<a href="contacto.php">Enviar otra consulta</a>