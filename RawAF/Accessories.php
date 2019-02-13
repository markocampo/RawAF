<?php
$title = "Accessories";
$stylesheet = "styles.css";
require( "includes/header.php" );
?>
<?php
require( "includes/filter.php" );
?>


<main id="display">
	<h1>Accessories Products</h1>
	<section id="sort">
	<?php 
	$query = "SELECT * FROM products WHERE id IN (13,14,15)";
	//make a query to grab information from database
	$sql = mysqli_query($connection,$query);
	//run the query
	
	if(mysqli_num_rows($sql)>0){
		//if there is at least one page in the database
		while($row = mysqli_fetch_array($sql)){
			//store result in an array
			$id = $row["id"];
			$name = $row["name"];
			$price = $row["price"];
			$thumb = $row["thumb"];
			$category = $row["category"];
			//create a variable from the information in the database
			
			echo "<ul>
			<li><a href='product_page.php?id=$id'><img src='assets/$thumb' alt='RawAF $name product'></a></li>
			<li><a href='product_page.php?id=$id'>$name</a>
			<p>$$price</p></li>
			<p>$category</p>
			
			</ul>";
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