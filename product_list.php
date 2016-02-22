<?php
include("global.php");
include("header.php");
?>

  <?php
  //TODO: Should show category name here.
  $sql = "select * from categories where id =".intval($_GET["category_id"]);
  $result = mysqli_query($connection,$sql);

  $row = mysqli_fetch_assoc($result);
  echo "Category Name: " . $row["category_name"] . "<br /><br />" ;



 $sql = "select * from products where category_id =".intval($_GET["category_id"]);
	
  //run the query, store the result (if any) in $result
  $result = mysqli_query($connection,$sql) or die(mysql_error($connection));

  while ($row = mysqli_fetch_assoc($result)) {
		echo "Product name: " . '<a href="product_detail.php?product_id='. $row["id"] . '">'. $row["product_name"] . '</a><br />';
    echo "<img src='images/" . $row["image"] . "'/> <br />";
		echo "Price: " . $row["price"] . "<br />";
		echo "Quanity Remaining: " . $row["quantity_remaining"] . "<br /><br />";
		echo "Product ID: " . $row["id"] . "<br /><br />" ;
	}
?>

<?php
include("footer.php");
 ?>