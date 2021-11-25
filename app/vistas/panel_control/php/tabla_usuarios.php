<link rel="stylesheet" type="text/css" href="<?= controlador::$rutaAPP ?>app/vistas/panel_control/asset/css/css.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php
	date_default_timezone_set("America/Santiago");
	require_once __dir__."/../../../modelo/obtener_datos.php";
	$url        = "";

	$mvc_datos 	= new GetDatos();

	$result		= $mvc_datos->selectQuery("SELECT * FROM usuarios 
										   								 WHERE 		 		 usuarios_estado   = 1");
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">E-Mail</th>
      <th scope="col">Nick</th>
      <th scope="col">Tipo</th>
      <th scope="col" colspan="2">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
<?php
	$j = 1;
	for($i=0; $i < count($result); $i++){ 

		if($_SESSION['IDUSER'] == $result[$i]["usuarios_id"]){
			$panel = '<td><a href="'.controlador::$rutaAPP.'app/vistas/panel_control/php/editar_usuarios.php?usuario_id='.$result[$i]["usuarios_id"].'&sesion=1" data-fancybox data-type="iframe" data-preload="false" data-width="100%" data-height="100%"><i class="bi bi-pencil-square icono_azul"></i></a></td>
		      			<td>&nbsp;</td>';
		}else{
			$panel = '<td><a href="'.controlador::$rutaAPP.'app/vistas/panel_control/php/editar_usuarios.php?usuario_id='.$result[$i]["usuarios_id"].'&sesion=1" data-fancybox data-type="iframe" data-preload="false" data-width="100%" data-height="100%"><i class="bi bi-pencil-square icono_azul"></i></a></td>
		      <td><a data-href="'.$result[$i]["usuarios_id"].'" data-toggle="modal" data-target="#confirm-delete"><i class="bi bi-person-x-fill icono_rojo"></i></a></td>';
		}

		echo '<tr>
		      <th scope="row">'.$j++.'</th>
		      <td>'.$result[$i]["usuarios_nombre"].'</td>
		      <td>'.$result[$i]["usuarios_mail"].'</td>
		      <td>'.$result[$i]["usuarios_nick"].'</td>
		      <td>'.$result[$i]["usuarios_tipo"].'</td>
		      '.$panel.'
		    </tr>';
	}
?>
  </tbody>
</table>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      	</div>
      	<div class="modal-body" id="mensaje">
        	<p>Desea Eliminar este Usuario?</p>
        	<input type="hidden" name="id_usuario" id="id_usuario" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Cancelar</button>
        	<button type="button" class="btn btn-danger btn-ok" onclick="eliminar_usuario()">Eliminar</button>
        </div>
    	</div>
	</div>
</div>
<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
		var url = $(e.relatedTarget).data('href');
	  $('#id_usuario').val(url);
	});

	function eliminar_usuario(){
		let id_usuario = document.getElementById('id_usuario').value;
		var accion     = "eliminar";

		$(".modal-footer").toggle();
		$('#mensaje').html(id_usuario);
		$('#mensaje').load("<?= controlador::$rutaAPP ?>app/vistas/panel_control/php/validador_usuarios.php", {id_usuario:id_usuario, accion:accion});
	}
</script>