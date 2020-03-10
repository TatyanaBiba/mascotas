<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Borrar foto de la mascota</title>
		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">
		
	</head>

	<body id="page-top">
		
		<?php 
		(TEMPLATE)::header("Borrar ejemplar");
		(TEMPLATE)::nav();
		(TEMPLATE)::login();
		?>
		
		<h2>Confirmar borrado</h2>
		
		<p>Estás a punto de borrar la foto <?=$foto->id?> de la mascota <?=$mascota->nombre?>.</p>
		
		<form method="post" action="/foto/destroy">
			
			<label>Por favor confirma el borrado:</label>
			
			<input type="hidden" name="id" value="<?=$foto->id?>">
					
			<input type="submit" name="borrar" value="Borrar"><br>	
		</form>
		
		<a href="/mascota/show/<?=$mascota->id?>">Volver a detalles de la mascota</a>
		
		<?php 
		(TEMPLATE)::footer();
		?>
		</div>
	</body>
</html>