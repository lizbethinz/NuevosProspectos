
<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
  $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
  
  require("conexion.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

  $conexion = conexion(); // CREA LA CONEXION
  
  // REALIZA LA QUERY A LA DB
  $resultado = mysqli_query($conexion, "SELECT rol, correo FROM usuarios WHERE correo='$params->usuario' AND password='$params->contrasena'");
 
    class Result {}
    
    // GENERA LOS DATOS DE RESPUESTA
    $response = new Result();
    
    if($resultado->num_rows > 0) {
 while ($fila = mysqli_fetch_row($resultado)) {
	$response->resultado = 'OK';
        $response->mensaje = $fila[0];
		$response->correo = $fila[1];
    }
        
    } else {
        $response->resultado = 'FAIL';
        $response->mensaje = 'Usuario o contraseña incorrectos';
    }
    
    header('Content-Type: application/json');
    
    echo json_encode($response); // MUESTRA EL JSON GENERADO
    
?>