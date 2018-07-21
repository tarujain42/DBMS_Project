<?php 
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');

?>
<html>
<head>
<title>Cart</title>
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
		
		
        <li ><a href="home.php">Home</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
	  </ul>
	  
	  
      	
      <ul class="nav navbar-nav navbar-right" >
		<li><font color="white"> <?php echo $_SESSION['usernam'] ?></li>
        <li><a href="logout.php"><i class="fas fa-power-off"></i> Logout </a></li></font>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
 </nav>
<br>
<br>
<br>
<br>
<br>
 &emsp;<i class="fas fa-shopping-cart" style="font-size:5em"></i>
 <div class="container jumbotron">

<?php
	$customer=$_SESSION['usernam'];
	$qry="SELECT * FROM cart WHERE customer = '$customer' " ;
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	$result=mysqli_num_rows($sqql);
	
	if($result!=0){
		
	while($row = mysqli_fetch_array($sqql)){ 
	$pid=$row['pid'];
	$qty=$row['quantity'];
	
	$qry2="SELECT * FROM products WHERE pid='$pid' " ;
	$sqql2 = mysqli_query($db,$qry2);
	$num=mysqli_num_fields($sqql2);
	$res=mysqli_num_rows($sqql2);
	if($res==0){
			$qry3="DELETE FROM cart WHERE customer ='$customer' AND pid='$pid' " ;
			$sqql3 = mysqli_query($db,$qry3);
	}
	
	else{
		while($row2 = mysqli_fetch_array($sqql2)){ 
			$qty2=$row2['quantity'];
		}
		
		if($qty2<$qty){
			$qry3="UPDATE cart SET quantity = $qty2  WHERE customer='$customer' AND pid='$pid' " ;
			$sqql3 = mysqli_query($db,$qry3);
			
		}
	}
	}
	}
	
	$qry="SELECT * FROM cart WHERE customer = '$customer' " ;
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	$result=mysqli_num_rows($sqql);
	
	if($result!=0){
	
	echo '<table class="table table-hover table-striped">';

	echo '<tr>';
	echo '<th>Select&emsp;</th>';
	echo '<th>Product ID&emsp;</th>';
	echo '<th>Product Name&emsp;</th>';
	echo '<th>Brand&emsp;</th>';
	echo '<th>Total Price&emsp;</th>';
	echo '<th>Quantity&emsp;</th>';
	echo '</tr>';
	$i=0;
	$totalprice=0;
	echo '<form name="form" method ="post" action ="confirm.php?flag1=0&flag2=0">';
	while($row = mysqli_fetch_array($sqql)){ 
	
$totalprice=$totalprice+$row['price'];
	echo '<tr>';
	echo '<td><input type="checkbox" name="check[]" value='.$row['pid'].' ></td>';
	echo '<td>'.$row['pid'].'</td>';
	echo '<td>'.$row['pname'].'</td>';
	echo '<td>'.$row['brand'].'</td>';
	echo '<td>&#8377;'.$row['price'].'</td>';
	echo '<td>'.$row['quantity'].'</td>';
	echo '</tr>';
	$i++;
	}
	echo '</table>';
	echo 'Total Amount: &#8377;'.$totalprice.'';
	}
	
	else{
		echo '<h2>You have added nothing into your cart!!!</h2>';
	}
?>

 </div>
 <?php 
 if($result!=0){?>
 &emsp;&emsp;
&emsp;&emsp;
&emsp;&nbsp
	
	<button class="btn btn-danger btn-lg" name="remove" >Remove from Cart!!</button>&nbsp
	&nbsp
	&nbsp
	&nbsp
	
	<button class="btn btn-primary btn-lg" name="buy">Buy Now</button>
</form>
	<?php
 }
 ?>
<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
