<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if(isset($_FILES['imagenPropia'])){

		$imagen_tipo = $_FILES['imagenPropia']['type'];
		$imagen_nombre = date('m-d-Y_hia').$_FILES['imagenPropia']['name'];
		$directorio_final = "DocumentosProspectos/".$imagen_nombre; 
		

		if($imagen_tipo == "image/jpeg" || $imagen_tipo == "image/jpg" || $imagen_tipo == "image/png" || $imagen_tipo == 'application/pdf'){

		

			if(move_uploaded_file($_FILES['imagenPropia']['tmp_name'], $directorio_final)){

				$data = array(
					'status' => 'success',
					'code' => 200,
					'msj' => $directorio_final,
					'tipo' => $imagen_tipo,
				);
		
				$format = (object) $data;
				$json = json_encode($format); 
				echo $json; 

			}else{

				$data = array(
					'status' => 'error',
					'code' => 400,
					'msj' => 'Error al mover imagen al servidor'
				);
				$format = (object) $data;
				$json = json_encode($format); 
				echo $json; 

			}

		}else{

			$data = array(
				'status' => 'error',
				'code' => 500,
				'msj' => 'Formato no soportado'
			);
			$format = (object) $data;
			$json = json_encode($format); 
			echo $json; 

		}

	}else{

		$data = array(
			'status' => 'error',
			'code' => 400,
			'msj' => 'No se recibio ninguna imagen'
		);
		$format = (object) $data;
		$json = json_encode($format); 
		echo $json; 

	}
