<?php
	include("global.php");
	include("header.php");
?>

<?php

  //$sql = "select * from categories order by category_";
  $result = mysqli_query($connection,"select * from categories order by category_name");


  //As long as there is another row available
    //print the row
  
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<a href="product_list.php?category_id='. $row["id"] . '">'. $row["category_name"] . '</a><br />';
	}

?>

<?php
	include("footer.php");
?>