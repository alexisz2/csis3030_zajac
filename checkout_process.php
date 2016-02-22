<?php


	$firstname = $_POST["firstname"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	
	
	if ($firstname == "") { 
		$errormessage =  $errormessage . "First name was blank <br />";
	}

	if ($address == "") {
		$errormessage =  $errormessage . "Address was blank <br />";
	}

	if ($city == "") { 
		$errormessage =  $errormessage . "City was blank <br />";
	}

	if ($state == "") { 
		$errormessage =  $errormessage . "State was blank <br />";
	}

	if ($zip == "") { 
		$errormessage =  $errormessage . "Zip code was blank <br />";
	}

	
	if ($errormessage != "") {  
		include("checkout_form.php");
		die();
	}



	
	
  include("global.php"); 


	
	//2. Grab the input and clean it!
	$firstname = mysqli_real_escape_string($connection,$_POST["firstname"]);
	$address = mysqli_real_escape_string($connection,$_POST["address"]);
	$city = mysqli_real_escape_string($connection,$_POST["city"]);
	$state = mysqli_real_escape_string($connection,$_POST["state"]);
	$zip = mysqli_real_escape_string($connection,$_POST["zip"]);
		
	//3. Build the SQL command
	
	//$sql = "insert into orders (first, address, city, state, zip) order 
	//parties by state ('$firstname', '$address','$city','$state', '$zip')";
	
	//4. Send/run the SQL command
	
  //run the query, store the result (if any) in $result
  //$result = mysqli_query($connection,$sql) or die(mysql_error($connection));
	
	
	




	include("header.php"); 

	?>

	<p>Order Summary</p>
	
	<?php 


		echo "First name: " . $firstname . "<br />";

			echo "Address: " . $address . "<br />";

			echo "City: " . $city . "<br />";

			echo "State: " . $state . "<br />";

			echo "Zip code: " . $zip . "<br /><br />";

			//add a list of items that are ordered (cart contents)

			 //retreive cart contents
  			//product name, product id, quantity
  			//loop over results

			$sql = "select products.product_name, cart.quantity, products.id
			from products
			inner join cart
			on products.id=cart.product_id where session_id = '". session_id() . "'";

	$quantity = $row["quantity"];
	$id = $row["id"];

  	$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

  	while ($row = mysqli_fetch_assoc($result)) {
  
    echo "Product name: " . $row["product_name"] . "<br />";
  	//do we need to show the prduct id??
    echo "Quanity: ". $row["quantity"] . "<br />";
    echo "Product id: " . $row["id"] . "<br /><br />";

    $sql = "update products set quantity_remaining = quantity_remaining - " . $row["quantity"] . " where id =" . $row["id"];

    mysqli_query($connection,$sql) or die(mysqli_error($connection));


  	}

  		$sql = "select products.product_name, cart.quantity, products.id
		from products
		inner join cart
		on products.id=cart.product_id where session_id = '". session_id() . "'";

	$quantity = $row["quantity"];
	$id = $row["id"];

  	$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));


      	include("jwu_mail.php"); 

		$body = "Firstname: " . $firstname . " Address: " . $address;
			$body = $body . " City: " . $city;
			$body = $body . " State: " . $state;
			$body = $body . " Zip code: " . $zip;

  	while ($row = mysqli_fetch_assoc($result)) {
			
			//add a summary of the cart contents

			$body = $body . " Product: " . $row["product_name"];
			$body = $body . " Quantity: " . $row["quantity"];
			$body = $body . " Product id: " . $row["id"];


  	}



jwu_mail("azajac01@wildcats.jwu.edu","Your Purchase",$body);



 	include("footer.php");


	?>