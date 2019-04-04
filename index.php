<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
   <title>OR Ltd | Home</title>

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


<br>
<!-- End of the navigation bar-->

<!-- Section of home page-->

            <div class="home-title">
                <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "> 
                        <h2>Hello!</h2>
                        <p>Hope you have a great shopping experience!</p>
                    </div>
                </div>
			</div>

       
<h3 class="text-center">Recommended Products</h3>
						

<!--slideshow-->			
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
    <center>
  <img src="uploads/adidas_Ultra_Boost.jpg" width="530" height="480">
    </center>

</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
    <center>
  <img src="uploads/Nintendo_Switch.jpg" width="530" height="480">
  </center>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <center>
  <img src="uploads/apple_tv.jpeg" width="530" height="480">
  </center>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>



<!-- footer-->

<div class="footer">
<div class="company-name"><p>OR Ltd &copy; 2019</p></div>
</div>



<!--sildeshow -->
<script>
var slideIndex = 0;
displaySlides();

function displaySlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(displaySlides, 1500); // 1500 = 1.5second
}
</script>


</body>

  
</html>
