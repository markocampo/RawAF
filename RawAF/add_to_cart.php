<?php
$title = "My Cart";
$stylesheet = "styles.css";
require( "includes/header.php" );
?>

<?php
require( "includes/filter.php" );
?>

<?php
session_start();

if(!isset($_SESSION["cart"])){
$_SESSION['cart'] = array();
}
array_push($_SESSION['cart'],$_GET["id"]);

header('Location: http://nmpdweb.ict.sait.ca/mocampo/mmda225/final/cart.php');
?>

<p>Product was succesfully added to your cart.
<a href="cart.php">View Cart</a>
	</p>

<?php
require( "includes/footer.php" );
?>