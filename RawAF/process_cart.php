<?php
$title = "Order Processed";
$stylesheet = "styles.css";
require( "includes/header.php" );
session_start();
$_SESSION = [];

?>
<?php
require( "includes/filter.php" );
?>
<main id="display">
	<section>
<?php  
if(isset($_POST["add"])){
	//if the user pressed the "submit" button"
	$name = mysqli_real_escape_string($connection, $_POST["fname"]);
	$email = mysqli_real_escape_string($connection, $_POST["email"]);
	$list = mysqli_real_escape_string($connection, $_POST["list"]);
	$total = mysqli_real_escape_string($connection, $_POST["total"]);
	
	$sql = "INSERT INTO `orders`(`Customer Name`, `Email Address`, `Product(s) Purchased`, `Total Cost`) VALUES ('$name','$email','$list','$total')";
	if(mysqli_query($connection, $sql)){
		//if we can connect to db, and write data from form
		echo "<h2>Order Saved</h2>"."<p>Your order is being processed. Thank you for your purchase!</p><a href='products.php'>Continue Shopping</a>";
		session_destroy();
		
	}else{
		//if we cant connect to the db
		echo "Something went wrong. Please try again.";
		echo 'MySQL Error: ' . mysqli_error($connection);
	}
}else{
	//if the user has not submitted the form
	header("location: cart.php");
}
?>
		</section>
</main>
<?php
require( "includes/footer.php" );
?>