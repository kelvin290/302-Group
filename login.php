<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OR Ltd | Login</title>

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
<li><a href="product.php">Product</a></li>
<li><a href="about.php">About</a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
<li><button class="btn btn-info navbar-btn"  onclick="window.location.href = 'signUp.php';">SignUp</button> </li>
<li><button class="btn btn-info navbar-btn"  onclick="window.location.href = 'login.php';">Login</button> </li>
</ul>
</nav>
<!-- End of the navigation bar-->

<div class="container">
<form name="login" action="login_ac.php" method='POST'>
<h3 class="about-text">Login Page</h3>
<label for="username"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="username" required>
<label for="password"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="password" required>
<br>
<button type="submit" name="btn-login" class="btn btn-info">Login</button>
<button type="button" class="btn btn-info">Cancel</button>
</form>
</div>

<!-- footer -->
<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>

</body>
</html>
