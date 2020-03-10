<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de contacto</title>

		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
  		<link href="/css/sb-admin-2.min.css" rel="stylesheet">
		
		<script src="https://www.google.com/recaptcha/api.js"></script>
		
		<style>
		  form label{
		      display: inline-block;
		      min-width: 120px;
		      padding: 5px;
		  }
		  form textarea{
		      vertical-align: text-top;
		      height: 100px;
		      width: 30%;
		      min-width: 200px;
		      resize:none;
		  }
		</style>
	</head>

	<body id="page-top">
		
		<?php 
		  (TEMPLATE)::header("Formulario de contacto");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Contactar</h2>
		
		<form method="post" action="/contacto/send">
			<label>Email</label>
			<input type="email" name="email" required><br>
			<label>Nombre</label>
			<input type="text" name="nombre" required><br>
			<label>Asunto</label>
			<input type="text" name="asunto" required><br>
			<label>Mensaje</label>
			<textarea name="mensaje" required></textarea>
			<br><br>
			<div class="g-recaptcha"
				data-sitekey="6LeSad4UAAAAAPmXHli28rCZ8Ek1PM-P4fq8DGK-">
			</div>
			<br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<br>		
	
		<?php 
		  (TEMPLATE)::footer();
		?>

		</div>
	</body>
</html>








