<?php
date_default_timezone_set("America/Lima");
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;

// include database configuration file
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['pid'])){
        $productID = $_REQUEST['pid'];
        // get product details
        $query = $db->query("SELECT * FROM products WHERE pid = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'pid' => $row['pid'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'VerCarta.php':'../home.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['pid'])){
        $itemData = array(
            'rowid' => $_REQUEST['pid'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['pid'])){
        $deleteItem = $cart->remove($_REQUEST['pid']);
        header("Location: VerCarta.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['user_id'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orden (customer_id, total_price, created, modified) VALUES ('".$_SESSION['user_id']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: Pagos.php");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: ../home.php");
    }
}else{
    header("Location: ../home.php");
}