<?php
// Include database connection
session_start();
ob_start();

$db= mysqli_connect('localhost','root','','login');



$_SESSION['category']=$_GET['category'];

if($_SESSION['category']=="electronics"){
	$product1="Mobile";
	$product2="Laptop";
	$product3="LCD";
	}
	
else if($_SESSION['category']=="books"){
	$product1="Biography";
	$product2="Horror";
	$product3="Romantic";
	}
else if($_SESSION['category']=="shoes"){
	$product1="Sneaker";
	$product2="Sports";
	$product3="Formal";
	}
	
else if($_SESSION['category']=="sports"){
	$product1="Cricket";
	$product2="Football";
	$product3="Badminton";
	}	
	
else if($_SESSION['category']=="clothes"){
	$product1="Men";
	$product2="Women";
	$product3="Kids";
	}	
	
else if($_SESSION['category']=="cars"){
	$product1="Luxury";
	$product2="Suv";
	$product3="Hatchback";
	}	


	
	// SQL query to interact with info from our database
$query="SELECT * FROM products WHERE subcat = '$product1' LIMIT 3";
$sqql = mysqli_query($db,$query); 
$i = 0;
// Establish the output variable
$dyn_table = '<div class="container">';
while($row = mysqli_fetch_array($sqql)){ 
    
    $id = $row["pid"];
    $pname = $row["pname"];
    $brand=$row["brand"];
    $price=$row["price"];
    $quantity=$row["quantity"];
    $category=$row["cat"];
	$subcategory=$row["subcat"];
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table .= '<div class="row"><div class="col-lg-4">'.'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		 <b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/- <br />
                  <b>Qty Available:</b> &nbsp '. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    } else {
        $dyn_table .= '<div class="col-lg-4">' .'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		<b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/- <br />
         <b>Qty Available:</b> &nbsp '. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    }
    $i++;
}
$dyn_table .= '</div></div>';



$query="SELECT * FROM products WHERE subcat = '$product2' LIMIT 3";
$sqql = mysqli_query($db,$query); 
$i = 0;

// Establish the output variable
$dyn_table2 = '<div class="container">';
while($row = mysqli_fetch_array($sqql)){ 
    
    $id = $row["pid"];
    $pname = $row["pname"];
    $brand=$row["brand"];
    $price=$row["price"];
    $quantity=$row["quantity"];
    
    $category=$row["cat"];
	$subcategory=$row["subcat"];
	
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table2 .= '<div class="row"><div class="col-lg-4">'.'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		 <b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/- <br />
                  <b>Qty Available:</b> &nbsp '. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    } else {
        $dyn_table2 .= '<div class="col-lg-4">' .'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		<b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/- <br />
         <b>Qty Available:</b>  &nbsp'. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    }
    $i++;
}
$dyn_table2 .= '</div></div>';


$query="SELECT * FROM products WHERE subcat = '$product3' LIMIT 3";
$sqql = mysqli_query($db,$query); 
$i = 0;

// Establish the output variable
$dyn_table3 = '<div class="container">';
while($row = mysqli_fetch_array($sqql)){ 
    
    $id = $row["pid"];
    $pname = $row["pname"];
    $brand=$row["brand"];
    $price=$row["price"];
    $quantity=$row["quantity"];
    
    $category=$row["cat"];
	$subcategory=$row["subcat"];
	
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table3 .= '<div class="row"><div class="col-lg-4">'.'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		 <b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/- <br />
                  <b>Qty Available:</b> &nbsp'. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    } else {
        $dyn_table3 .= '<div class="col-lg-4">' .'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		<b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/- <br />
         <b>Qty Available:</b> &nbsp'. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    }
    $i++;
}
$dyn_table3 .= '</div></div>';
?>
<html>
<head> 
<title>Sub_category</title>
<link rel="stylesheet" type="text/css" href="boot.css">
<link rel="stylesheet" type="text/css" href="start.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body>

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


<p style="text-align:left;"> 
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="50px"> <?php echo $product1; ?> </font><br>
<span style="float:right;">
<font color="blue"><i>
<?php
echo '<a href="allproducts.php?value1='.$product1.'&value2=subcat ">See more...</a>';
?></i>
</font>
</span></p>

<?php echo $dyn_table;?> 

<p style="text-align:left;">
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="50px"><?php echo $product2; ?> </font><br>
<span style="float:right;">
<font color="blue"><i>
<?php
echo '<a href="allproducts.php?value1='.$product2.'&value2=subcat ">See more...</a>';
?></i></font>
</span></p>

<?php echo $dyn_table2;?> 


<p style="text-align:left;">
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="50px"><?php echo $product3; ?></font><br>
<span style="float:right;">
<font color="blue"><i>
<?php
echo '<a href="allproducts.php?value1='.$product3.'&value2=subcat ">See more...</a>';
?></i>
</font>
</span></p>

<?php echo $dyn_table3;?> 


<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>