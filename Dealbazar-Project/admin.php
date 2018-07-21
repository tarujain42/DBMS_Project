
<?php
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');
?>

<html>
<head>
<title>Admin</title>

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
	  
      <a class="navbar-brand active"  href="#" ><i class="fas fa-shopping-cart"> </i> <b><i>    Deal <i class="fab fa-bitcoin"></i>azar</i></b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
     
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
 
<br>
<br>
<br>



&emsp;&emsp;&emsp;&emsp;&emsp;<font size="45px"> <b>Products</b> </font><br>
 <div class="container jumbotron">

<?php

	echo '<table class="table table-hover table-striped">';
	echo '<tr>';
	echo '<th>Product ID</th>';
	echo '<th>Product Name</th>';
	echo '<th>Brand&emsp;&emsp;</th>';
	echo '<th>Price&emsp;&emsp;</th>';
	echo '<th>Quantity&emsp;&emsp;</th>';
	echo '<th>Category&emsp;&emsp;</th>';
	echo '<th>Subcategory&emsp;&emsp;</th>';
	
	echo '<th>Seller Name&emsp;&emsp;</th>';
	echo '</tr>';

	$qry="SELECT * FROM products " ;
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	$result=mysqli_num_rows($sqql);

	while($row = mysqli_fetch_array($sqql)){ 
	
	echo '<tr>';
	echo '<td>'.$row['pid'].'</td>';
	echo '<td>'.$row['pname'].'</td>';
	echo '<td>'.$row['brand'].'</td>';
	echo '<td>&#8377;'.$row['price'].'</td>';
	echo '<td>'.$row['quantity'].'</td>';
	echo '<td>'.$row['cat'].'</td>';
	echo '<td>'.$row['subcat'].'</td>';
	echo '<td>'.$row['seller_name'].'</td>';
	echo '</tr>';
	}
	
	echo '</table>';
	echo '</div>';

?>



&emsp;&emsp;&emsp;&emsp;&emsp;<font size="45px"> <b>Transaction History</b> </font><br>
 <div class="container jumbotron">

<?php

	echo '<table class="table table-hover table-striped">';
	echo '<tr>';
	echo '<th>Product ID</th>';
	echo '<th>Customer&emsp;&emsp;</th>';
	echo '<th>Product Name</th>';
	echo '<th>Brand&emsp;&emsp;</th>';
	echo '<th>Price&emsp;&emsp;</th>';
	echo '<th>Quantity</th>';
	echo '<th>Category&emsp;&emsp;</th>';
	echo '<th>Subcategory&emsp;&emsp;</th>';
	echo '<th>Shipping Address&emsp;</th>';
	echo '<th>Pin Code</th>';
	echo '</tr>';

	$qry="SELECT * FROM orders " ;
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	$result=mysqli_num_rows($sqql);
	$totalprice=0;	
	while($row = mysqli_fetch_array($sqql)){ 
	$totalprice=$totalprice+$row['price'];
	echo '<tr>';
	echo '<td>'.$row['pid'].'</td>';
	echo '<td>'.$row['customer'].'</td>';
	echo '<td>'.$row['pname'].'</td>';
	echo '<td>'.$row['brand'].'</td>';
	echo '<td>&#8377;'.$row['price'].'</td>';
	echo '<td>'.$row['quantity'].'</td>';
	echo '<td>'.$row['cat'].'</td>';
	echo '<td>'.$row['subcat'].'</td>';
	echo '<td>'.$row['shipping'].'</td>';
	echo '<td>'.$row['pin'].'</td>';
	echo '</tr>';
	}
	
	echo '</table>';
	
	echo '<b>Total Amount</b> : &#8377;'.$totalprice.'';
	echo '</div>';

?>




&emsp;&emsp;&emsp;&emsp;&emsp;<font size="45px"> <b>Users</b> </font><br>
 <div class="container jumbotron">

<?php

	echo '<table class="table table-hover table-striped">';
	echo '<tr>';
	echo '<th>First Name</th>';
	echo '<th>Last Name&emsp;</th>';
	echo '<th>Type&emsp;&emsp;&emsp;&emsp;</th>';
	echo '<th>Email ID</th>';
	echo '<th>Password&emsp;</th>';
	echo '</tr>';

	$qry="SELECT * FROM users " ;
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	$result=mysqli_num_rows($sqql);

	while($row = mysqli_fetch_array($sqql)){ 
	
	echo '<tr>';
	echo '<td>'.$row['firstname'].'</td>';
	echo '<td>'.$row['lastname'].'</td>';
	echo '<td>'.$row['type'].'</td>';
	echo '<td>'.$row['id'].'</td>';
	echo '<td>'.$row['password'].'</td>';
	echo '</tr>';
	}
	
	echo '</table>';
	echo '</div>';

?>


<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>