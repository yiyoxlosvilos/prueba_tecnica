function ingresar(){
	let user 	 = document.getElementById('usuario').value;
	let pass 	 = document.getElementById('contrasena').value;
	let url_link = document.getElementById('url_link').value;

	if(user.length == 0){
		$("#mensaje").html("** Ingresar Usuario **");
		$("#usuario").focus();
	} else if(pass.length == 0){
		$("#mensaje").html("** Ingresar Password **");
		$("#contrasena").focus();
	} else {
		$.ajax({
	        dataType: "json",
	        url:  url_link+"index.php?action=validar",
	        type: "POST",
	        data: {	usr:  user,
	        	   	pass: pass
	        	  },
	        success: function(data){
	          if (data.success == false) {

	            $("#mensaje").html("Usuario Ingresado y/o Contrase&ntilde;a no son compatibles");
	           setTimeout( "$('#mensaje').html('');", 3000);
	          } else {
	            window.location=data.link;
	          }
	        },
	        error: function(response) {
	          $("#mensaje").html(response.responseText);
	        }
		});
	}
}