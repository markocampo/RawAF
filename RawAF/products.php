<?php
$title = "Products";
$stylesheet = "styles.css";
require( "includes/header.php" );
?>
<?php
require( "includes/filter.php" );
?>
<main id="products">
	<div id="category">
<?php 
	$query = "SELECT * FROM products WHERE id IN (1,3,7,14)";
	//make a query to grab information from database
	$sql = mysqli_query($connection,$query);
	//run the query
	
	if(mysqli_num_rows($sql)>0){
		//if there is at least one page in the database
		while($row = mysqli_fetch_array($sql)){
			//store result in an array
			$id = $row["id"];
			$name = $row["name"];
			$image = $row["image"];
			$category = $row["category"];
			$description = $row["description"];
			//create a variable from the information in the database
			
			echo "<section id='$category'>
			<div class='categorytext'>
			<h2>$category</h2>
				<p>$description</p>
			<a href='$category.php'>Shop Now</a>
			</div>
			<div class='imgwrap'>
			<img src='assets/$image' alt='RawAF 2L Bottle'>
			</div>
		</section>";
		}
	}else{
		echo "<p>No pages found</p>";
	}
	?>

	</div>
</main>

<?php
require( "includes/footer.php" );
?>