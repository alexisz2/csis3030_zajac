<?php
  include("global.php");
  include("header.php");
?>

<?php
  //TODO: Should show category name here.
  //$sql = "select * from categories where id =".intval($_GET["category_id"]);
  //$result = mysqli_query($connection,$sql);

  //$row = mysqli_fetch_assoc($result);
  //echo "Category Name: " . $row["category_name"] . "<br /><br />" ;

  $sql = "select * from products where id =".intval($_GET["product_id"]);
	
  //run the query, store the result (if any) in $result
  $result = mysqli_query($connection,$sql) or die(mysql_error($connection));

 $row = mysqli_fetch_assoc($result);
		echo "Product name: " . $row["product_name"] . "<br />";
    echo "<img src='images/" . $row["image"] . "'/> <br />";
		echo "Price: " . $row["price"] . "<br />";
		echo "Quanity Remaining: " . $row["quantity_remaining"] . "<br /><br />" ;
		echo "Description: " . $row["description"] . "<br /><br />" ;
		echo "Product ID: " . $row["id"] . "<br /><br />" ;
	
?>

<form action="cart_process.php" method="POST">
  Quantity:<br>
    <input type="text" name="product_<?php echo $row['id']?>" size="3"><br>

    <input type="submit" value="Add to Cart">
  </form>

<?php
  include("footer.php");
?>