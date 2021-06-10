<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["id"])) {
    exit("No hay id de prospecto");
}
$id =$_GET["id"];
$bd = include_once "conexionprospectos.php";

$sentencia = $bd->prepare("UPDATE prospectos SET estado=2 WHERE id='$id';");
$resultado = $sentencia->execute();

if (!$resultado){
echo json_encode([
    "resultado" => 'FALSE' ,
]);}
else{
echo json_encode([
    "resultado" => 'OK' ,
]);
}

