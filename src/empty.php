<?php
require("classes/cart.php");
require("classes/products.php");
session_start();
header("location:products.php");
$id= $_GET['id'];
$cart=new Cart();
echo $id;
$cart->deleteItem($id);
// $cart->deleteCart();
?>