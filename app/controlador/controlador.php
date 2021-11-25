<?php
	class controlador {

		public static $rutaAPP = "/prueba_tecnica/";

		public function iniciar_sesion(){
			if(!isset($_SESSION)){
				session_start();
			}
			if (isset($_SESSION["IDUSER"])) {
				return true;
			}

			return false;
		}

		//USUARIOS
		public function home() {
			include_once(__dir__."/../vistas/panel_control/index.php");
		}
		public function perfil_usuario() {
			include_once(__dir__."/../vistas/panel_control/perfil.php");
		}
		public function perfil() {
			include_once(__dir__."/../vistas/panel_control/php/perfil_usuario.php");
		}
		public function tabla_usuarios() {
			include_once(__dir__."/../vistas/panel_control/php/tabla_usuarios.php");
		}

		public function menu_usuarios() {
			//$_SESSION["IDUSER"]

			if($_SESSION["TIPOUSER"] == 1){
				$botones = '<ul class="nav">
							  <li>
					            <a href="index.php?action=perfil">
					              <i class="bi bi-person-bounding-box"></i>
					              <p>Perfil</p>
					            </a>
					          </li>
					          <li>
					            <a href="index.php?action=home">
					              <i class="bi bi-person-lines-fill"></i>
					              <p>Mantenedor</p>
					            </a>
					          </li>
					        </ul>';
				$head 	 = '<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
					    		<div class="navbar-wrapper">
						            <div class="navbar-toggle">
						              <button type="button" class="navbar-toggler">
						                <span class="navbar-toggler-bar bar1"></span>
						                <span class="navbar-toggler-bar bar2"></span>
						                <span class="navbar-toggler-bar bar3"></span>
						              </button>
						            </div>
						        </div>
						        <div class="container-fluid">';
				if($_GET["action"] == "home"){
					$head   .=	'<div class="collapse navbar-collapse justify-content-end" id="navigation">
							        <span class="nuevo_usuario" href="'.controlador::$rutaAPP.'app/vistas/panel_control/php/nuevos_usuarios.php" data-fancybox data-type="iframe" data-preload="false" data-width="100%" data-height="100%">
							            <i class="bi bi-person-fill"></i>&nbsp;Nuevo Usuario
							        </span>
						          </div>';
				}else{
					$head   .=	'<div class="collapse navbar-collapse justify-content-end" id="navigation">
							        <span class="nuevo_usuario" href="'.controlador::$rutaAPP.'app/vistas/panel_control/php/editar_usuarios.php?usuario_id='.$_SESSION["IDUSER"].'&sesion='.$_SESSION["TIPOUSER"].'" data-fancybox data-type="iframe" data-preload="false" data-width="100%" data-height="100%">
							            <i class="bi bi-person-fill"></i>&nbsp;Editar Perfil
							        </span>
						          </div>';
				}

				$head   .= '       	<div class="collapse navbar-collapse justify-content-end" id="navigation">
							            <ul class="navbar-nav">
							              <li class="nav-item">
							                <a class="nav-link" href="index.php?action=cerrar">
							                  <i class="bi bi-x-square"></i>&nbsp;salir
							                </a>
							              </li>
							            </ul>
						          	</div>
				        		</div>
				      		</nav>';
			}elseif($_SESSION["TIPOUSER"] == 2){
				$botones = '<ul class="nav">
					          <li>
					            <a href="index.php?action=home">
					              <i class="bi bi-person-bounding-box"></i>
					              <p>Perfil</p>
					            </a>
					          </li>
					        </ul>';
				$head 	 = '<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
					    		<div class="navbar-wrapper">
						            <div class="navbar-toggle">
						              <button type="button" class="navbar-toggler">
						                <span class="navbar-toggler-bar bar1"></span>
						                <span class="navbar-toggler-bar bar2"></span>
						                <span class="navbar-toggler-bar bar3"></span>
						              </button>
						            </div>
						        </div>
						        <div class="container-fluid">
						        	<div class="collapse navbar-collapse justify-content-end" id="navigation">
								        <span class="nuevo_usuario" href="'.controlador::$rutaAPP.'app/vistas/panel_control/php/editar_usuarios.php?usuario_id='.$_SESSION["IDUSER"].'&sesion='.$_SESSION["TIPOUSER"].'" data-fancybox data-type="iframe" data-preload="false" data-width="100%" data-height="100%">
								            <i class="bi bi-person-fill"></i>&nbsp;Editar Perfil
								        </span>
							          </div>
						        	<div class="collapse navbar-collapse justify-content-end" id="navigation">
							            <ul class="navbar-nav">
							              <li class="nav-item">
							                <a class="nav-link" href="index.php?action=cerrar">
							                  <i class="bi bi-x-square"></i>&nbsp;salir
							                </a>
							              </li>
							            </ul>
						          	</div>
				        		</div>
				      		</nav>';
			}

			$html = '<div class="sidebar" data-color="blue">
				    	<div class="logo">
					        <div class="simple-text"><i class="bi bi-person-fill"></i>&nbsp;'.$_SESSION["NOMBREUSER"].'</div>
					    </div>
					    <div class="sidebar-wrapper" id="sidebar-wrapper">
					        '.$botones.'
					    </div>
				    </div>'.$head;

			echo $html;
		}

		//INICIO DE SESION
		public function login() {
			include_once(__dir__."/../vistas/login/login.php");
		}
		public function validar() {
			include_once(__dir__."/../vistas/login/php/validador_login.php");
		}
		//FIN INICIO DE SESION

		//FUNCION AL CERRAR SESION
		function cerrar_sesion()
		{
			if(!isset($_SESSION)){
				session_start();
			}
			session_destroy();
			header('Location: '.controlador::$rutaAPP.'index.php/login');
		}

		public function index() {
			include_once(__dir__."/../vistas/login/login.php");
		}
	}

?>