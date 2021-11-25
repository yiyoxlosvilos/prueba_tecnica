<?php
	date_default_timezone_set("America/Santiago");
	require_once __dir__."/../../../modelo/obtener_datos.php";

	$mvc_datos 	  = new GetDatos();
	$accion       = $_REQUEST['accion'];

	switch ($accion) {
		case 'nuevo':
			$inputNombre 	= $_REQUEST['inputNombre'];
			$inputMail 		= $_REQUEST['inputMail'];
			$inputNick 		= $_REQUEST['inputNick'];
			$inputTipo 		= $_REQUEST['inputTipo'];
			$inputPassword 	= $_REQUEST['inputPassword'];
			$hash_pass 		= md5($inputPassword);

			$grabar         = $mvc_datos->insert_query("INSERT INTO usuarios(usuarios_nombre, usuarios_mail, usuarios_nick, usuarios_password, usuarios_tipo, usuarios_estado) VALUES('$inputNombre', '$inputMail', '$inputNick', '$hash_pass', '$inputTipo', 1)");

			if($grabar){
				echo '<p align="center">Usuario Grabado Correctamente</p>';
				echo '<p align="center"><button type="button" class="btn btn-default" data-dismiss="modal" onclick="parent.location.reload()">OK</button></p>';
			}

			break;

		case 'editar':
			$id_usuario 	= $_REQUEST['id_usuario'];
			$inputNombre 	= $_REQUEST['inputNombre'];
			$inputMail 		= $_REQUEST['inputMail'];
			$inputNick 		= $_REQUEST['inputNick'];
			$inputTipo 		= $_REQUEST['inputTipo'];
			$inputPassword 	= $_REQUEST['inputPassword'];

			if(strlen($inputPassword) > 0){
				$hash_pass = md5($inputPassword);
				$editar    = $mvc_datos->update_query("UPDATE usuarios
													   SET    usuarios_nombre	= '$inputNombre',
													   	   	  usuarios_mail		= '$inputMail',
													   	      usuarios_nick		= '$inputNick',
													   	      usuarios_password	= '$hash_pass',
													   	      usuarios_tipo		= '$inputTipo'
													   WHERE  usuarios_id 		= $id_usuario");
			}else{
				$editar = $mvc_datos->update_query("UPDATE usuarios
													SET    usuarios_nombre	= '$inputNombre',
														   usuarios_mail	= '$inputMail',
														   usuarios_nick	= '$inputNick',
														   usuarios_tipo	= '$inputTipo'
													WHERE  usuarios_id 		= $id_usuario");
			}

			if($editar){
				echo '<p align="center">Usuario Editado Correctamente</p>';
				echo '<p align="center"><button type="button" class="btn btn-default" data-dismiss="modal" onclick="parent.location.reload()">OK</button></p>';
			}

			break;

		case 'eliminar':
			$id_usuario = $_REQUEST['id_usuario'];
			$delete 	= $mvc_datos->delete_query("DELETE FROM usuarios WHERE usuarios_id=$id_usuario");

			if($delete){
				echo '<p align="center">Eliminado Correctamente</p>';
				echo '<p align="center"><button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">OK</button></p>';
			}
			break;
		case 'comprobar_nick':
			$id_usuario = $_REQUEST['id_usuario'];
			$delete 	= $mvc_datos->delete_query("DELETE FROM usuarios WHERE usuarios_id=$id_usuario");

			if($delete){
				echo '<p align="center">Eliminado Correctamente</p>';
				echo '<p align="center"><button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">OK</button></p>';
			}
			break;
			
		default:
			echo '<script>location.reload()</script>';
			break;
	}
?>