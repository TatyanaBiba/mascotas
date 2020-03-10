<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registro de usuarios</title>

		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="/css/sb-admin-2.min.css" rel="stylesheet">

	</head>
	
	<body class="bg-gradient-primary">

		<div class="container">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
							<div class="col-lg-7">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Crea una cuenta</h1>
									</div>
							
									<form class="user" method="post" action="/login/login">

										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="usuario" class="form-control form-control-user" id="exampleInputPassword" placeholder="Usuario">
											</div>
											<div class="col-sm-6">
												<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
											</div>
										</div>

										<div class="form-group">
											<input type="text" name="nombre" class="form-control form-control-user" id="exampleLastName" placeholder="Nombre">
										</div>

										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="text" name="apellido1" required class="form-control form-control-user" id="exampleFirstName" placeholder="Primer apellido">
											</div>
											<div class="col-sm-6">
												<input type="text" name="apellido2" class="form-control form-control-user" id="exampleLastName" placeholder="Segundo apellido">
											</div>
										</div>

										<div class="form-group">
											<input type="email" name="email"class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
										</div>
										
										<input type="submit" name="guardar" value="Registrar Usuario" class="btn btn-primary btn-user btn-block">

							
										<?php if(Login::isAdmin()){ ?>
										<h4>Operaciones solo para el admin</h4>
										<label>Privilegio</label>
										<input type="number" value="0" min="0" max="9999" name="privilegio">
										<br>
										<input type="checkbox" name="administrador" value="1">
										<label>Conceder privilegio de administrador</label>
										<br>
										<?php } ?>

										<hr>
										<a href="#" class="btn btn-google btn-user btn-block">
										<i class="fab fa-google fa-fw"></i> Registrar con Google
										</a>
										<a href="#" class="btn btn-facebook btn-user btn-block">
										<i class="fab fa-facebook-f fa-fw"></i> Registrar con Facebook
										</a>

									</form>

									<hr>
									<div class="text-center">
										<a class="small" href="/forgotpassword">¿Olvidaste tu contraseña?</a>
									</div>
									<div class="text-center">
										<a class="small" href="/login">¿Ya tienes una cuenta? Accede aquí</a>
									</div>
									<hr>
									<div class="text-center">
                    					<a class="small" href="/">Volver al inicio</a>
                  					</div>				
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>								
    	</div>	
	</body>
</html>








