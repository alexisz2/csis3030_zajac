<?php
include("global.php");
include("header.php");
?>

  <?php
//query to retrieve cart contents
//product name, product id, quanity

//loop over the results



?>

<form action="cart_process.php" method="POST">

<?php

//inner join gets only the matching rows

//where session_id = '"session_id'

$sql = "select products.product_name, cart.quantity, products.id
from products
inner join cart
on products.id=cart.product_id where session_id = '". session_id() . "'";

  $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

  while ($row = mysqli_fetch_assoc($result)) {
  
    echo "Product name: " . $row["product_name"] . "<br /><br />";
  //do we need to show the prduct id??
    echo "<input type='text' name='product_" . $row['id'] .  "' value='" . $row["quantity"] . "'/>". "<br /><br />";
    

  }


?>


<input type="submit" name="checkout" value="Start Checkout Process"><br /><br />
<input type="submit" name="update_cart" value="Update Cart"><br />
</form>



<?php
include("footer.php");
 ?>