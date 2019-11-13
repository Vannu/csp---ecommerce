<?php
include_once 'La-carta.php';
$cart = new Cart;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>View Cart - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 20px;}
    input[type="number"]{width: 20%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
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
                <li role="presentation" class="active"><a href="VerCarta.php">Ver Carta</a></li>
                <li role="presentation"><a href="Pagos.php">Pagos</a></li>
            </ul>
        </div>

        <div class="panel-body">


        <div class="alert alert-success text-center p-all-half">
            <span class="divider-bullet divider-bullet-invert m-top" aria-hidden="true"></span>
            <h2 class="h1 h3-xs text-uppercase weight-normal p-top-half p-bottom-half weight-light">Carrito de compras</h2>
            <span class="divider-bullet divider-bullet-invert m-bottom" aria-hidden="true"></span>
        </div>



        <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub total</th>
                        <th>&nbsp;</th>
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
                <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                <td><?php echo '$'.$item["subtotal"].' $'; ?></td>
                <td>
                    <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="5"><p>Tu carta esta vacia.....</p></td>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td><a href="../home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a></td>
                <td colspan="2"></td>
                <?php if($cart->total_items() > 0){ ?>
                <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' $'; ?></strong></td>
                <td><a href="Pagos.php" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
                <?php } ?>
            </tr>
            </tfoot>
        </table>
    
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