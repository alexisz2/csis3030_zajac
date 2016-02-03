<!DOCTYPE html>
<head>

<title>Restaurant Menu</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="content">
    <div id="header">
      <div id="logo">
        <h1>Restaurant Menu</h1>
        <h4>view the restaurant menu</h4>
      </div>
      <div id="links">
        <ul>
          <li><a href="index.php">Home</a></li>

         
             <?php

  //if the person is logged in, show link to logout
  if ($_SESSION["id"] != "") {
    
     echo "<li><a href='admin_menu_list.php'>Menu List</a></li>";
    echo "<li><a href='admin_logout.php'>Logout</a></li>";
    

    
  } else {
  
    //else, show link to login
    echo "<li><a href='admin_login_form.php'>Login</a></li>";
    
  }
  ?>
         
        
          
        </ul>
      </div>
    </div>
    <div id="mainimg">
     
    </div>

