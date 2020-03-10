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
		  (TEMPLATE)::header("Mascotas");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Lista de mascotas</h2>
			
		<table class="table table-hover" border="1">
			<tr class="table-warning">
				<th scope="row">ID Mascota</th>
				<th scope="row">Raza</th>
				<th scope="row">Nombre</th>
				<th scope="row">Sexo</th>
				<th scope="row">Fechanacimiento</th>
				<th scope="row">Fechafallecimiento</th>
				<th scope="row">Biografia</th>
				<th scope="row">ID Usuario</th>
				<th scope="row">Operaciones</th>
			</tr>
    		<?php foreach($mascotas as $mascota){
    			   echo "<tr>";
    			   echo "<td>$mascota->id</td>";
    			   echo "<td>$mascota->idraza</td>";
    			  // echo "<td>$mascota->mascota</td>";
    			   echo "<td>$mascota->nombre</td>";
    			   echo "<td>$mascota->sexo</td>";
    			   echo "<td>$mascota->fechanacimiento</td>";
    			   echo "<td>$mascota->fechafallecimiento</td>";
    			   echo "<td>$mascota->biografia</td>";
    			   echo "<td>$mascota->idusuario</td>";
    			   echo "<td>";
    			   echo " <a href='/mascota/show/$mascota->id'><i class='fa fa-eye' aria-hidden='true'></i></a>";
    			   if(Login::get() && Login::get()->id == $mascota->idusuario || Login::isAdmin()){
    			   echo " <a href='/mascota/edit/$mascota->id'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
    			   echo " <a href='/mascota/delete/$mascota->id'><i class='fa fa-trash' aria-hidden='true'></i></a>";
    			   }
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

