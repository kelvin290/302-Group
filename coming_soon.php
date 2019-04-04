<!DOCTYPE html>
<html lang="en">
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
   <title>Coming Soon</title>

   
   
<!-- need to import bootstript css first, and import mystyle.css , it can be change the bootstrap style-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<header>
 <!-- logo -->
</header> 
<style>

body, html {
    height: 100%;
    margin: 0;
}

.background {
    background-image: url("https://images.pexels.com/photos/733475/pexels-photo-733475.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb");
    height: 100%;
    width: 100%;
    background-size: cover;
  }


.middle {
    position: absolute;
    font-family: monospace;
    font-size: 25px;
    top: 46%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
}

hr {
    margin: auto;
    width: 30%;
}



.bottom-right {
    position: absolute;
    bottom: 0;
    right: 16px;
}
</style>
 </head>
 
<body>

<div class="background">

  <div class="middle">
    <h1 style="font-size: 90px;">{{title}}</h1>
    <p>Member function still in progress......<br>Please look forward to it!</p>
 
    <hr>
    <h1>COMING SOON</h1>

    <section class="section-3"></section>
    
    <a href="index" style="font-size: 14px; color: white;">Click me to logout and go back home page.</a>
  </div>



      <div class="bottom-right">
    <p style="color:white";>&copy;2018 205CDE Store</p>
  </div>

</div>




                


</body>

  
</html>