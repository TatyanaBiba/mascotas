<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Detalles del usuario <?=$usuario->usuario?></title>
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
		
		<h2>Detalles del usuario</h2>
		<h3><?="$usuario->usuario ($usuario->email)"?></h3>
		
		<p><b>Usuario:</b> <?=$usuario->usuario?></p>
		<p><b>Nombre:</b> <?=$usuario->nombre?></p>
		<p><b>Apellidos:</b> <?="$usuario->apellido1 $usuario->apellido2"?></p>
		<p><b>Privilegio:</b> <?=$usuario->privilegio?></p>
		<p><?=$usuario->administrador? "Administrador":"No administrador"?></p>
		<p><b>Email:</b> <?=$usuario->email?></p>
	
	
		<a href="/usuario/edit/<?=$usuario->id?>">Editar usuario</a> - 
		<a href="/usuario/delete/<?=$usuario->id?>">Borrar usuario</a> 
		<?php if(Login::isAdmin()){
			echo "<a href='/usuario/list'>Lista de usuarios</a>";
        }
		?>
		
	
		<?php 
		  (TEMPLATE)::footer();
		?>
		</div>
	</body>
</html>