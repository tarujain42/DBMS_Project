<?php 
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="boot.css">
<link rel="stylesheet" type="text/css" href="start.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body >

 


<nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
      <a class="navbar-brand " href="startup.php"  ><i class="fas fa-shopping-cart"> </i> <b><i>    Deal <i class="fab fa-bitcoin"></i>azar</i></b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		
		
        <li class ="active"><a href="home.php">Home</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
		<li><a href="cart.php"><i class="fas fa-cart-arrow-down"></i>  Cart  </a></li>
	  </ul>
	  
	   <form class="navbar-form navbar-left"  name="form" method ="post" action ="search.php">
        <div class="form-group">
          <input type="text" name="search" class="form-control" size ="30" maxlength="40" "/>
        </div>
        <button type="submit" name="submit" value="search" class="btn btn-default">Submit</button>
      </form>
	  
      	
      <ul class="nav navbar-nav navbar-right" >
	  
		<li><font color="white"> <?php echo $_SESSION['usernam'] ?></li>
        <li><a href="logout.php"><i class="fas fa-power-off"></i> Logout </a></li></font>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
 </nav>
 
 <div class= "back">

 <img class="mySlides" src="r3.jpg"  height="90%">
<img class="mySlides" src="r1.jpg"  height="90%">
<img class="mySlides" src="r2.jpg"  height="90%">
<img class="mySlides" src="r9.jpg"  height="90%">
<img class="mySlides" src="r4.jpg"  height="90%">
<img class="mySlides" src="r5.jpg"  height="90%">
<img class="mySlides" src="r6.jpg"  height="90%">
<img class="mySlides" src="r7.png"  height="90%">
<img class="mySlides" src="r8.jpg"  height="90%">

  <button class="w3-button w3-black b1" margin-left="13%" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black b2" margin-right="13%" onclick="plusDivs(1)">&#10095;</button>

 </div>

 <div class="row">
	<div class="col-lg-4">
	<div class="thumbnail tjj">
	<a href="subcategory.php?category=electronics"><img src="electronics.jpg" onmouseover ="zoomIn1()" onmouseout = "zoomOut1()" id="electronic"></a>
	<div class="tjn">
	<a href="subcategory.php?category=electronics" ><b>Electronics</b></a>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="thumbnail tjj">
	<a href="subcategory.php?category=books"><img src="bk3.jpg" onmouseover ="zoomIn2()" onmouseout = "zoomOut2()" id="book"></a>
	<div class="tjn1">
	<a href="subcategory.php?category=books" ><b>Books</b></a>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="thumbnail tjj">
	<a href="subcategory.php?category=shoes"><img src="sh1.jpg" onmouseover ="zoomIn3()" onmouseout = "zoomOut3()" id="shoes"></a>
	<div class="tjn1">
	<a href="subcategory.php?category=shoes"><b>Shoes</b></a>
	</div>
	</div>
	</div>
	</div>
	
<br>
<br>
 <div class="row">
	<div class="col-lg-4">
	<div class="thumbnail tjj">
	<a href="subcategory.php?category=sports"><img src="f1.jpg"onmouseover ="zoomIn4()" onmouseout = "zoomOut4()" id="sports"></a>
	<div class="tjn1">
	<a href="subcategory.php?category=sports"><b>Sports</b></a>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="thumbnail tjj">
	<a href="subcategory.php?category=clothes"><img src="cll2.png"onmouseover ="zoomIn5()" onmouseout = "zoomOut5()" id="clothes"></a>
    <div class="tjn1">
	<a href="subcategory.php?category=clothes"><b>Clothes</b></a>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="thumbnail tjj">
	<a href="subcategory.php?category=cars"><img src="cr1.jpg" onmouseover ="zoomIn6()" onmouseout = "zoomOut6()" id="car"></a>
	<div class="tjn1">
	<a href="subcategory.php?category=cars"><b>Cars</b></a>
	</div>
	</div>
	</div>
	</div>
	
	<br>
	
	<div class=" jumbotron ty">
	
	 <div class="pd"> <b> Keep in touch:  </b></div>
	   
	
	<div class="pd2"> In case of any query:<a href="contact.php"><div class="cn"> Contact us </div></a></div>
	 
	  
	<div class="pd">
	   <i class="fab fa-facebook-square" style="font-size:2em" ></i>    &nbsp  <i class="fab fa-twitter-square" style="font-size:2em"></i>    &nbsp <i class="fab fa-instagram" style="font-size:2em"></i>  &nbsp      <i class="fab fa-linkedin" style="font-size:2em"></i>
	
	</div>
	 </div>
	
<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
