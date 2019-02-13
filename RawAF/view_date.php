<?php
$title = "View Products by Date";
$stylesheet = "styles.css";
require( "includes/header.php" );
?>
<?php
require( "includes/filter.php" );
?>


<main id="display">
	<h1>Products by Date Added</h1>
	<section id="sort">
	<?php 
	$query = "SELECT id,name,price,thumb,date FROM products ORDER BY date ASC";
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
			$date = $row["date"];
			//create a variable from the information in the database
			
			echo "<ul>
			<li><a href='product_page.php?id=$id'><img src='assets/$thumb' alt='RawAF $name product'></a></li>
			<li><a href='product_page.php?id=$id'>$name</a>
			<p>$$price</p></li>
			<li>$date</li>
			
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