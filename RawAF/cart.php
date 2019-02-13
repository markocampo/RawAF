<?php
$title = "My Cart";
$stylesheet = "styles.css";
require( "includes/header.php" );

?>
<?php
require( "includes/filter.php" );
?>

<main id="display">
	<h1>Items In Your Cart</h1>
	<section id="cart">
		<?php
		session_start();
		
		if ( isset( $_SESSION[ "cart" ] ) ) {
			$id = implode( ", ", $_SESSION[ "cart" ] );
			$sql = "SELECT * FROM products WHERE id IN ($id)";
			//make a query to grab information from database
			$result = mysqli_query( $connection, $sql );
			//run the query
			$total = 0;
			$array = array();

			if ( mysqli_num_rows( $result ) > 0 ) {
				//if there is at least one page in the database
				while ( $row = mysqli_fetch_array( $result ) ) {
					//store result in an array
					$id = $row[ "id" ];
					$thumb = $row["thumb"];
					$name = $row[ "name" ];
					$price = $row[ "price" ];
					$total += $price;
					array_push( $array, $name );
					$list = implode( ", ", $array );
					//create a variable from the information in the database


					echo "<ul>
					<li id='cartbg'><a href='product_page.php?id=$id'>$name</a></li>
			<li><a href='product_page.php?id=$id'><img src='assets/$thumb' alt='RawAF $name product'></a></li>
			<li><p><span>$$price</span></p></li>
			
			</ul>";

				}
			} else  {
				echo "<p>No items found in cart.</p>";
			}
		}

		?>
	</section>
	<section id="total"><h1>Total: <?php 
		if ( isset( $_SESSION[ "cart" ] ) ) { 
			echo "$$total"; } 
		?></h1><a href="products.php">Continue Shopping</a></section>
	
	<section id="cartform">
		<h1>Customer Information</h1>
		<form action="process_cart.php" method="post">
			<label for="fname">Full Name</label>
			<input type="text" name="fname" id="fname" required>
			<br>
			<label for="email">E-mail</label>
			<input type="email" name="email" id="email" required>

			<!--hidden values-->
			<input type="hidden" name="list" id="list" value="<?php echo $list ?>" required>
			<input type="hidden" name="total" id="total" value="<?php echo $total ?>" required>
			<br>
			<input type="submit" name="add" id="add" value="Add To Cart">
		</form>
		
	</section>
</main>
<?php
require( "includes/footer.php" );
?>