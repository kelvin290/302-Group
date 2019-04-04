<?php
ob_start();
session_start();
require_once 'connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

    
$retailer = "SELECT * FROM Retailer";
$about = mysqli_query($conn, $retailer);
    
if (mysqli_num_rows($about) > 0) {
        // display data
   while($row = mysqli_fetch_assoc($about)) {
?>
	

<!DOCTYPE html>
<html lang="en">
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>OR Ltd | About Us</title>


<!-- need to import bootstript css first, and import mystyle.css , it can be change the bootstrap style-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/1.js"></script>

 </head>
 
<body>
<!-- Navigation Bar -->
<nav class="nav navbar-default ">
<ul class="nav navbar-nav">
<li><a href="index2.php">Home</a></li>
<li><a href="product.php">Product</a></li>
<li><a href="about.php">About</a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
<!-- //show username -->
<li><a href="reset_pwd.php"><?php echo "Username:".$_SESSION['username']; ?> </a></li>
<li><a href="shoppingCart.php">My Cart</a></li>
<li><a href="myOrder.php">My Order</a></li>
<!-- Logout function-->

<li>  <button class="btn btn-info navbar-btn"  onclick="window.location.href = 'logout.php';">Logout</button> </li>
</ul>
</nav>
<!-- End of the navigation bar-->


<div class="container">
This is an online shopping platform.<br><br>

<p>
Name: <?php echo $row['retailer_name'];?><br><br>
Tel: <?php echo $row['retailer_tel'];?><br><br>
Address: <?php echo $row['retailer_address'];?>
</p>

</div>

<?php
    }
    }
?>

<Section class="section-4"></Section>


<!-- footer-->

<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>




</body>

  
</html>
