<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registro de mascota</title>
		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">

		<style>
		  form label{
		      display: inline-block;
		      min-width: 100px;
		      padding: 5px;
		  }
		</style>

	</head>
	
	<body id="page-top">

		<?php 
		  (TEMPLATE)::header("Registro de mascota");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Nueva mascota</h2>
		
		<form method="post" action="/mascota/store">
			<label>Raza</label>
			<select class="form-control col-md-8" name="idraza">
    			<?php 
    			foreach ($razas as $raza)
    			    echo "<option value='$raza->id'>$raza->tipo $raza->raza</option>";
		
    			?>
    		</select>
			<br>
			<label>Nombre</label>
			<input type="text" name="nombre">
			<br>
			<label>Sexo</label>
				<input type="radio" name="sexo" value="m" checked>
				<label>Macho</label>
				<input type="radio" name="sexo" value="h">
    			<label>Hembra</label>
			<br>
			<label>Fechanacimiento</label>
			<input type="date" name="fechanacimiento">
			<br>
			<label>Fechafallecimiento</label>
			<input type="date" name="fechafallecimiento">
			<br>
			<label>Biografia</label>
			<input type="text" name="biografia">
			<br>

			<input type="submit" name="guardar" value="Guardar">
		</form>
		<br>
		<a href="/mascota/list">Volver al listado del mascotas</a>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
    </div>		
	</body>
</html>








