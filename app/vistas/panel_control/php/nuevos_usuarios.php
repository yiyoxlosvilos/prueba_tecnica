<?php
	date_default_timezone_set("America/Santiago");
	require_once __dir__."/../../../controlador/controlador.php";
	require_once __dir__."/../../../modelo/obtener_datos.php";

	$mvc 		  = new controlador();
	$mvc_datos 	  = new GetDatos();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/recursos/css/utilidades.css">
<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/vistas/panel_control/asset/css/css.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?= controlador::$rutaAPP ?>app/recursos/js/utilidades.js"></script>
<div class="editar_usuario">
	<span class="titulo_con_color">Nuevo Usuario</span>
	<div id="mensaje">&nbsp;</div>
	<div class="fondo_formulario">
	  <div class="form-row">
	    <div class="form-group col-md-5">
	      <label for="inputNombre">Nombre</label>
	      <input type="text" class="form-control" id="inputNombre" placeholder="Nombre">
	    </div>
	    <div class="form-group col-md-5">
	      <label for="inputMail">E-Mail</label>
	      <input type="email" class="form-control" id="inputMail" placeholder="E-mail">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-5">
	      <label for="inputNick">Nick</label>
	      <input type="text" class="form-control" id="inputNick" placeholder="Nick">
	    </div>
	    <div class="form-group col-md-5">
	      <label for="inputTipo">Tipo Usuario</label>
	      <select id="inputTipo" class="form-control">
	        <option value="0">Elegir Tipo</option>
	<?php
			$tipo_usr = $mvc_datos->selectQuery("SELECT * FROM tipo_usuarios 
											     WHERE 		   tipo_estado = 1");

			for($i=0; $i < count($tipo_usr); $i++){
				echo '<option value="'.$tipo_usr[$i]["tipo_id"].'">'.$tipo_usr[$i]["tipo_nombre"].'</option>';
			}
	?>
	      </select>
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-5">
	      	<div id="cambia_pass" class="oculto">
		      <label for="inputPassword">Password</label>
		      <input type="password" class="form-control" id="inputPassword" placeholder="password" value="">
		    </div>
	    </div>
	  </div>
	  <div class="form-group col-md-4">
	    <button type="button" class="btn btn-primary" onclick="grabar_usuario()">Grabar Usuario</button>
	  </div>
	</div>
</div>
<script>
	function grabar_usuario(){
		let inputNombre 		= document.getElementById('inputNombre').value;
		let inputMail 			= document.getElementById('inputMail').value;
		let inputNick 			= document.getElementById('inputNick').value;
		let inputTipo 			= document.getElementById('inputTipo').value;
		let inputPassword 		= document.getElementById('inputPassword').value;
		var accion     			= "nuevo";

		if(inputNombre.length == 0){
			$("#mensaje").html("** Ingresar Nombre **");
			$("#inputNombre").focus();
		} else if(inputMail.length == 0){
			$("#mensaje").html("** Ingresar E-Mail **");
			$("#inputMail").focus();
		} else if(inputNick.length == 0){
			$("#mensaje").html("** Ingresar Nick **");
			$("#inputNick").focus();
		} else if(inputTipo.length == 0){
			$("#mensaje").html("** Seleccionar Tipo de Usuario **");
			$("#inputTipo").focus();
		}  else if(inputPassword.length < 8){
			$("#mensaje").html("** Debes Ingresar Password mayor a 8 caracteres**");
			$("#inputPassword").focus();
		} else {
			$('.editar_usuario').html("Comprobando Informacion...");
			$('.editar_usuario').load("<?= controlador::$rutaAPP ?>app/vistas/panel_control/php/validador_usuarios.php", {inputNombre:inputNombre, inputMail:inputMail, inputNick:inputNick, inputTipo:inputTipo, inputPassword:inputPassword, accion:accion});
		}
	}
</script>