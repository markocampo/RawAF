<?php
$title = "Featured";
$stylesheet = "styles.css";
require( "includes/header.php" );
?>

<main id="featured">
	<?php 
	$query = "SELECT * FROM products WHERE id IN (3,4,5,6)";
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
			//create a variable from the information in the database
			
			echo "<div id='on$id'>
    <div class='text'>
      <h1>$name</h1>
    
    </div>
    <div><a href='product_page.php?id=$id'><img src='assets/$image' alt='strawberry flavored drink'></a></div>
  </div>";
		}
	}else{
		echo "<p>No pages found</p>";
	}
	?>

</main>

<?php
require( "includes/footer.php" );
?>