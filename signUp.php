<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OR Ltd | Sign Up</title>

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
<li><a href="index.php">Home</a></li>
<li><a href="game(cherry).php">Product</a></li>
<li><a href="about.php">About</a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
<li><button class="btn btn-info navbar-btn"  onclick="window.location.href = 'signUp.php';">SignUp</button> </li>
<li><button class="btn btn-info navbar-btn"  onclick="window.location.href = 'login.php';">Login</button> </li>
</ul>
</nav>
<!-- End of the navigation bar-->

<div class="container">
<h3>Signup here!</h3>
<form name="signup" action="new_ac.php" method='POST'>
<p style="color:red;">* required</p>
Create Username<span style="color:red;">*</span>: <input type="text" name="username" value="" required ><br>
Create Password<span style="color:red;">*</span>: <input type="password" name="password" value="" required><br>
Name<span style="color:red;">*</span>: <input type="text" placeholder="Enter name" name="customer_name" required>
Address: <input type="text" placeholder="Enter address" name="customer_address" >
Telephone number: <input type="text" placeholder="Enter telephone number" name="customer_tel">

<input class="btn btn-info" onclick="myFunction5()" type="submit" value="Enter">

</form>
</div>

<Section class="section-4"></Section>

<!-- footer-->

<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>

<!-- JavaScript to check the input box.And display username and password on alert box -->
    <script>

      function myFunction5() {
      var x = document.forms["signup"]["username"].value;
      var y = document.forms["signup"]["password"].value;
    if (x == "") {
        alert("Please type your username whatever you want !");
        return false;
      }
        if (y == "") {
        alert("Please type your password whatever you want !");
        return false;
      }
  
  else {
     window.alert("Created your account.Please check the infomation. \nUsername:"+ x +"\nPasswrod:" + y + "\nRedirecting to home page........");
     window.location.assign("/index");
        }


  
     }
   </script>
</body>

</html>
