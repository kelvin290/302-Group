<?php
ob_start();
require_once 'connect.php';
?>

<!DOCTYPE html>

<html>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<header>
 <!-- logo -->
 
<img src="img/logo.png" alt="Logo" class="logo"> 

</header> 

<body onload="redirectFunc()">

    <nav class="nav navbar-default ">
	<ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="game.php">Product</a></li>
      <li><a href="about.php">About</a></li>
      <li class=""><a href="contact.php">Contact</a></li></ul>

      </nav>
<?php    
    // create id
    $sql= "SELECT `Customer_id` FROM `User` WHERE `Customer_id` LIKE 'CU%' ORDER BY `Customer_id` DESC LIMIT 1;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $old_id = $row['Customer_id'];
    }else {
        echo "0 results";
    }
    $old_idno = preg_replace('/\D/', '', $old_id);
    $new_idno = strval(number_format($old_idno)+1);
    $customer_id = "CU".str_repeat("0",strlen($old_idno)-strlen($new_idno)).$new_idno;
    // end to create id
    
	$username=$_POST['username'];
	$password=$_POST['password'];
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_tel = $_POST['customer_tel'];

	$sql= 	"INSERT INTO `User` (`Customer_id`,`Username`,`Password`,`Privilege`) 
		VALUES ('$customer_id','$username','$password','customer');";
    $sql2= 	"INSERT INTO `Customer` (`Customer_id`,`Customer_name`,`Customer_address`,`Customer_tel`) VALUES ('$customer_id','$customer_name','$customer_address','$customer_tel');";

//echo "<center>";
//echo "<p>Your account was created</p>";
//echo "<br>";
//echo "<p>Account name: ".$customer_name."</p>";
//
//echo "<p>Password: ".$password."</p>";
//
//echo "</center>";
header("Location: login.php");
if (mysqli_query($conn, $sql)) {
    echo "  ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql2)) {
    echo "  ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
<script>
//   function redirectFunc(){
//     setTimeout(function(){window.location.assign("http://302new.epizy.com/index.php");},3000);
//   }
</script>
</body>
</html>
