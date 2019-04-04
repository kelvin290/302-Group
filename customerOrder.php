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
<title>OR Ltd  | Customer order</title>

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
<th>Item_name</th>
<th>Quantity</th>
<th>Price</th>
<th>Order_date</th>
<th>Customer Name</th>
</tr>
</thead>


<?php
    
   // $sql2 = "SELECT b.item_name, a.quantity, a.price, a.Order_date FROM Cart a, Item b WHERE b.item_id = a.item_id AND a.Customer_id = b.Customer_id";
    //$result = mysqli_query($conn, $sql2);
    
	
	
	$sql2 = "SELECT b.item_name, a.quantity, a.price, a.Order_date, c.Customer_name FROM Cart a, Item b, Customer c WHERE b.item_id = a.item_id AND a.Customer_id = c.Customer_id ORDER BY a.Order_date DESC";
    $result = mysqli_query($conn, $sql2);
	
    
    if (mysqli_num_rows($result) > 0) {
        // display datas
        while($row = mysqli_fetch_assoc($result)) {
?>

<tbody id="myTable">
<tr>
<td><?php echo $row['item_name'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['Order_date'];?></td>
<td><?php echo $row['Customer_name'];?></td>
</tr>
</tbody>

<?php    }
    } else { ?>
<h3>  <?php  echo "There are no orders today.";
    } ?>

</table>
<br>



</div>


</body>

<script>
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;
    
    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});
    
    // Download link
    downloadLink = document.createElement("a");
    
    // File name
    downloadLink.download = filename;
    
    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);
    
    // Hide download link
    downloadLink.style.display = "none";
    
    // Add the link to DOM
    document.body.appendChild(downloadLink);
    
    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++)
            row.push("\""+cols[j].innerText+"\"");
        
        csv.push(row.join(","));
    }
    
    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>
</html>
