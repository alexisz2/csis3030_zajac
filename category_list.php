<?php
include("global.php");



include("header.php");
?>

<?php

  $sql = "select * from categories";
  $result = mysqli_query($connection,$sql);


  //As long as there is another row available
    //print the row
  
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<a href="product_list.php?category_id='. $row["id"] . '">'. $row["category_name"] . '</a><br />';

 
 
  }


?>

<?php
include("footer.php");
?>