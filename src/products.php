<?php
require("classes/cart.php");
require("classes/products.php");
session_start();
$product=array();
$cart = new Cart();
$product1=new Products(101,'Basket Ball','basketball',150.00);
array_push($product,$product1);
$product2=new Products(102,'Football','football',120.00);
array_push($product,$product2);
$product3=new Products(103,'Soccer','soccer',110.00);
array_push($product,$product3);
$product4=new Products(104,'Table Tennis','table-tennis',130.00);
array_push($product,$product4);
$product5=new Products(105,'Tennis','tennis',80.00);
array_push($product,$product5);
if(!isset($_SESSION["products"]))
{
    $_SESSION["products"]=$product;
	$_SESSION['cart']=array();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php include_once("header.php"); ?>
	<div id="main">
		<div id="products">
			<?php $product1->getProducts($product);?>
		</div>
		<?php $cart->displayCart();?>
	</div>
	<?php include_once("footer.php"); ?>
</body>

</html>

