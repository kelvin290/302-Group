<?php
    ob_start();
    session_start();
    // Store Session Data
    //$_SESSION['login_user']= $uname;  // Initializing Session with value of PHP Variable
    //echo $_SESSION['login_user'];
    

    
	// if session is set direct to index
if (isset($_SESSION['username'])) {
    header("Location: contact.php");
    //exit;
}
	
	    require_once 'connect.php';
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    if (isset($_POST['btn-login'])) {
        $uname = $_POST['username'];
        $psw = $_POST['password'];
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        // $_SESSION['username'] = $uname;
        
        $query = "SELECT * FROM `User` WHERE `Username` = '$uname' and `Password` = '$psw' ";
        
        $check = mysqli_fetch_array(mysqli_query($conn, $query));
				
        if(isset($check)){
            $query2 = "SELECT * FROM `User` WHERE `Username` = '$uname' and `Privilege` = 'customer'" ;
            $privilege = mysqli_fetch_array(mysqli_query($conn, $query2));
            
            if (isset($privilege)){
 // for customer to game page
        $_SESSION['username'] = $uname;
      header("Location: product.php");
            }
	// for employees to inventory		
            else {
                $_SESSION['username'] = $uname;
                header("Location: customerOrder.php");
            }
        }
        else {
            header("Location: reLogin.php");
        }
    }
    
    mysqli_close($conn);
    
?>
