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
<title>OR Ltd  | Edit order</title>

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
<li><a href="customerOrder.php">Customer order</a></li> <!-- Customer Order Recorder -->
<li><a href="edit_order.php">Edit order</a></li> <!-- Edit Order manually -->
<li><a href="viewOrder.php">Daily order</a></li> <!-- Send to logistics -->
<li><a href="checkinventory.php">Check inventory</a></li> <!-- Check inventory level -->
<li><a href="sendReorder.php">Send reorder</a></li> <!-- Send to manufacturer -->
</ul>

<ul class="nav navbar-nav navbar-right">
<!-- //show username -->
<li><a><?php echo "Username:".$_SESSION['username']; ?> </a></li>

<li>  <button class="btn btn-info navbar-btn"  onclick="window.location.href = 'logout.php';">Logout</button> </li>
</ul>
</nav>
<!-- End of the navigation bar-->

<div>

<table class="table table-bordered">
<thead>
<tr>
<th>Order_id</th>
<th>Order_weight</th>
<th>Order_description</th>
<th>Quantity</th>
<th>Pickup_Ready_Date</th>
<th>Customer_id</th>
<th>Logistics_name</th>
<th>Order_date</th>
</tr>
</thead>


<?php
    
    $sql = "SELECT a.`Order_id`,a.`Order_weight`,a.`Order_description`,a.`Quantity`,a.`Pickup_Ready_Day`,b.*,c.*,d.*, a. `Order_date` FROM `Order`as a JOIN `Customer` as b on a.`Customer_id`=b.`Customer_id` JOIN `Retailer` as c on a.`Retailer_id`=c.`Retailer_id`, `Logistics` as d ORDER BY a.`Order_id`;";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // display data
        while($row = mysqli_fetch_assoc($result)) {
?>
<form name="editoder" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
<tbody id="myTable">
<tr>
<td><?php echo $row['Order_id'];?></td>
<td><textarea style="width:100%; border:0px white;" type="text" name="weight"><?php echo $row['Order_weight'];?></textarea></td>
<td><textarea style="width:100%; border:0px white;" type="text" name="description"><?php echo $row['Order_description'];?></textarea></td>
<td><textarea style="width:100%;  border:0px white;" type="text" name="quantity" ><?php echo $row['Quantity'];?></textarea></td>
<td><textarea style="width:100%; border:0px white;" type="text" name="prd"><?php echo $row['Pickup_Ready_Day'];?></textarea></td>
<td><?php echo $row['Customer_id'];?></td>
<td><textarea style="width:100%; border:0px white;"  type="text" name="logistics"><?php echo $row['Logistics_name'];?></textarea></td>
<td><?php echo $row['Order_date'];?></td>
<td><button class="btn btn-info" value="<?php echo $row['Order_id'];?>" name="get_id"> Save</button></td>
</tr>
</tbody>
</form>

<?php    }
    } else { ?>
<h3>  <?php  echo "Sorry, we can't find any result here! Please search again.";
    } ?>

</table>

</div>


</body>




</html>

<?php
    if (isset($_POST['get_id'])) {
        $oid = $_POST['get_id'];
        $weight = $_POST['weight'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $prd = $_POST['prd'];
        $logistics_name = $_POST['logistics'];
        echo $oid;

        $sql = "SELECT `Logistics_id` FROM `Logistics` WHERE `Logistics_name` = '$logistics_name'";

        $logistics_id = mysqli_fetch_assoc(mysqli_query($conn, $sql))['Logistics_id'];
        
        $query = "UPDATE `Order` SET  `Order_weight` =  '$weight', `Order_description` =  '$description', `Quantity` =  '$quantity',`Pickup_Ready_Day` =  '$prd',`Logistics_id` =  '$logistics_id' WHERE `Order_id` =  '$oid' ";

         $check = mysqli_fetch_array(mysqli_query($conn, $query));

        header("Location: edit_order.php");
    }

?>
