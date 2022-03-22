<?php
require("classes/cart.php");
require("classes/products.php");
header(("location:products.php"));
session_start();
$id= $_GET['id'];
foreach ($_SESSION["products"] as $v) {
    if ($v -> id == $id) {
        $product=$v;
    }
}
$add = new Cart();
$add->addToCart($product);
