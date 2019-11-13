
<?php
// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: ../home.php");
}


// set customer ID in session


// get customer details by session customer ID
$query = $db->query("SELECT * FROM clientes WHERE id = ".$_SESSION['user_id']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pagos - PHP Carrito de compras Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
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
  <li role="presentation"><a href="VerCarta.php">Ver Carta</a></li>
  <li role="presentation" class="active"><a href="Pagos.php">Pagos</a></li>
</ul>
</div>

<div class="panel-body">
    
    
<div class="alert alert-success text-center p-all-half">
        <span class="divider-bullet divider-bullet-invert m-top" aria-hidden="true"></span>
        <h2 class="h1 h3-xs text-uppercase weight-normal p-top-half p-bottom-half weight-light">Detalle de compras</h2>
        <span class="divider-bullet divider-bullet-invert m-bottom" aria-hidden="true"></span>
    </div>


    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Pricio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["product_name"]; ?></td>
            <td><?php echo '$'.$item["product_price"].' $'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' $'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay articulos en tu carta......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' $'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Detalles de envío</h4>
        <p><?php echo $custRow['username']; ?></p>
        <p><?php echo $custRow['fullname']; ?></p>
        <p><?php echo $custRow['email']; ?></p>

    </div>
    <div class="footBtn">
        <a href="../home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
        <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
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