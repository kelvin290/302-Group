<?php
ob_start();
session_start();
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OR Ltd | My Profile</title>

<!-- need to import bootstript css first, and import mystyle.css , it can be change the bootstrap style-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/1.js"></script>

</head>


<body onload="redirectFunc()">

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

<div class="container">
<h2>Personal information</h2>
<?php
$username = $_SESSION['username'];
$sql = "SELECT u.`Customer_id`,u.`Username`,u.`Password`,c.`Customer_name`,c.`Customer_address`,c.`Customer_tel` FROM `User` as u join `Customer` as c on u.`Customer_id` = c.`Customer_id` where u.`Username` = '$username';";
$result = $conn->query($sql);
// $sql = "SELECT COLUMN_NAME    
// FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME in ('User','Customer') and `COLUMN_NAME` not in ('Customer_id','Privilege')";
// $column = $conn->query($sql);
// if ($column->num_rows > 0){
//     if ($result->num_rows > 0){
//         $userval_row = $result->fetch_assoc();
//         while($colname_row = $column->fetch_assoc()){
//             echo "<p>".$colname_row["COLUMN_NAME"].":<span>".$userval_row[$colname_row["COLUMN_NAME"]]."</span></p>";
//         }
//     }
// }else{
//     echo "No record";
// }
if ($result->num_rows > 0){
    $userval_row = $result->fetch_assoc();
    // echo $userval_row["Customer_name"];
    // foreach ($userval_row as $val){
    //     echo $val;
    // }
}
echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
echo "<input type='hidden' name='Customer_id' value='".$userval_row['Customer_id']."'>";
echo "<label>Name</label> <input type='text' style='display:inline;' class='person_info' name='Customer_name' value='".$userval_row["Customer_name"]."' disabled>";
echo "<label>Address</label> <input type='text' class='person_info' name='Customer_address' value='".$userval_row["Customer_address"]."' disabled></p>";
echo "<p>Telephone: <input type='text' class='person_info' name='Customer_tel'  value='".$userval_row["Customer_tel"]."' disabled></p>";
// echo "<input type='button' class='person_info_btn' name='' value='Edit'><br><br>";
// echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
    echo "<p>Username: <input type='text' class='person_info_disable' name='username' value='".$userval_row["Username"]."' readonly style='color:grey;'></p>";
echo "<p>Password: <input type='text' class='person_info' name='password' value='".$userval_row["Password"]."' disabled></p>";

echo "<input type='button' class='edit_person_info_btn btn btn-info' name='edit_person_info' value='Edit'>";
echo "&nbsp";
echo "<input type='submit' class='person_info_btn btn btn-info' name='get_person_info' value='Save' disabled>";

echo "</form>";
if (mysqli_query($conn, $sql)){
    echo "";
}else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

if (isset($_POST['get_person_info'])){
        $customer_id = $_POST['Customer_id'];
        $customer_name = $_POST['Customer_name'];
        $customer_address = $_POST['Customer_address'];
        $customer_tel = $_POST['Customer_tel'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "UPDATE `Customer` SET `Customer_name` = '$customer_name', `Customer_address` = '$customer_address', `Customer_tel` = '$customer_tel' WHERE `Customer_id` = '$customer_id'";
    
        // $check = mysqli_fetch_array(mysqli_query($conn,$sql));
        if (mysqli_query($conn, $sql)){
            echo "";
        }else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
        echo $customer_id;
        header("Location: reset_pwd.php");
    };
    
$sql = "UPDATE `User` SET `Username` = '$username', `Password` = '$password' WHERE `Customer_id` = '$customer_id'";
if (mysqli_query($conn, $sql)){
    echo "";
}else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}
$conn->close();
?>

<Section class="section-4"></Section>

<!-- footer-->

<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>

<script>
// var x = $( "input[name=Customer_name]" ).val();
// alert (x);
$(document).ready(function(){
    $("input.edit_person_info_btn").click(function(){
        $("input.person_info").prop('disabled', false);
        $("input.person_info_btn").prop('disabled', false);

    });
    // $(":button.account_info_btn").click(function(){
    //     $("input.account_info").prop('disabled', false);    
    // });
});
</script>



</body>
</html>
