

<?php
$title = "Product Page";
$stylesheet = "styles.css";
require( "includes/header.php" );
?>
<?php
require( "includes/filter.php" );
?>


<main id="display">
	<section id="item">
	<?php 
	$id = $_GET["id"];
	$sql = "SELECT id,name,description,image,price FROM products WHERE id=$id";
	//make a query to grab information from database
	$result = mysqli_query($connection,$sql);
	//run the query
	
	if(mysqli_num_rows($result)>0){
		//if there is at least one page in the database
		while($row = mysqli_fetch_array($result)){
			//store result in an array
			$id = $row["id"];
			$name = $row["name"];
			$description = $row["description"];
			$image = $row["image"];
			$price = $row["price"];
			
			//create a variable from the information in the database
			
			echo "
			<div>
			<img src='assets/$image' alt='RawAF $name product'>
			</div>
			<div>
			<li><h1>$name</h1></li>
			<li><p>$description</p></li>
			<li><h2>$$price</h2></li>
			<li><a href='add_to_cart.php?id=$id'>Add to Cart</a></li>
			</div>";
		}
	}else{
		echo "<p>No pages found</p>";
	}
	?>
		
</section>

</main>
<?php
require( "includes/footer.php" );
?>