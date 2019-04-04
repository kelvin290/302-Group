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
<title>OR Ltd | My Order</title>

<!-- need to import bootstript css first, and import mystyle.css , it can be change the bootstrap style-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/1.js" ></script>

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

<section class="section1"></section>

<div class="container">
<div class="row">
<table class="table">

<?php
    
    $cname = $_SESSION['username'];
    $sql = "SELECT Customer_id FROM User WHERE Username = '$cname'";
    $run = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $customerid = $run['Customer_id'];
    
    $sql2 = "SELECT b.item_name, a.quantity, a.price, a.Order_date FROM Cart a, Item b WHERE b.item_id = a.item_id AND a.Customer_id = '$customerid'";
    $result = mysqli_query($conn, $sql2);
    
    if (mysqli_num_rows($result) > 0) {
?>

<tr>
<th>Item name</th>
<th>Quantity</th>
<th>Price</th>
<th>Order date</th>
</tr>


<?php
        while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
<td><?php echo $row['item_name'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['Order_date'];?></td>
</tr>

<?php
    }
    }
    else {
        echo "You have no order." ;
    }
    ?>
</table>

</div>
</div>

<!-- footer -->
<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>


</body>
</html>
