<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonProspectos = json_decode(file_get_contents("php://input"));
if (!$jsonProspectos) {
    exit("No hay datos");
}
$bd = include_once "conexionprospectos.php";

$sentencia = $bd->prepare("insert into prospectos(nombre,apellidoPaterno, apellidoMaterno,calle,numero,colonia,codigoPostal,telefono,RFC,estado,motivoRechazo ) values (?,?,?,?,?,?,?,?,?,?,?)");
$resultado = $sentencia->execute([$jsonProspectos->nombreProspecto,
$jsonProspectos->apellidoP,
$jsonProspectos->apellidoM,
$jsonProspectos->calle,
$jsonProspectos->numeroCasa,
$jsonProspectos->colonia,
$jsonProspectos->codigoPostal,
$jsonProspectos->telefono,
$jsonProspectos->rfc,
1,
'']);



if (!$resultado){
echo json_encode([
    "resultado" => 'FALSE' ,
]);}
else{
echo json_encode([
    "resultado" => 'OK' ,
]);
}

