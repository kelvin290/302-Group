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
<title>OR Ltd | Send reorder</title>

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
<th>item_id</th>
<th>item_name</th>
<th>quantity</th>
<th>deadline_date</th>
<th>retailer_id</th>
<th>retailer_name</th>
<th>retailer_tel</th>
<th>retailer_address</th>
<th>manufacturer_id</th>
<th>manufacturer_name</th>
</tr>
</thead>


<?php
    
    $sql = "SELECT b.item_id, a.item_name, b.reorder_no, b.deadline_date, b.retailer_id, c.retailer_name, c.retailer_tel, c.retailer_address, b.manufacturer_id, d.manufacturer_name FROM Item a, Reorder b, Retailer c, Manufacturer d WHERE a.item_id = b.item_id AND b.retailer_id = c.retailer_id AND b.manufacturer_id = d.manufacturer_id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // display data
        while($row = mysqli_fetch_assoc($result)) {
?>

<tbody id="myTable">
<tr>
<td><?php echo $row['item_id'];?></td>
<td><?php echo $row['item_name'];?></td>
<td><?php echo $row['reorder_no'];?></td>
<td><?php echo $row['deadline_date'];?></td>
<td><?php echo $row['retailer_id'];?></td>
<td><?php echo $row['retailer_name'];?></td>
<td><?php echo $row['retailer_tel'];?></td>
<td><?php echo $row['retailer_address'];?></td>
<td><?php echo $row['manufacturer_id'];?></td>
<td><?php echo $row['manufacturer_name'];?></td>
</tr>
</tbody>

<?php    }
    } else { ?>
<h3>  <?php  echo "Sorry, we can't find any result here! Please search again.";
    } ?>

</table>
<br>
<button class="btn btn-info" onclick="exportTableToCSV('reorder.csv')">Export CSV File</button>


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
