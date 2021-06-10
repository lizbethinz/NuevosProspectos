<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonProspectos = json_decode(file_get_contents("php://input"));
if (!$jsonProspectos) {
    exit("No hay datos");
}
$bd = include_once "conexionprospectos.php";

$sentencia = $bd->prepare("insert into documentos(idProspecto,nombre, url) values (?,?,?)");
$resultado = $sentencia->execute([$jsonProspectos->idProspecto,$jsonProspectos->nombre,$jsonProspectos->url]);

if (!$resultado){
echo json_encode([
    "resultado" => 'FALSE' ,
]);}
else{
echo json_encode([
    "resultado" => 'OK' ,
]);
}

