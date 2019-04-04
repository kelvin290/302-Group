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
<title>OR Ltd | Check inventory</title>

<!-- need to import bootstript css first, and import mystyle.css , it can be change the bootstrap style-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/1.js" ></script>

<style>

td.urgent {
    background-color: lightcoral;
}

</style>

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

<li><button class="btn btn-info navbar-btn"  onclick="window.location.href = 'logout.php';">Logout</button> </li>
</ul>
</nav>
<!-- End of the navigation bar-->

<div>

<table class="table table-bordered">
<thead>
<tr>
<th>Item id</th>
<th>Item name</th>
<th>Inventory level</th>
<th>Status</th>
</tr>
</thead>


<?php

    $sql = "SELECT inventory_no, item_id, item_name, manufacturer_id FROM Item";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // display datas
        while($row = mysqli_fetch_assoc($result)) {
			
			$item_name = $row['item_name'];
			$item_id = $row['item_id'];
			$inventory = $row['inventory_no'];
			$manufacturer_id = $row['manufacturer_id'];
		
?>

<form name="reorder" action="submitReorder.php" method='POST'>

<tbody id="myTable">
<tr>
<td><input type="hidden" name="item_id" value="<?php echo $item_id;?>"/><?php echo $item_id;?></td>
<td><input type="hidden" name="item_name" value="<?php echo $item_name;?>"/><?php echo $item_name;?></td>


<?php 
if($inventory < 20){
echo "<td class='urgent'>$inventory</td>" ;
}

else{
	echo "<td>$inventory</td>" ;
}
?>

<input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer_id;?>"/>


<?php
    
    $sql2 = "SELECT * FROM Reorder WHERE item_id = '$item_id' ";
    $reorder = mysqli_query($conn, $sql2);
?>
<td>
<?php
    if(mysqli_num_rows($reorder) > 0 ){
?>
<p>You have reordered.<br>Please check send reorder.</p>
<?php
    } elseif ($inventory < 20){
?>
<button type="submit" class="btn btn-warning " onclick="window.location.href = 'submitReorder.php';">Reorder</button>
</td>
<?php
    }
    else {
?>
<td></td>
<?php
    }
?>
</tr>
</tbody>
</form>

<?php    }
    } else { ?>
<h3>  <?php  echo "There are no inventory.";
    } ?>

</table>

</div>

<!-- <script>
function myFunction() {

    document.getElementById("btnSubmit").disabled = true;
    document.getElementById("send").innerHTML = "Please check send reorder.";
        window.location.href = 'submitReorder.php';
}
</script> -->


</body>


<!-- <script>
    $(document).ready(function () {

        $("#formABC").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            $("#btnSubmit").attr("disabled", true);

            //disable a normal button
            $("#btnTest").attr("disabled", true);

            return true;

        });
    });
</script> -->


</html>
