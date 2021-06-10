<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["busqueda"])) {
    exit("No hay id de prospecto");
}
$busqueda =$_GET["busqueda"];
$bd = include_once "conexionprospectos.php";
$sql =$bd->query("SELECT id, nombre,apellidoPaterno, apellidoMaterno,calle,numero,colonia,codigoPostal,telefono,RFC,
case estado
when 1 then 'Enviado'
when 2 then 'Aceptado'
when 3 then 'Rechazado'
else 'Desconocido'
End estado, estado estadoInt, motivoRechazo FROM prospectos WHERE RFC LIKE '%$busqueda%'; ");
$resultado = $sql ->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);