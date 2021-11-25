<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="<?= controlador::$rutaAPP ?>app/vistas/login/asset/js/js.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/vistas/login/asset/css/css.css">
	<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/recursos/css/utilidades.css">
</head>
<body>
	<input type="hidden" name="url_link" id="url_link" value="<?= controlador::$rutaAPP ?>">
	<div class="entero">
		<div class="container-login">
			<div class="wrap-login p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login-form validate-form" id="miform">
					<span class="login-form-title">Login:</span>
					<div id="mensaje">&nbsp;</div>
					<div class="wrap-input validate-input m-b-23" data-validate = "Username is reauired">
						<input class="input" type="text" name="usuario" placeholder="Ingresa tu Usuario" id="usuario" autocomplete="off">
						<span class="focus-input"></span>
					</div>
					<div class="wrap-input validate-input" data-validate="Password is required">
						<input class="input" type="password" name="contrasena" placeholder="Ingresa tu Contrase&ntilde;a" id="contrasena" autocomplete="off">
						<span class="focus-input"></span>
					</div>
					<div class="container-login-form-btn">
						<div class="wrap-login-form-btn">
							<div class="login-form-btn" onclick="ingresar()">Ingresar</div>
						</div>
					</div>
					<div class="txt1 text-center p-t-54 p-b-15">
						<table class="table table-striped">
							<tr>
								<th>Usuario</th>
								<th>Contrase&ntilde;a</th>
							</tr>
							<tr>
								<td align="center">usuario</td>
								<td align="center">rWHsmLg8r</td>
							</tr>
							<tr>
								<td align="center">administrador</td>
								<td align="center">1eYxI2U5k</td>
							</tr>
						</table>
					</div>
					<div class="txt1 text-center p-t-54 p-b-15">
						<p align="center">Mauricio Villalobos Tordecilla</p>
                  		<p align="center">&copy;<?= date("Y") ?></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>