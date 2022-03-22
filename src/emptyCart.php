<?php
require("classes/cart.php");
require("classes/products.php");
session_start();
header("location:products.php");
$cart=new Cart();
$cart->deleteCart();
?>