<?php
include("global.php");
include("header.php");
?>

  <?php
  //TODO: Should show category name here.
  $sql = "select * from categories where id ='".intval($_GET["id"])."'";
  $result = mysqli_query($connection,$sql);

  while ($row = mysqli_fetch_assoc($result)) {
    echo "Category Name: " . $row["categoryname"] . "<br /><br />" ;
}

  $sql = "select * from items where category_id ='".intval($_GET["id"])."'";
	
  //run the query, store the result (if any) in $result
  $result = mysqli_query($connection,$sql);

  while ($row = mysqli_fetch_assoc($result)) {
		echo "<img src='images/" . $row["filename"] . "'/> <br />";
		echo "Title: " . $row["title"] . "<br />";
		echo "Description: " . $row["description"] . "<br /><br />" ;
		echo "Category ID: " . $row["category_id"] . "<br /><br />" ;
	}
?>

<?php
include("footer.php");
 ?>