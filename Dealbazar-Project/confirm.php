<?php 
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');

$flag1=$_GET['flag1'];
$flag2=$_GET['flag2'];

$customer=$_SESSION['usernam'];

if($flag1==0 && $flag2==0){
	
	$a=$_POST['check'];
	$n=count($a);
	$_SESSION['a']=$a;
	if($n==0){
		header("Location:cart.php");
	}
}

if($flag1==0 && $flag2==1){
	$a=$_SESSION['a'];
	$n=count($a);

}


if($flag1==1 ){
	$a=$_SESSION['a'];
	$n=count($a);
	 
	for($i=0;$i<$n;$i++){
	$qry="DELETE FROM cart WHERE customer = '$customer' AND pid = '$a[$i]' " ;
		$sqql = mysqli_query($db,$qry);
		header("Location:cart.php");
	} 
}



if($flag1==2){
	$a=$_SESSION['a'];
	$n=count($a);
	
	if(empty($_POST['addr']) || empty($_POST['pin'])){
		
		header("Location:confirm.php?flag1=0&flag2=1");
	}
	else{
	$pin=$_POST['pin'];
	$addr=$_POST['addr'];
	for($i=0;$i<$n;$i++){
	$qry="SELECT * FROM cart WHERE customer = '$customer' AND pid = '$a[$i]' " ;
	$sqql = mysqli_query($db,$qry);
	$qty1;
	$subcat;
	$cat;
	
	while($row = mysqli_fetch_array($sqql)){ 
	$qty1=$row['quantity'];
	$cat=$row['cat'];
	$subcat=$row['subcat'];
	$brand=$row['brand'];
	$price=$row['price'];
	$pid=$row['pid'];
	$pname=$row['pname'];
	
	$tj="INSERT INTO orders (customer,pid,pname,brand,price,quantity,cat,subcat,shipping,pin) Values ('$customer',$pid,'$pname','$brand',$price,$qty1,'$cat','$subcat','$addr','$pin')";
	$tj2= mysqli_query($db,$tj);
	}
	
	$qry1="SELECT * FROM products WHERE  pid = '$a[$i]' " ;
	$sqql1 = mysqli_query($db,$qry1);
	$qty2;
	
	while($row = mysqli_fetch_array($sqql1)){ 
	$qty2=$row['quantity'];
	}
	
	$qty3=$qty2-$qty1;
	
$qry="DELETE FROM cart WHERE customer = '$customer' AND pid = '$a[$i]' " ;
	$sqql = mysqli_query($db,$qry);
		
	
	if(($qty3)==0){
	
	$qry="DELETE FROM products WHERE  pid = '$a[$i]' " ;
	$sqql = mysqli_query($db,$qry);

	if($cat=="electronics"){
		if($subcat=="Mobile" || $cat == "Laptop"){
				$qry1="DELETE FROM Mobile WHERE   pid = '$a[$i]' " ;
				$sqql1 = mysqli_query($db,$qry1);
	
		}
		else{
			$qry1="DELETE FROM LCD WHERE   pid = '$a[$i]' " ;
			$sqql1 = mysqli_query($db,$qry1);
		
		}
		
	}
	
	else{
	$qry1="DELETE FROM $cat WHERE  pid = '$a[$i]' " ;
	$sqql1 = mysqli_query($db,$qry1);
	
	}
	}
		
	else{
	$qry=" UPDATE products SET quantity = $qty3  WHERE  pid = '$a[$i]' " ;
	$sqql = mysqli_query($db,$qry);
	}
	
	}
	}
}

?>


<html>
<head>
<title>Confirm</title>
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

 <div class="container jumbotron">

<?php
if($flag1==0){

	echo '<table class="table table-hover table-striped">';
	echo '<tr>';
	echo '<th>Product ID&emsp;</th>';
	echo '<th>Product Name&emsp;</th>';
	echo '<th>Brand&emsp;</th>';
	echo '<th>Total Price&emsp;</th>';
	echo '<th>Quantity&emsp;</th>';
	echo '</tr>';


	
	if((isset($_POST['remove']))&&($flag2!=1)){
	for($i=0;$i<$n;$i++){
	$qry="SELECT * FROM cart WHERE customer = '$customer' AND pid = '$a[$i]' " ;
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
	echo '</tr>';
	}
	}
	echo '</table>';
	echo '</div>';
	echo '<form name="form" method ="post" action ="confirm.php?flag1=1&flag2=0">';

	echo '&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<button class="btn btn-danger btn-lg">Please Confirm to Delete</button>';
	echo '</form>';
	
	}
	else if((isset($_POST['buy']))||($flag2==1)){
		$totalprice=0;
	for($i=0;$i<$n;$i++){
	$qry="SELECT * FROM cart WHERE customer = '$customer' AND pid = '$a[$i]' " ;
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	$result=mysqli_num_rows($sqql);

	while($row = mysqli_fetch_array($sqql)){ 
	$totalprice=$totalprice+$row['price'];
	echo '<tr>';
	
	echo '<td>'.$row['pid'].'</td>';
	echo '<td>'.$row['pname'].'</td>';
	echo '<td>'.$row['brand'].'</td>';
	echo '<td>&#8377;'.$row['price'].'</td>';
	echo '<td>'.$row['quantity'].'</td>';
	echo '</tr>';
	}
	}
	echo '</table>';
	echo 'Total Amount : &#8377;'.$totalprice.'';
	echo '</div>';
	echo '<div class="form-group">';
	echo '<form name="form" method ="post" action ="confirm.php?flag1=2&flag2=0">';

	echo '&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;';
	
	echo '<b>Enter Shipping Address:<b/>';
	echo '&nbsp;&emsp;';
	
	echo '<input type="text" name ="addr"  >';
	
	echo '&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;';
	
	echo '<b>Enter Pin Code:<b/>';
	echo '&nbsp;&emsp;';
	
	echo '<input type="text" name ="pin" pattern="[0-9]{6,6}"  title="Pin must contain six digits!" >';
	echo '<br>';
	echo '<br>';echo '<br>';
	echo '&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;';
	echo '<button class="btn btn-success btn-lg">Confirm to Place Order</button>';
	
	echo '</form>';
	echo '</div>';
	}

}

if($flag1==2){
	
	echo '<i class="fas fa-shipping-fast" style="font-size:5em"></i>';
	echo'<h2>Your order will be shipped to <b>'.$_POST['addr'].'</b> in three days!!!<h2>';
	echo'<h2><b>Thankyou For Shopping!</b></h2>';
}
?>



 
<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
