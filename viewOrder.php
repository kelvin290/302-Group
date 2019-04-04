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
<title>OR Ltd | Daily order</title>

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
<th>Customer_name</th>
<th>Customer_address</th>
<th>Customer_tel</th>
<th>retailer_id</th>
<th>retailer_name</th>
<th>retailer_tel</th>
<th>retailer_address</th>
<th>Logistics_id</th>
<th>Logistics_name</th>
</tr>
</thead>


<?php
    
    $sql = "SELECT a.`Order_id`,a.`Order_weight`,a.`Order_description`,a.`Quantity`,a.`Pickup_Ready_Day`,b.*,c.*,d.* FROM `Order`as a JOIN `Customer` as b on a.`Customer_id`=b.`Customer_id` JOIN `Retailer` as c on a.`Retailer_id`=c.`Retailer_id`, `Logistics` as d WHERE DATE(a. `Order_date`) = DATE(DATE_ADD(NOW(), INTERVAL 10 HOUR));";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // display data
        while($row = mysqli_fetch_assoc($result)) {
?>

<tbody id="myTable">
<tr>
<td><?php echo $row['Order_id'];?></td>
<td><?php echo $row['Order_weight'];?></td>
<td><?php echo $row['Order_description'];?></td>
<td><?php echo $row['Quantity'];?></td>
<td><?php echo $row['Pickup_Ready_Day'];?></td>
<td><?php echo $row['Customer_id'];?></td>
<td><?php echo $row['Customer_name'];?></td>
<td><?php echo $row['Customer_address'];?></td>
<td><?php echo $row['Customer_tel'];?></td>
<td><?php echo $row['retailer_id'];?></td>
<td><?php echo $row['retailer_name'];?></td>
<td><?php echo $row['retailer_tel'];?></td>
<td><?php echo $row['retailer_address'];?></td>
<td><?php echo $row['Logistics_id'];?></td>
<td><?php echo $row['Logistics_name'];?></td>
</tr>
</tbody>

<?php    }
    } else { ?>
<h3>  <?php  echo "There are no orders today.";
    } ?>

</table>
<br>
<button class="btn btn-info" onclick="exportTableToCSV('order.csv')">Export CSV File</button>


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
