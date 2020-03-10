<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar datos del mascota <?=$mascota->nombre?></title>
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
		  (TEMPLATE)::header("Actualizar datos del mascota");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
				
		<h2>Formulario de edición</h2>
		<p><?="$mascota->nombre ($mascota->id)"?></p>
		
		<?=empty( $GLOBALS['mensaje'])? "" : "<p>". $GLOBALS['mensaje']."</p>"?>

		<form method="post" action="/mascota/update">
		
		    <!-- id del usuario a modificar -->
			<input type="hidden" name="id" value="<?=$mascota->id?>">
		
			
			<label>Nombre de mascota</label>
			<input type="text" name="nombre" value="<?=$mascota->nombre?>">
			<br>
			<label>Raza</label>
			<select name="idraza">
    			<?php 
    			foreach ($razas as $raza)
    			    echo "<option value='$raza->id'>$raza->tipo $raza->raza</option>";
		
    			?>	
    		</select>
			<br>
			<label>Sexo</label>
				<input type="radio" name="sexo" value="m" <?=empty($sexo) || $sexo=='m'? 'checked' : '';?>>
    				<label>Macho</label>
    				<input type="radio" name="sexo" value="h" <?=!empty($sexo) && $sexo=='h'? 'checked' : '';?>>
    			<label>Hembra</label>
			<br>
			<label>Fechanacimiento</label>
			<input type="date" name="fechanacimiento" value="<?=$mascota->fechanacimiento?>">
			<br>
			<label>Fechafallecimiento</label>
			<input type="date" name="fechafallecimiento" value="<?=$mascota->fechafallecimiento?>">
			<br>
			<label>Biografia</label>
			<input type="text" name="biografia" value="<?=$mascota->biografia?>">
			<br>		
			<input type="submit" name="actualizar" value="Actualizar">
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








