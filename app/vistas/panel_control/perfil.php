<?php
	$mvc2 = new controlador();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/vistas/panel_control/asset/css/css.css">
	<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/recursos/css/utilidades.css">
	<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/recursos/css/todo.css">
</head>
<body>
	<div class="wrapper">
<?php
	$mvc2->menu_usuarios();
?>
		<div class="main-panel" id="main-panel">
			<div class="entero">
<?php 
		$mvc2->perfil();
?>
			</div>
		</div>
    </div>
</body>
</html>