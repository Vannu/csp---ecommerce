<?php
include 'php/Configuracion.php';
?>
<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<html>
	<head>
        <title>.: HOME :.</title>
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
<body>
<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success text-center p-all-half">
            <span class="divider-bullet divider-bullet-invert m-top" aria-hidden="true"></span>
                <h2 class="h1 h3-xs text-uppercase weight-normal p-top-half p-bottom-half weight-light">¡Compra online y recibe tu producto donde quieras!</h2>
            <span class="divider-bullet divider-bullet-invert m-bottom" aria-hidden="true"></span>
        </div>


        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"> 

                    <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="home.php">Inicio</a></li>
                    <li role="presentation"><a href="php/VerCarta.php">Ver Carta</a></li>
                    <li role="presentation"><a href="php/Pagos.php">Pagos</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <h1>Productos destacados</h1>
                    
                    <div id="products" class="row list-group">
                        <?php
                        //get rows query
                            $query = $db->query("SELECT * FROM products ORDER BY pid DESC LIMIT 10");
                            if($query->num_rows > 0){ 
                                while($row = $query->fetch_assoc()){
                                ?>
                                <div class="item col-lg-12">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <h4 class="list-group-item-heading"><?php echo $row["product_name"]; ?></h4>
                                            <p class="list-group-item-text"><?php echo $row["d_product"]; ?></p>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <p class="lead"><?php echo '$'.$row["product_price"].' Pesos'; ?></p>
                                                </div>
                                                <div class="col-md-3 ml-auto ">
                                                    
                                                    <a class="btn btn-success" href="php/AccionCarta.php?action=addToCart&pid=<?php echo $row["pid"]; ?>">Agregar a la Carta</a>
                                                    <a href="php/VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } }else{ ?>
                                <p>Producto(s) no existe.....</p>
                            <?php } ?>
                    </div>
                </div>
                        
            </div>
        </div>
    </div>
</div>


<footer id="footer" class="py-4 bg-dark text-white-50">
    
    <div class="container text-center">
        <img style="max-width:100px;" src="images/logo02.png" alt="CP"></a>
      <small>Copyright &copy; 2019</small>
    </div>
</footer>

</body>
</html>