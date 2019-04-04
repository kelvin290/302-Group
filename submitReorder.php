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

<html>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- <body onload="redirectFunc()"> -->

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

<li><button class="btn btn-info navbar-btn"  onclick="window.location.href = 'logout.php';">Logout</button> </li>
</ul>
</nav>
<!-- End of the navigation bar-->
	  
	  
<?php    
    date_default_timezone_set('Asia/Hong_Kong');
    $deadlineDate = date('Y-m-d H:i:s');
    $deadline =  date('Y-m-d H:i:s', strtotime($deadlineDate. ' + 30 days'));
    
    // create reorder id
    $sql= "SELECT `reorder_id` FROM `Reorder` ORDER BY `reorder_id` DESC LIMIT 1;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $old_id = $row['reorder_id'];
    }else {
        echo "0 results";
    }
    $old_idno = preg_replace('/\D/', '', $old_id);
    $new_idno = strval(number_format($old_idno)+1);
    $reorder_id = "RD".str_repeat("0",strlen($old_idno)-strlen($new_idno)).$new_idno;
    // end to create id
    
    $item_name = $_POST['item_name'];
    $item_id = $_POST['item_id'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $retailer_id = "RE001";
    $reorder_no = 20;


    $sql= "INSERT INTO `Reorder` (`reorder_id`, `item_id`,`deadline_date`,`reorder_no`,`manufacturer_id`,`retailer_id`) VALUES ('$reorder_id', '$item_id','$deadline','$reorder_no','$manufacturer_id','$retailer_id');";


if (mysqli_query($conn, $sql)) {
    header('location: sendReorder.php');
//    echo $item_name . " is added to Send reorder";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
<!-- <script>
   function redirectFunc(){
     setTimeout(function(){window.location.assign("http://302new.epizy.com/checkinventory.php");},3000);
   }
</script> -->
</body>
</html>
