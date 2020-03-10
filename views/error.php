<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
		<title>Error</title>

		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
  		<link href="/css/sb-admin-2.min.css" rel="stylesheet">
	</head>
	
	<body class="bg-gradient-primary">

		<div class="container">
			<?php 
				(TEMPLATE)::header("Error");
				(TEMPLATE)::nav();
				(TEMPLATE)::login();
			?>  
				
			<h2>Error en la operación solicitada</h2>
		
			<p class='error'><?=$mensaje?></p>
				
			<?php 
			(TEMPLATE)::footer();
			?>
			
    	</div>
    </body> 	
</html>
    

