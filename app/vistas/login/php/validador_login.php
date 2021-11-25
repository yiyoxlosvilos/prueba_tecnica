<?php
	date_default_timezone_set("America/Santiago");
	require_once __dir__."/../../../modelo/obtener_datos.php";

	$mvc_datos 	= new GetDatos();
	$hoy	 	= date("d/m/Y h:i:s A");
	$usr        = $_POST["usr"];
	$pass       = $_POST["pass"];

	if(isset($usr) && isset($pass)){
			
		$result = $mvc_datos->selectQuery("SELECT * FROM usuarios 
										   WHERE 		 usuarios_nick     = '".$usr."' 
										   AND 			 usuarios_password = md5('".$pass."') 
										   AND 			 usuarios_estado   = 1");

		if(count($result) > 0){

			if(!isset($_SESSION)){
				session_start();
			}

			$tipo_usuario			 = '';
			$_SESSION["IDUSER"] 	 = $result[0]["usuarios_id"];
			$_SESSION["TIPOUSER"] 	 = $result[0]["usuarios_tipo"];
			$_SESSION["NOMBREUSER"]	 = $result[0]["usuarios_nombre"];

			if($result[0]["usuarios_tipo"]   == 1){
				$tipo_usuario	    = "Administrador";
			}else{
				$tipo_usuario	    = "Usuario";
			}
			
			if($result[0]["usuarios_tipo"] == 1 OR $result[0]["usuarios_tipo"] == 2){
				$info   = array('success' => true, 
								'msg' 	  => "Usuario Correcto", 
								'link' 	  => controlador::$rutaAPP."index.php?action=home");
			}
		}else{
			$info = array('success'=>false,'msg'=>"USUARIO DESCONOCIDO");
		}
	} else {
		$info = array('success'=>false,'msg'=>"No hay datos para comparar");
	}

	echo json_encode($info);
?>