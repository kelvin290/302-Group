<?php
    ob_start();
    session_start();
    
    require_once 'connect.php';
    

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);

    if(isset($_GET['remove'])){

        $delitem = $_GET['remove'];
        unset($cartitems[$delitem]);
        $itemids = implode(",", $cartitems);
        $_SESSION['cart'] = $itemids;
        
        if(empty($itemids)) {
            unset($_SESSION['cart']);
        }
    }
    
    header('location:shoppingCart.php');
    
    mysqli_close($conn);

?>
