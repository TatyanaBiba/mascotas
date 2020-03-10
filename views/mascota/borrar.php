<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Baja de mascota</title>
		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
		  <link href="/css/sb-admin-2.min.css" rel="stylesheet">
		  
	</head>
	<body id="page-top">

		<?php 
		  (TEMPLATE)::header("Baja de mascota");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Confirmar baja de mascota</h2>
		<p><?="$mascota->nombre($mascota->id)"?></p>

		<form method="post" action="/mascota/destroy">
			<p>Confirmar el borrado del mascota <?=$mascota->id?>.</p>
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="submit" name="borrar" value="Borrar">
		</form>
		<br>
		<a href="/mascota/show/<?=$mascota->id?>">Detalles</a> -
		<a href="/mascota/list">Volver al listado de mascotas</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
		</div>
	</body>
	
</html>








