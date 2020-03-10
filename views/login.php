<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>

		<!-- Custom fonts for this template-->
		<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  		<!-- Custom styles for this template-->
  		<link href="/css/sb-admin-2.min.css" rel="stylesheet">

	</head>
	
	<body class="bg-gradient-primary">

	<div class="container">

	<!-- Outer Row -->
    	<div class="row justify-content-center">

    		<div class="col-xl-10 col-lg-12 col-md-9">
        		<div class="card o-hidden border-0 shadow-lg my-5">
            		<div class="card-body p-0">

            			<!-- Nested Row within Card Body -->
            			<div class="row">
              				<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              					<div class="col-lg-6">
                					<div class="p-5">
                  						<div class="text-center">
                    						<h1 class="h4 text-gray-900 mb-4">¡Bienvenido a WebMascota!</h1>
                  						</div>

										<form class="user" method="post" action="/login/login">
											<div class="form-group">
                      							<input type="text" name="usuario" required class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario o email">
                    						</div>

											<div class="form-group">
                      							<input type="password" name="clave" required class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    						</div>

											<input type="submit" class="btn btn-primary btn-user btn-block" name="identificar" value="Identificarse">

											<hr>
                    						<a href="index.html" class="btn btn-google btn-user btn-block">
                      						<i class="fab fa-google fa-fw"></i> Login with Google
                    						</a>
                    						<a href="index.html" class="btn btn-facebook btn-user btn-block">
                      						<i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    						</a>
										</form>

										<hr>
                  						<div class="text-center">
                    					<a class="small" href="/forgotpassword">¿Olvidaste tu contraseña?</a>
                  						</div>
										<div class="text-center">
                    					<a class="small" href="/usuario/create">Crea una cuenta</a>
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
		</div>
	</body>	
</html>








