<?php
    ob_start();
    session_start();
//    Store Session Data
//    $_SESSION['login_user']= $uname;  // Initializing Session with value of PHP Variable
//    echo $_SESSION['login_user'];
    
    require_once 'connect.php';
    
//     if session is set direct to index
if (isset($_SESSION['username'])) {
//    header("Location: contact.php");
//    exit;
}
	
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
//    
    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);

    if(isset($_GET)){
        echo "ok";
        echo $_SESSION['username'];
        $cname = $_SESSION['username'];
        $sql = "SELECT Customer_id FROM User WHERE Username = '$cname'";
        $run = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $customerid = $run['Customer_id'];
        // echo $customerid;
        // $cart = $_SESSION['cart'];
        // echo "id: ".$cartitems[0].'<br>';
        $sql2 = "SELECT price FROM Item WHERE item_id = '$cart'";
        $run2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
        $price = $run2['price'];
        // echo $price;
        date_default_timezone_set('Asia/Hong_Kong');
        $date = date('Y-m-d H:i:s');
        // echo $date;

    foreach($cartitems as $id){
        $sql2 = "SELECT price FROM Item WHERE item_id = '$id'";
        $run2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
        $price = $run2['price'];

        $sql3 = "Insert into Cart (Customer_id, item_id, quantity, price, Order_date) VALUES ('$customerid', '$id', 1 , $price, '$date')";
        
        $sql6 = "Select inventory_no from Item WHERE item_id = '$id';";
        $run6 = mysqli_fetch_assoc(mysqli_query($conn, $sql6));
        $inventory = $run6['inventory_no'] - 1;
        
        $sql7 = "Update Item SET inventory_no = $inventory WHERE item_id = '$id';";
        if (mysqli_query($conn, $sql7)) {
            echo "Successful ";
        } else {
            echo "Error: " . $sql7 . "<br>" . mysqli_error($conn);
        }
        
        
        if (mysqli_query($conn, $sql3)) {
            echo "Successful ";
             unset($_SESSION['cart']);
        } else {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
        }
    }
        
        
        // create id
        $sql4= "SELECT `Order_id` FROM `Order` ORDER BY `Order_id` DESC LIMIT 1;";
        $result = $conn->query($sql4);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $old_id = $row['Order_id'];
        }else {
            echo "0 results";
        }
        $old_idno = preg_replace('/\D/', '', $old_id);
        $new_idno = strval(number_format($old_idno)+1);
        $order_id = "OR".str_repeat("0",strlen($old_idno)-strlen($new_idno)).$new_idno;
        // end to create id
        $sql5 = "INSERT INTO `Order` (`Order_id`, `Order_weight`, `Order_description`, `Quantity`, `Pickup_Ready_Day`, `Customer_id`, `Retailer_id`, `Logistics_id`, `Order_date`) VALUES ('$order_id', NULL, NULL, NULL, NULL, '$customerid', 'RE001', NULL, '$date');";
        
        if (mysqli_query($conn, $sql5)) {
            echo "Successful ";
            unset($_SESSION['cart']);
        } else {
            echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
        }

    }
    
    mysqli_close($conn);
    header('location:myOrder.php');

?>


