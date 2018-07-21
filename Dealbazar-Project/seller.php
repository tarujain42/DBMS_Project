
<?php
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');
?>

<html>
<head>
  <script type="text/javascript">
  function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML="";
  if(s1.value == "electronics"){
	var optionArray=["Select|--Select--","Mobile|Mobile","Laptop|Laptop","LCD|LCD"];
  }
  else if(s1.value=="sports"){
	var optionArray=["Select|--Select--","Cricket|Cricket","Football|Football","Badminton|Badminton"];
  }
   else if(s1.value=="books"){
	var optionArray=["Select|--Select--","Romantic|Romantic","Horror|Horror","Biography|Biography"];
  }
   else if(s1.value=="shoes"){
	var optionArray=["Select|--Select--","Sneaker|Sneaker","Sports|Sports","Formal|Formal"];
  }
   else if(s1.value=="clothes"){
	var optionArray=["Select|--Select--","Men|Men","Women|Women","Kids|Kids"];
  }
   else if(s1.value=="cars"){
	var optionArray=["Select|--Select--","Luxury|Luxury","SUV|SUV","Hatchback|Hatchback"];
  }
  var i=0;
  for(var option in optionArray){
	var pair=optionArray[option].split("|");
	var newOption=document.createElement("option");
	if(i==0){
		newOption.selected="selected";
		newOption.disabled="disabled";
		newOption.value="";
	}
	i++;
	newOption.innerHTML=pair[1];
	s2.options.add(newOption);
  }
  }
  </script>
  
  <script>
  function change(){
	var selectBox = document.getElementById("slct2");
    var selected = selectBox[selectBox.selectedIndex].value;
	
    var a1 = document.getElementById("t1");
	var a2 = document.getElementById("t2");
	var a3 = document.getElementById("t3");
	var a4 = document.getElementById("t4");
	var a5 = document.getElementById("t5");
	var a6 = document.getElementById("t6");
    var a7 = document.getElementById("t7");	
	a1.style.display = "none";
    a2.style.display = "none";
    a3.style.display = "none";
    a4.style.display = "none";
    a5.style.display = "none";
    a6.style.display = "none";
    a7.style.display = "none";	
	
	var x=document.getElementById("ram1");
		x.required=false;
		var x=document.getElementById("harddisk1");
		x.required=false;
		var x=document.getElementById("battery1");
		x.required=false;
		var x=document.getElementById("processor1");
		x.required=false;
		var x=document.getElementById("warranty1");
		x.required=false;
		
		var x=document.getElementById("type2");
		x.required=false;
		var x=document.getElementById("size2");
		x.required=false;
		var x=document.getElementById("warranty2");
		x.required=false;
		
		var x=document.getElementById("author3");
		x.required=false;
		var x=document.getElementById("language3");
		x.required=false;
		
		var x=document.getElementById("warranty4");
		x.required=false;
		var x=document.getElementById("colour4");
		x.required=false;
		var x=document.getElementById("size4");
		x.required=false;
		
		var x=document.getElementById("warranty7");
		x.required=false;
		
		var x=document.getElementById("type6");
		x.required=false;
		var x=document.getElementById("colour6");
		x.required=false;
		var x=document.getElementById("size6");
		x.required=false;


		var x=document.getElementById("mileage5");
		x.required=false;
		var x=document.getElementById("colour5");
		x.required=false;
		var x=document.getElementById("engine5");
		x.required=false;
		var x=document.getElementById("topspeed5");
		x.required=false;
		var x=document.getElementById("gear5");
		x.required=false;
		var x=document.getElementById("fueltype5");
		x.required=false;
				
	
	
	
	
	
    if(selected == "Mobile" || selected == "Laptop"){
		
		var x=document.getElementById("ram1");
		x.required=true;
		var x=document.getElementById("harddisk1");
		x.required=true;
		var x=document.getElementById("battery1");
		x.required=true;
		var x=document.getElementById("processor1");
		x.required=true;
		var x=document.getElementById("warranty1");
		x.required=true;
		
		a1.style.display = "block";
    }
	
	else if(selected == 'LCD'){
		
		var x=document.getElementById("type2");
		x.required=true;
		var x=document.getElementById("size2");
		x.required=true;		
		var x=document.getElementById("warranty2");
		x.required=true;
		
		a2.style.display = "block";
    }
	
	else if(selected =='Horror'||selected=='Romantic' || selected=='Biography'){
        
		
		var x=document.getElementById("author3");
		x.required=true;		
		var x=document.getElementById("language3");
		x.required=true;
		
		a3.style.display = "block";
    }
	
	else if(selected =='Sneaker'||selected=='Sports'||selected=='Formal'){
		
		var x=document.getElementById("warranty4");
		x.required=true;
		
		var x=document.getElementById("colour4");
		x.required=true;
		
		var x=document.getElementById("size4");
		x.required=true;

        a4.style.display = "block";
    }
	
	else if(selected =='Luxury'||selected=='SUV'||selected=='Hatchback'){
 
		var x=document.getElementById("mileage5");
		x.required=true;		
		var x=document.getElementById("engine5");
		x.required=true;		
		var x=document.getElementById("colour5");
		x.required=true;		
		var x=document.getElementById("topspeed5");
		x.required=true;		
		var x=document.getElementById("gear5");
		x.required=true;		
		var x=document.getElementById("fueltype5");
		x.required=true;		
		a5.style.display = "block";
    }
	
	else if(selected =='Men'||selected=='Women'||selected=='Kids'){
		
		var x=document.getElementById("size6");
		x.required=true;		
		var x=document.getElementById("type6");
		x.required=true;		
		var x=document.getElementById("colour6");
		x.required=true;
        a6.style.display = "block";
    }
	
	else if(selected =='Cricket'||selected=='Football'||selected=='Badminton'){
		
		var x=document.getElementById("warranty7");
		x.required=true;
        a7.style.display = "block";
    } 

	
  }
  
  </script>
  
<title>Seller</title>
<link rel="stylesheet" type="text/css" href="boot.css">
<link rel="stylesheet" type="text/css" href="start.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	
  <style type="text/css">     
    select {
        width:115px;
		height:30px;
		    }
</style>

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
<br>

<p> 
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="50px"><b> Product Details </b></font><br>
</p>
 <div class="container ">
	<div class="jumbotron">

<form name="form" action="seller2.php" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="inputProducttype" class="col-sm-2 control-label"><b>Product Type</b></label>
    <div class="col-sm-10">
     
<select id="slct1" width="115px" name="slct1" onchange="populate('slct1','slct2')" required >
  
  <option value="" disabled="disabled" selected = "selected">--Select--</option>
  <option value="electronics">Electronics</option>
  <option value="sports">Sports</option>
  <option value="books">Books</option>
  <option value="shoes">Shoes</option>
  <option value="clothes">Clothes</option>
  <option value="cars">Cars</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
<b>Product Subtype</b>&emsp;
<select id="slct2" name="slct2" onchange="change()" required>
	<option value="" disabled="disabled" selected="selected" >--Select--</option>

	<!-- <option value="Mobile">Mobile</option>
	 <option value="LCD">LCD</option>
	 <option value="Laptop">Laptop</option>
	-->

</select>

 </div>
  </div>
  <div id="t8">
  <div class="form-group">
    <label for="inputProductName" class="col-sm-2 control-label"><b>Product Name</b></label>
    <div class="col-sm-6">
      <input name="pname" type="text" class="form-control" id="inputProductName" pattern="[a,A-z,Z]{2,100}" placeholder="Product Name" required="required" title="Must contain 2 or more  uppercase or lowercase characters">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputCompany" class="col-sm-2 control-label"><b>Company</b></label>
    <div class="col-sm-6">
      <input name="cname" type="text" class="form-control" id="inputCompany" pattern="[a,A-z,Z]{2,100}" title="Must contain 2 or more uppercase or lowercase characters" placeholder="Company"  required="required" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPrice" class="col-sm-2 control-label"><b>Price</b></label>
    <div class="col-sm-6">
	<div class = "input-group">
	<span class="input-group-addon"><b>&#8377;</b></span>
      <input name="price" type="number" class="form-control" id="inputPrice" placeholder="Price" min="1" required="required">
    </div>
	</div>
  </div>
  <div class="form-group">
    <label for="inputQuantity" class="col-sm-2 control-label"><b>Quantity</b></label>
    <div class="col-sm-6">
      <input name="quantity" type="number" class="form-control" id="inputQuantity" placeholder="Quantity" required="required" min="1">
    </div>
  </div>
  </div>
  <div id="t1" style="display:none;">
  <div class="form-group">
    <label  class="col-sm-2 control-label"><b>RAM</b></label>
    <div class="col-sm-10">
     <select  id="ram1" width="115px" name="ram1"  >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="2GB">2 GB</option>
	<option value="3GB">3 GB</option>
	<option value="4GB">4 GB</option>
	<option value="8GB">8 GB</option>
	<option value="16GB">16 GB</option>
</select>
</div></div>

   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Hard Disk</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="harddisk1" id="harddisk1" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="128GB">128 GB</option>
	<option value="250GB">256 GB</option>
	<option value="500GB">500 GB</option>
	<option value="1TB">&emsp;1 TB</option>
	<option value="2TB">&emsp;2 TB</option>
</select>
</div></div>
 
   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Battery</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="battery1" id="battery1"  >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="3000mAh">3000 mAh</option>
	<option value="4000mAh">4000 mAh</option>
	<option value="4400mAh">4400 mAh</option>
	<option value="5000mAh">5000 mAh</option>
	<option value="5500mAh">5000 mAh</option>
</select>
</div></div>
 
   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Processor</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="processor1" id="processor1" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="1.70GHz">1.70 GHz</option>
	<option value="2.20GHz">2.20 GHz</option>
	<option value="3.30GHz">3.30 GHz</option>
	<option value="3.70GHz">3.70 GHz</option>
	<option value="4.30GHz">4.30 GHz</option>
</select>
</div></div>
 
   <div class="form-group ">
	<label  class="col-sm-2 control-label"><b>Warranty</b></label>	 
   <div class="col-sm-6">
	<div class = "input-group">
	<input name="warranty1" type="number" min ="1" class="form-control" id="warranty1" placeholder="Warranty" >
    <span class="input-group-addon"><b>years</b></span>
	</div>
	</div>
  </div>
 </div>
 
 
  <div id="t2" style="display:none;">
  
   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Type</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="type2" id="type2" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="LCD">LCD</option>
	<option value="LED">LED</option>
</select>
</div></div>
 
   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Size</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="size2" id="size2" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="32inch">32 inch</option>
	<option value="40inch">40 inch</option>
	<option value="46inch">46 inch</option>
	<option value="52inch">52 inch</option>
</select>
</div></div>
 
   <div class="form-group ">
	<label  class="col-sm-2 control-label"><b>Warranty</b></label>	 
   <div class="col-sm-6">
	<div class = "input-group">
	<input name="warranty2" type="number" min ="1" class="form-control" id="warranty2" placeholder="Warranty" >
    <span class="input-group-addon"><b>years</b></span>
	</div>
	</div>
  </div>
 </div>
 
 
  <div id="t3" style="display:none;">
  
  <div class="form-group " >
    <label  class="col-sm-2 control-label"><b>Author</b></label>
    <div class="col-sm-6">
      <input name="author3" id="author3" type="text" class="form-control" id="inputAuthor" pattern="[a,A-z,Z]{1,100}" title="Must contain only uppercase or lowercase characters" placeholder="Author" >
    </div>
  </div>
  
  <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Language</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="language3" id="language3" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="Hindi">Hindi</option>
	<option value="English">English</option>
	<option value="French">French</option>
	<option value="German">German</option>
</select>
</div></div>
 
 </div>
 
 
  <div id="t4" style="display:none;">
 
 <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Size</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="size4"  id="size4" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	
	<option value="10">10</option>
</select>
</div></div>
 
  
   <div class="form-group ">
    <label  class="col-sm-2 control-label"><b>Colour</b></label>
    <div class="col-sm-6">
      <input name="colour4" type="text" class="form-control" id="colour4" placeholder="Colour"  pattern="[a,A-z,Z]{2,100}" title="Must contain only uppercase or lowercase characters">
    </div>
  </div>
  
    <div class="form-group ">
	<label  class="col-sm-2 control-label"><b>Warranty</b></label>	 
   <div class="col-sm-6">
	<div class = "input-group">
	<input name="warranty4" type="number" min ="1" class="form-control" id="warranty4" placeholder="Warranty" >
    <span class="input-group-addon"><b>years</b></span>
	</div>
	</div>
  </div>
  </div>
 
  <div id="t5" style="display:none;">
  
  <div class="form-group " >
    <label  class="col-sm-2 control-label"><b>Mileage</b></label>
    <div class="col-sm-6">
<div class = "input-group">   
	<input name="mileage5" type="number" min ="15" class="form-control" id="mileage5" placeholder="Mileage" >
  <span class="input-group-addon">Km/l</b></span>
	</div> 
  </div>
  </div>
  
   <div class="form-group ">
    <label  class="col-sm-2 control-label"><b>Colour</b></label>
    <div class="col-sm-6">
      <input name="colour5" type="text" class="form-control" id="colour5" placeholder="Colour"  pattern="[a,A-z,Z]{2,100}" title="Must contain only uppercase or lowercase characters" >
    </div>
  </div>
  
  
   <div class="form-group ">
    <label  class="col-sm-2 control-label"><b>Engine</b></label>
    <div class="col-sm-6">
<div class = "input-group">   
      <input name="engine5" type="number" min="658" class="form-control" id="engine5" placeholder="Engine" >
 <span class="input-group-addon">cc</b></span>
	</div> 
	</div>
  </div>
  
  
   <div class="form-group ">
    <label  class="col-sm-2 control-label"><b>Top Speed</b></label>
    <div class="col-sm-6">
<div class = "input-group">   
	      <input name="topspeed5" type="number" min ="120"class="form-control" id="topspeed5" placeholder="Top Speed">
 <span class="input-group-addon">Km/h</b></span>
	</div>  
 </div>
  </div>
  
 <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Gear</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="gear5" id="gear5" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="Automatic">Automatic</option>
	<option value="Manual">Manual</option>
	 </select>
</div></div>
 
 <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Fuel Type</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="fueltype5" id="fueltype5" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="Petrol">Petrol</option>
	<option value="Diesel">Diesel</option>
	 </select>
</div></div>
 
 </div>
 
 
  <div id="t6" style="display:none;">
  
   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Type</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="type6" id="type6" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="Jacket">Jacket</option>
	<option value="Jeans">Jeans</option>
	<option value="T-Shirt">T-Shirt</option>
	<option value="Shirt">Shirt</option>
</select>
</div></div>
 
   <div class="form-group">
    <label  class="col-sm-2 control-label"><b>Size</b></label>
    <div class="col-sm-10">
     <select  width="115px" name="size6" id="size6" >
	<option value="" disabled="disabled" selected = "selected">--Select--</option>
	<option value="S">S</option>
	<option value="M">M</option>
	<option value="L">L</option>
	<option value="XL">XL</option>
</select>
</div></div>
 
   <div class="form-group ">
    <label  class="col-sm-2 control-label"><b>Colour</b></label>
    <div class="col-sm-6">
      <input name="colour6" type="text" class="form-control" id="colour6" placeholder="Colour"  pattern="[a,A-z,Z]{2,100}" title="Must contain only uppercase or lowercase characters" >
    </div>
  </div>
  
  </div>
 

 
  <div id="t7" style="display:none;">
   <div class="form-group ">
	<label  class="col-sm-2 control-label"><b>Warranty</b></label>	 
   <div class="col-sm-6">
	<div class = "input-group">
	<input name="warranty7" type="number" min ="1" class="form-control" id="warranty7" placeholder="Warranty" >
    <span class="input-group-addon"><b>years</b></span>
	</div>
	</div>
  </div> 
 </div>

 <br>
 &emsp;&emsp;&emsp;&emsp;&nbsp;
  <button class="btn btn-success" name="submit" type="submit">Submit</button>

  </form>

</div>
</div>

<script src="strt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>