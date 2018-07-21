<?php 
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');

$category=$_GET['cat'];
$subcategory=$_GET['subcat'];
$pr_id=$_GET['pid'];
$pr_name=$_GET['pname'];

	

if(!empty($_POST['quantity'])){
	$qty2=$_GET['qty'];
	$customer=$_SESSION['usernam'];
	$brand=$_GET['brand'];
	$price=$_GET['price'];
	$qty=$_POST['quantity'];
	$tprice=$price*$qty;
    $qry="SELECT * FROM cart WHERE customer='$customer' AND pid='$pr_id'" ;
	$sqql = mysqli_query($db,$qry);

   $result=mysqli_num_rows($sqql);

   if($result==0){
	$qry="INSERT INTO cart(customer,pid,pname,brand,price,quantity,cat,subcat) VALUES ('".$customer."','".$pr_id."','".$pr_name."','".$brand."',$tprice,$qty,'".$category."','".$subcategory."')" ;
	$sqql = mysqli_query($db,$qry);
    
	header("Location:cart.php");
	}
	
	else{
		
		while($row = mysqli_fetch_array($sqql)){ 
		$qty1=$row['quantity'];
		}
		
		if($qty <= ($qty2-$qty1)){
		 $qry="UPDATE cart SET quantity = $qty+$qty1  WHERE customer='$customer' AND pid='$pr_id'" ;
		$sqql = mysqli_query($db,$qry);
   	
		header("Location:cart.php");
		}
		else {
			$qty3=$qty2-$qty1;
			if(($qty2-$qty1)==0){
			echo "<script type='text/javascript'>alert('You already have $qty1 items of this type in your cart !!! You cannot buy more items of this type');
					</script>";
			
					}
			else{
			echo "<script type='text/javascript'>alert('You already have $qty1 items of this type in your cart !!! You cannot buy more than $qty3 items of this type');
					</script>";
			}
		}


	}
}

?>
<html>
<head>
<title>View</title>
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
		
		<li><a href="cart.php"><i class="fas fa-cart-arrow-down"></i>  Cart  </a></li>
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
 <br>
 
	<div class="container"><div class="jumbotron">
	
<?php 
	if($category=="electronics"){
		if($subcategory=="Mobile" || $subcategory=="Laptop"){
		$qry="SELECT * FROM products JOIN Mobile ON products.pid= Mobile.pid AND products.pid = '$pr_id'" ;
		}
		else{
		$qry="SELECT * FROM products JOIN LCD ON products.pid= LCD.pid AND products.pid = '$pr_id'" ;
		}
	}
	
	else{
	$qry="SELECT * FROM products JOIN $category ON products.pid= $category.pid AND products.pid = '$pr_id'" ;
	}
	$sqql = mysqli_query($db,$qry);
	$num=mysqli_num_fields($sqql);
	function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}
	while($row = mysqli_fetch_array($sqql)){ 
	
	echo'<p style="float:left;">';
	echo '<img  src="'. $row['pname'] .'.jpg">';
	echo '</p><p>';
	echo '<b>&emsp;Product Name:</b>&nbsp &nbsp' .$row['pname'] .'';
	echo '<br>';
	echo '<b>&emsp;Brand:</b>&nbsp &nbsp'. $row['brand'] .'  <br />';
	for($i=10;$i<$num;$i++){
	$name=mysqli_field_name($sqql,$i);
	echo '<b>';
	echo '&emsp;';
	echo $name;
	echo '</b>';
	echo ':';
	echo '&nbsp';
	echo '&nbsp';
	echo $row[$name];
	echo '<br>';
	}
	
	echo '<b>&emsp;Price:</b>&nbsp &nbsp &#8377; ' . $row['price'] .' /-<br />';
    echo '<b>&emsp;Qty Available:</b>&nbsp '. $row['quantity'] . '';
	
    echo '<form name="form" method ="post" action ="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$pr_id.'&pname='.$pr_name.'&brand='.$row['brand'].'&price='.$row['price'].'&qty='.$row['quantity'].'">';

	echo '&emsp;';
	echo '<font size="10px"><b>Qty:</b></font>';
	echo '&emsp;';
	echo '<input type="number" name="quantity" min="1" max="'.$row['quantity'].'"></input>';
	echo '&emsp;';
	echo '<br>';
	echo '<br>';
	
	echo '&emsp;';
	
	echo '<button class="btn btn-primary btn-lg"><i class="fas fa-cart-plus"></i> ADD TO CART</button>';
    echo '</form>';

	echo '<br>';
	echo '<br>';
	echo '</p>';
	}
	?>
	</div></div>
	
 <br>
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
