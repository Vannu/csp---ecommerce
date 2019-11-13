<?php session_start(); ?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
		<div class="container">
			<div class="row">


			<div class="alert alert-success text-center"  role="alert">
  				<h1>TIENDA ONLINE</h1>
  				 <hr>
 				 <h3>Aprovecha las promociones por pago en efectivo o transferencia</h3>
			</div>



				<div class="col-md-6">

						<h2>Ya estas registrado?</h2>
						<p>Si tiene una cuenta con nosotros, por favor inicie sesión.</p>

						<form role="form" name="login" action="php/login.php" method="post">
							<div class="form-group">
								<label for="username">Nombre de usuario o email</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
							</div>
							<div class="form-group">
								<label for="password">Contrase&ntilde;a</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
							</div>

							<button type="submit" class="btn btn-default">Acceder</button>
						</form>
				</div>




				<div class="col-md-6">
		<h2>Nuevos Clientes</h2>
		<p>Al crear una cuenta en nuestra tienda, podrá avanzar más rápidamente en el proceso de compra, almacenar múltiples direcciones de envío, ver y rastrear sus pedidos en su cuenta y más.</p>

		<form role="form" name="registro" action="php/registro.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="fullname">Nombre Completo</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo Electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
		  </div>

		  <button type="submit" class="btn btn-default">Registrar</button>
		</form>
		</div>




			</div>
		</div>
		<footer id="footer" class="py-4 bg-dark text-white-50">
    
    <div class="container text-center">
        <img style="max-width:100px;" src="images/logo02.png" alt="CP"></a>
      <small>Copyright &copy; 2019</small>
    </div>
</footer>

	<script src="js/valida_login.js"></script>

	</body>
</html>