<?php
ob_start();
session_start();
require_once 'connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
                
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>OR Ltd | Product</title>

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

<!-- Search -->


<form class="navbar-form navbar-left" action="product_search.php" method="post">
    	<div class="form-group">
			<input class="form-control" type="text" name="q" placeholder="Search for product..">
			<button type="submit" class="btn btn-default">Search</button>
    	</div>
</form>

<?php print("$output");?> 
<!-- End Search -->

<!--Use Bootstrap Grid System to display product -->


<?php 	

$product = "SELECT * FROM Item ORDER BY item_id ASC";
$result = mysqli_query($conn, $product);

if (mysqli_num_rows($result) > 0) {
   // display data
    while($row = mysqli_fetch_assoc($result)) {
?>

<div class="container">

<div class="row" >
<div class="col-xs-12" >

<div class="layout-margin-8 mt-5">
<div class="card-deck">
<div class="card card-shadow text-center">
<div class="card-body">
<center>
<img src="<?php echo $row["img_dir"];?>" width ="600" height="520" alt="" >
</center>
<h4 class="card-title"><?php echo $row["item_name"]."  ";?></h4>
<p><span class="pricetag-large"><?php echo "$".$row["price"];?></span></p>
<p align="center"><a href="" class="btn btn-info btn-block" data-toggle="modal" data-toggle="modal"data-target="#<?php echo $row["item_id"];?>">Details</a></p>
</div>
</div>
</div>
</div>

<!-- POPUP Window to display Product details-->
<div class="modal fade product_view" id="<?php echo $row["item_id"];?>"
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<a href="#" data-dismiss="modal" class="class pull-right"><img src="img/back-icon.png" height="20px" width="20px"></button></a>


<h3 class="modal-title"><?php echo $row["item_name"];?></h3>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-6 product_img">
<img class="photo-center" src="<?php echo $row["img_dir"];?>" height="500px">
</div>
<div class="col-md-6 product_content">
<p><?php echo $row["description"];?></p>
<h3><?php echo "$".$row["price"];?></h3>


<Section class="section">
<p><a href="addtocart.php?id=<?php echo $row['item_id']; ?>"  class="btn btn-info pull-center-left" role="button">Add to Cart</a></p>
<!-- <div class="cart-action"><input type="submit" value="Add to Cart" class="btnAddAction" /></div> -->
<!-- <button type="button" class="btn btn-info pull-center-left"></span> Add To Cart</button> -->
</Section>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- End POPUP Window-->
</div>
</div>

<?php    }
    } else { ?>
<h3>  <?php  echo "Sorry, we can't find any result here! Please search again.";
    }
?>

<section class="section-3"> <!-- Space within footer and content -->

<!-- footer-->
<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>


</body>
</html>
