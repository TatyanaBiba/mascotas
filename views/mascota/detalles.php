<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Detalles del mascota <?=$mascota->nombre?></title>
		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">

	</head>
	<body id="page-top">

		<?php 
		  (TEMPLATE)::header("Detalles");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>

		<!-- Begin Page Content -->
        <div class="container-fluid">

			<div class="row">
				<div class="col-lg-6">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h2 class="m-0 font-weight-bold text-primary">Detalles de la mascota</h2>
							<h3><?="$mascota->nombre ($mascota->id)"?></h3>
			
							<p><b>Id Mascota:</b> <?=$mascota->id?></p>
							<p><b>Raza:</b> <?=$mascota->idraza?></p>
							<p><b>Nombre:</b> <?=$mascota->nombre?></p>
							<p><b>Sexo:</b> <?="$mascota->sexo"?></p>
							<p><b>Fechanacimiento:</b> <?=$mascota->fechanacimiento?></p>
							<p><b>Fechafallecimiento:</b> <?=$mascota->fechafallecimiento?></p>
							<p><b>Biografia:</b> <?=$mascota->biografia?></p>
							<p><b>Id usuario:</b> <?=$mascota->idusuario?></p>

							<a href="/mascota/edit/<?=$mascota->id?>">Editar mascota</a> -
							<a href="/mascota/delete/<?=$mascota->id?>">Borrar mascota</a> - 
							<a href="/mascota/list">Lista de mascotas</a> 

						</div>
						
					</div>
				</div>
		
				<div class="col-lg-6">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h2 class="m-0 font-weight-bold text-primary">Fotos de la mascota</h2>
							<?php
							// Si hay fotos
							if(sizeof($fotos)){
								echo "<section id='galeria' class='flex-container'>";
								
								// Muestra cada una de las fotos
								foreach($fotos as $foto){
								echo "<figure class='flex4'>";
								echo "<img class='img-fluid' src='/$foto->fichero' alt='$mascota->nombre en $foto->ubicacion'><br>
										<span>$foto->ubicacion</span><br>";
								if(Login::get() && Login::get()->id == $mascota->idusuario || Login::isAdmin())
									echo "<a href='/foto/delete/$foto->id'>Borrar</a><br>";
								echo "</figure>";
								}
						
						
							// Si no hay ejemplares
							}else
								echo "<p>No hay fotos de este mascota.</p>";
							
							echo "</section>";
							?>

							<a href="/foto/create/<?=$mascota->id?>">Añadir foto</a>
							
						</div>
					</div>
				</div>	
			</div>	
		</div>
			
		<?php 
		  (TEMPLATE)::footer();
		?>

	</body>
</html>