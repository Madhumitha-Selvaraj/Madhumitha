<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Webapp for adhan exports</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <a href="index.php" id="logo">Webapp for adhan exports</a>
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="index.php" class="active">Home</a></li>
        
              <?php
				if(isset($_SESSION['aid']))
				{
				echo ' <li><a href="admindashboard.php">Add Products</a></li>';
				echo ' <li><a href="view_products.php">View Products</a></li>';
				echo ' <li><a href="view_sales.php">View Sales</a></li>';
				echo '<li><a href="logout.php">Logout</a></li>';
				}
				?>
        
        <?php
				if(isset($_SESSION['stid']))
				{
				echo '<li><a href="shop.php">Shop</a></li>';
				echo '<li><a href="order.php">Order</a></li>';
				echo '<li><a href="logout.php">Logout</a></li>';
				}
				
				if(($_SESSION['stid']=='')&&($_SESSION['aid']==''))
				{
				echo '<li><a href="register.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
        <li><a href="admin.php">Admin Login</a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="contact.php">Contact</a></li>
		';
				}
				?>
                
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->