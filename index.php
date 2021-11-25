<?php
	date_default_timezone_set("America/Santiago");
	require_once __dir__."/app/controlador/controlador.php";

	$mvc 		= new controlador();

	if($mvc->iniciar_sesion()){
		
		if(isset($_GET["action"]) && $_SESSION["TIPOUSER"] == 1){ 
			switch($_GET["action"]){
				case 'home':
					$mvc->home();
					break;
				case 'perfil':
					$mvc->perfil_usuario();
					break;
				case 'cerrar':
					$mvc->cerrar_sesion();
					break;
				default:
					$mvc->home();
					break;
			}
		}elseif(isset($_GET["action"]) && $_SESSION["TIPOUSER"] == 2){
			switch($_GET["action"]){
				case 'home':
					$mvc->perfil_usuario();
					break;
				case 'cerrar':
					$mvc->cerrar_sesion();
					break;

				default:
					$mvc->perfil_usuario();
					break;
			}
		}else{
			$mvc->home();		
		}
	}else{
		if(isset($_GET["action"])){
			switch($_GET["action"]){

				//ACCIONES SIN INICIAR SESION
				case 'login':
					$mvc->login();
					break;
						
				case 'validar':
					$mvc->validar();
					break;					
				default:
					$mvc->index();
					break;
			}
		} else {
			$mvc->index();
		}
	}
?>