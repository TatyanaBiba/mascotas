<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Subida de una nueva Foto</title>
		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">

	</head>

	<body id="page-top">
		
		<?php 
		(TEMPLATE)::header("Nueva foto");
		(TEMPLATE)::nav();
		(TEMPLATE)::login();
		?>
		
		<h2>Nueva foto</h2>
		
		<form method="post" action="/foto/store" enctype="multipart/form-data">
			<input type="hidden" name="idmascota" value="<?=$mascota->id?>">
			
			<label>Imagen</label>
			<input type="file" name="imagen"><br>
			
			<label>Ubicación</label>
			<input type="text" name="ubicacion"><br>
			
						
			<input type="submit" name="guardar" value="Guardar"><br>
		</form>
		
		<a href="/mascota/show/<?=$mascota->id?>">Volver a detalles</a>
		
		<?php 
		(TEMPLATE)::footer();
		?>
		</div>
	</body>
</html>