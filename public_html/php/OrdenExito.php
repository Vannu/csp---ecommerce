<?php

session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}



if(!isset($_REQUEST['id'])){
    header("Location: ../home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Orden Completado - PHP Carrito de Compras</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
    <style>
    .container{padding: 20px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>

<body>
<nav class="navbar navbar-inverse" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="../cover.php">
      <img style="max-width:100px;" 
      src="../images/logo02.png"></a>
             
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <?php if(!isset($_SESSION["user_id"])):?>
   <!--    <li><a href="./registro.php">REGISTRO</a></li>    -->
      <li><a href="../login.php">LOGIN</a></li>
    <?php else:?>
      <li><a href="logout.php">SALIR</a></li>
    <?php endif;?>
    </ul>

  </div><!-- /.navbar-collapse -->
</div>
</nav>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 

<ul class="nav nav-pills">
  <li role="presentation"><a href="../home.php">Inicio</a></li>
</ul>
</div>

<div class="panel-body">
<div class="alert alert-success text-center p-all-half">
        <span class="divider-bullet divider-bullet-invert m-top" aria-hidden="true"></span>
        <h2 class="h1 h3-xs text-uppercase weight-normal p-top-half p-bottom-half weight-light">Pedido recibido</h2>
        <span class="divider-bullet divider-bullet-invert m-bottom" aria-hidden="true"></span>
    </div>
    <h1>Estado de su Orden</h1>
    <p>Su pedido ha sido enviado exitosamente. La ID del pedido es #<?php echo $_GET['id']; ?></p>
           </div>
 
</div>

<footer id="footer" class="py-4 bg-dark text-white-50">
    
    <div class="container text-center">
        <img style="max-width:100px;" src="../images/logo02.png" alt="CP"></a>
      <small>Copyright &copy; 2019</small>
    </div>
</footer>
</body>
</html>