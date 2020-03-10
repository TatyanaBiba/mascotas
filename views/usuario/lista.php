<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista de usuarios</title>
		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">

	</head>

	<body id="page-top">
		
		<?php 
		  (TEMPLATE)::header("Usuarios");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Lista de usuarios</h2>
			
		<table border="1">
			<tr>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Operaciones</th>
			</tr>
    		<?php foreach($usuarios as $usuario){
    			   echo "<tr>";
    			   echo "<td>$usuario->usuario</td>";
    			   echo "<td>$usuario->nombre</td>";
    			   echo "<td>$usuario->apellido1 $usuario->apellido2</td>";
    			   echo "<td>";
    			   echo " <a href='/usuario/show/$usuario->id'>Ver</a>";
    			   echo "-<a href='/usuario/edit/$usuario->id'>Actualizar</a>";
    			   echo "-<a href='/usuario/delete/$usuario->id'>Borrar</a>";
    			   echo "</td>";
    			   echo "</tr>";
    		}?>
		</table>
		<br>
		<?php 
		  (TEMPLATE)::footer();
		?>
		</div>
	</body>
</html>

