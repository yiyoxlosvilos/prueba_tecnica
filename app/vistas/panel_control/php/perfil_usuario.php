<?php
	date_default_timezone_set("America/Santiago");
	require_once __dir__."/../../../controlador/controlador.php";
	require_once __dir__."/../../../modelo/obtener_datos.php";

	$id_usuario   = $_SESSION['IDUSER'];

	$mvc 		  = new controlador();
	$mvc_datos 	  = new GetDatos();
	$result		  = $mvc_datos->selectQuery("SELECT * FROM usuarios 
										     WHERE 		   usuarios_id = $id_usuario");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/recursos/css/utilidades.css">
<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/vistas/panel_control/asset/css/css.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?= controlador::$rutaAPP ?>app/recursos/js/utilidades.js"></script>
<div class="editar_usuario">
	<span class="titulo_con_color">Mis Datos</span>
	<div id="mensaje">&nbsp;</div>
	<div class="fondo_formulario">
	  <div class="form-row">
	    <div class="form-group col-md-5">
	      <label for="inputNombre">Nombre</label>
	      <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" value="<?= $result[0]["usuarios_nombre"] ?>" disabled="disabled">
	    </div>
	    <div class="form-group col-md-5">
	      <label for="inputMail">E-Mail</label>
	      <input type="email" class="form-control" id="inputMail" placeholder="E-mail" value="<?= $result[0]["usuarios_mail"] ?>" disabled="disabled">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-5">
	      <label for="inputNick">Nick</label>
	      <input type="text" class="form-control" id="inputNick" placeholder="Nick" value="<?= $result[0]["usuarios_nick"] ?>" disabled="disabled">
	    </div>
	    <div class="form-group col-md-5">
	      <label for="inputTipo">Tipo Usuario</label>
	      <select id="inputTipo" class="form-control" disabled="disabled">
	        <option value="0">Elegir Tipo</option>
	<?php
			$tipo_usr = $mvc_datos->selectQuery("SELECT * FROM tipo_usuarios 
											     WHERE 		   tipo_estado = 1");

			for($i=0; $i < count($tipo_usr); $i++){
				if($tipo_usr[$i]["tipo_id"] == $result[0]["usuarios_tipo"]){
					echo '<option value="'.$tipo_usr[$i]["tipo_id"].'" selected>'.$tipo_usr[$i]["tipo_nombre"].'</option>';
				}else{
					echo '<option value="'.$tipo_usr[$i]["tipo_id"].'">'.$tipo_usr[$i]["tipo_nombre"].'</option>';
				}
			}
	?>
	      </select>
	    </div>
	  </div>
	</div>
</div>