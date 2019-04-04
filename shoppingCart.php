<?php
ob_start();
session_start();
require_once 'connect.php';
    
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
    
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OR Ltd | My Cart</title>

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

<section class="section1"></section>

<div class="container">
<div class="row">
<table class="table">

<?php
    //    print_r($_SESSION);
    if (isset($_SESSION['cart'])){
//    print_r($_SESSION['cart']);

?>


<tr>
<th>Item name</th>
<th>Quantity</th>
<th>Price</th>
</tr>

<?php
    
    $total = '';
    $i=1;
    if(is_array($cartitems)){
    foreach ($cartitems as $key=>$id) {
            $sql = "SELECT * FROM Item WHERE item_id = '$id'" ;
            $res = mysqli_query($conn, $sql);
            $r = mysqli_fetch_assoc($res);
?>

<tr>
<td><?php echo $r['item_name']; ?></td>
<td>1</td>
<td>$<?php echo $r['price']; ?></td>
<td><a href="deleteCart.php?remove=<?php echo $key; ?>">Remove</a></td>
</tr>
<?php
    $total = $total + $r['price'];
    $i++;
    }
    }
?>

<tr>
<td><strong>Total Price</strong></td>
<td></td>
<td><strong>$<?php echo $total; ?></strong></td>
<td><a href="checkout.php" class="btn btn-info">Checkout</a></td>
</tr>
<tr>
<td><a href="product.php">Continue shopping</a></td>
</tr>
<?php
    }
    else {
        echo "Your cart is empty." ;
    }
    ?>
</table>

</div>
</div>


<!-- Space within footer and content -->

<!-- footer-->

<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>

</body>


</html>

