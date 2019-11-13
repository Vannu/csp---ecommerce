<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="./includes/style.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">


	<div class="alert alert-success text-center p-all-half">
        <span class="divider-bullet divider-bullet-invert m-top" aria-hidden="true"></span>
        <h2 class="h2 h3-xs text-uppercase weight-normal p-top-half p-bottom-half weight-light">ACCESO USUARIOS AUTORIZADOS</h2>
        <span class="divider-bullet divider-bullet-invert m-bottom" aria-hidden="true"></span>
    </div>


		<div class="card mx-auto" style="width: 30rem;">
	        <div class="card-header">Registrarse</div>
		      <div class="card-body">
		        <form id="register_form" onsubmit="return false" autocomplete="off">
		          <div class="form-group">
		            <label for="username">Nombre Completo</label>
		            <input type="text" name="username" class="form-control" id="username" placeholder="Ingrese el Nombre">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="email">Email</label>
		            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese email">
		            <small id="e_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password1">Contraseña</label>
		            <input type="password" name="password1" class="form-control"  id="password1" placeholder="Ingrese Contraseña">
		            <small id="p1_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password2">Reingrese Contraseña</label>
		            <input type="password" name="password2" class="form-control"  id="password2" placeholder="Ingrese Contraseñ">
		            <small id="p2_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="usertype">Tipo de usuario</label>
		            <select name="usertype" class="form-control" id="usertype">
		              <option value="">Elegir tipo de usuario</option>
		              <option value="Admin">Administrador</option>
		              <option value="Other">Otro</option>
		            </select>
		            <small id="t_error" class="form-text text-muted"></small>
		          </div>
		          <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Registrarse</button>
		          <span><a href="index.php">Iniciar sesion</a></span>
		        </form>
		      </div>
	      <div class="card-footer text-muted">
	        
	      </div>
	    </div>
	</div>
	<footer id="footer" class="py-4 text-white-50">
    
    <div class="container text-center">
        <img style="max-width:100px;" src="images/logo02.png" alt="CP"></a>
      <small>Copyright &copy; 2019</small>
    </div>
</footer>
</body>
</html>