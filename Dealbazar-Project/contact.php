<?php
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');
?>

<html>
<head>
<title>Contact us</title>
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
	  
      <a class="navbar-brand active"  href="startup.php" ><i class="fas fa-shopping-cart"> </i> <b><i>    Deal <i class="fab fa-bitcoin"></i>azar</i></b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
      <ul class="nav navbar-nav">
	  <!--<li><a href="startup.html">Get Started <span class="sr-only">(current)</span></a></li> -->
		<?php 
		 if(empty($_SESSION['usernam'])){
		?>
        <li><a href="login.php">Home</a></li>
        <?php 
		 }
		 else {
		?>
		<li><a href="home.php">Home</a></li>
		<?php
		 }
		?>
		
        <li ><a href="about.php">About us</a></li>
        <li class="active"><a href="contact.php">Contact us</a></li>
		<?php
		if(!empty($_SESSION['usernam'])){?>
		
		<li><a href="cart.php"><i class="fas fa-cart-arrow-down"></i>  Cart  </a></li>
	  <?php
		}
		?>
	  </ul>
	  <?php
	  if(empty($_SESSION['usernam'])){
      ?>
	  <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"  ><i class="fas fa-user-plus"></i> Sign Up </a></li>
        <li><a href="login.php#login"  ><i class="fas fa-user"></i> Login </a></li>
      </ul>
	  <?php
	    }
	    else{
		?>
	  <ul class="nav navbar-nav navbar-right" >
		<li><font color="white"> <?php echo $_SESSION['usernam'] ?></li>
        <li><a href="logout.php"><i class="fas fa-power-off"></i> Logout </a></li></font>
      </ul>
	  
	  <?php
		}
	  ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
 </nav>

 
 
 <div class="container test3 ">
 <div class="jumbotron">
 
 <b><h2> Contact us...</h2></b>
 <div class="row">
	<div class="col-lg-4">
	<div class="thumbnail">
	<img src="pradeep.jpg">
	<b>Mr. Pradeep Kumar</b>
	<br>
	Mob no: 8938922705
	<br>
	email id: lit2016034@iiitl.ac.in
	</div>
	</div>
	<div class="col-lg-4">
	<div class="thumbnail">
	<img src="chirag.jpg">
	<b>Mr. Chirag Mittal</b>
	<br>
	Mob no: 8433203865
	<br>
	email id: lit2016022@iiitl.ac.in
	</div>
	</div>
	<div class="col-lg-4">
	<div class="thumbnail">
	<img src="shubham.jpg" >
	<b>Mr. Shubham Upadhyay</b>
	<br>
	Mob no: 7080425667
	<br>
	email id: lit2016040@iiitl.ac.in
	</div>
	</div>
	</div>
 
 
 <div class="row">
	<div class="col-lg-4">
	<div class="thumbnail">
	<img src="bittu.jpg">
	<b>Mr.Bittu Dalal</b>
	<br>
	Mob no:	8496523184 
	<br>
	email id: lit2016030@iiitl.ac.in
	</div>
	</div>
	
	<div class="col-lg-4">
	<div class="thumbnail">
	<img src="taru.jpg">
	<b>Mr. Taru Jain</b>
	<br>
	Mob no: 8449490390
	<br>
	email id: lit2016031@iiitl.ac.in
	</div>
	</div>
	</div>
 
 </div>
 </div>


<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
