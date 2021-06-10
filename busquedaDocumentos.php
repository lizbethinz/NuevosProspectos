<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["busqueda"])) {
    exit("No hay id de prospecto");
}
$busqueda =$_GET["busqueda"];
$bd = include_once "conexionprospectos.php";
$sql =$bd->query("SELECT nombre nombreDocumento, url src FROM Documentos WHERE idProspecto LIKE '%$busqueda%'; ");
$resultado = $sql ->fetchAll(PDO::FETCH_OBJ);
echo json_encode($resultado);