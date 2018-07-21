<?php 
session_start();
ob_start();
 $db= mysqli_connect('localhost','root','','login');
 
 if(empty($_POST['search'])){
	 header("Location:home.php");
 }

 $search_s="SELECT * FROM products WHERE  pname LIKE '%".$_POST['search']."%' OR  cat LIKE '%".$_POST['search']."%' OR subcat LIKE '%".$_POST['search']."%' OR brand LIKE '%".$_POST['search']."%'";
 $search_q=mysqli_query($db,$search_s);
 $result=mysqli_num_rows($search_q);
 if($result!=0){
	
 $i = 0;

// Establish the output variable
$dyn_table = '<div class="container"><div class="row">';
while($row = mysqli_fetch_array($search_q)){ 
    
    $id = $row["pid"];
    $pname = $row["pname"];
    $brand=$row["brand"];
    $price=$row["price"];
    $quantity=$row["quantity"];
	$category=$row["cat"];
	$subcategory=$row["subcat"];
    
    
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table .= '<div class="col-lg-4">'.'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		 <b>Brand:</b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp '. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/-<br />
                  <b>Qty:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    } else {
        $dyn_table .= '<div class="col-lg-4">' .'<div class="thumbnail">
		<img src="'. $pname .'.jpg">
		 <b>Product Name:</b> ' .$pname .'
		<br>
		<b>Brand:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $brand .'  <br />
		 <b>Price:</b>       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#8377; ' . $price .'/-<br />
         <b>Qty:</b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'. $quantity . '<br />
		 	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <u><b><a href="view.php?cat='.$category.'&subcat='.$subcategory.'&pid='.$id.'&pname='.$pname.'" >View Product Details</a></b></u>
        </div>'.'</div>';
    }
    $i++;
}
$dyn_table .= '</div></div>';
 }
 unset($_POST['search']);
 ?>
 
 
 <html>
 
 <head>
 <title>Search</title>
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
		
		
        <li><a href="home.php">Home</a></li>
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


 
 <?php 
 if($result!=0){
	echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="30px">Search Results</font>'; 
 
	echo $dyn_table;
 }
 else 
 {
	echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="20px">No Results Found!!</font>'; 
 }
 ?>
 
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