<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "conexionprospectos.php";
$sentencia = $bd->query("SELECT id,nombre,apellidoPaterno, apellidoMaterno,calle,numero,colonia,codigoPostal,telefono,RFC,
case estado
when 1 then 'Enviado'
when 2 then 'Aceptado'
when 3 then 'Rechazado'
else 'Desconocido'
End estado,motivoRechazo FROM prospectos where estado = 1;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);