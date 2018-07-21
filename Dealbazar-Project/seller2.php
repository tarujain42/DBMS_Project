<?php
 
session_start();
ob_start();

 $db= mysqli_connect('localhost','root','','login');
 //mysqli_select_db('users',$db);
 	
 
	 	
  if(isset($_POST['submit']))
	 {
	 	$category=$_POST['slct1'];
	 	$subcat=$_POST['slct2'];
	 	$pname=$_POST['pname'];
	 	$cname=$_POST['cname'];
	 	$price=$_POST['price'];
	 	$quantity=$_POST['quantity'];
		$seller=$_SESSION['usernam'];
		$query = "SELECT * FROM products WHERE cat='$category' AND subcat = '$subcat' AND pname = '$pname' AND brand='$cname' AND price ='$price' ";
	 	$sqql = mysqli_query($db,$query);
	 	$result=mysqli_num_rows($sqql);
	 	
		if($result==0){
		
		$query = "INSERT INTO products(pname,price,brand,quantity,cat,subcat,seller_name) VALUES('$pname',$price,'$cname',$quantity,'$category','$subcat','$seller') ";
	 	$query_run = mysqli_query($db,$query);
	 	
		$quer = "SELECT pid FROM products WHERE pname='$pname' AND price=$price AND brand='$cname' AND quantity=$quantity AND cat='$category' AND subcat='$subcat' ";
 		$query_run = mysqli_query($db,$quer);
 		$row= mysqli_fetch_array($query_run);
 		$p_id=$row['pid'];
 		
		if($category=="books"){
			$genre=$subcat;
			$lang=$_POST['language3'];
			$author=$_POST['author3'];
			
			$query = "INSERT INTO books (pid,pname,Genre,Author,Language) VALUES($p_id,'$pname','$genre','$author','$lang') ";
			$query_run = mysqli_query($db,$query);
		}
		
		else if($category=="shoes"){
			$size=$_POST['size4'];
			$colour=$_POST['colour4'];
			$warranty=$_POST['warranty4'];
			
			$query = "INSERT INTO shoes (pid,pname,Size,Colour,Warranty) VALUES($p_id,'$pname','$size','$colour',$warranty) ";
			$query_run = mysqli_query($db,$query);
		}

		else if($category=="clothes"){
			$size=$_POST['size6'];
			$colour=$_POST['colour6'];
			$type=$_POST['type6'];
			
			$query = "INSERT INTO clothes (pid,pname,Type,Size,Colour) VALUES($p_id,'$pname','$type','$size','$colour') ";
			$query_run = mysqli_query($db,$query);
		}
		else if($category=="sports"){
			$warranty=$_POST['warranty7'];
			
			$query = "INSERT INTO sports (pid,pname,Warranty) VALUES($p_id,'$pname',$warranty) ";
			$query_run = mysqli_query($db,$query);
		}

		else if($category=="cars"){
			$mileage=$_POST['mileage5'];
			$engine=$_POST['engine5'];
			$colour=$_POST['colour5'];
			$topspeed=$_POST['topspeed5'];
			$fueltype=$_POST['fueltype5'];
			$gear=$_POST['gear5'];
				
			$query = "INSERT INTO cars (pid,pname,Mileage,Colour,Engine,Gear,Fuel_Type,Top_Speed) VALUES($p_id,'$pname',$mileage,'$colour',$engine,'$gear','$fueltype',$topspeed)";
			$query_run = mysqli_query($db,$query);
		}
		
		else if($category=="electronics" && $subcat == "LCD") {
			$type=$_POST['type2'];
			$size=$_POST['size2'];
			$warranty=$_POST['warranty2'];
				
			$query = "INSERT INTO lcd (pid,pname,Type,Size,Warranty) VALUES($p_id,'$pname','$type','$size',$warranty)";
			$query_run = mysqli_query($db,$query);
		}

		else if($category=="electronics" && ($subcat=="Mobile" || $subcat="Laptop")){
			$ram=$_POST['ram1'];
			$harddisk=$_POST['harddisk1'];
			$battery=$_POST['battery1'];
			$processor=$_POST['processor1'];
			$warranty=$_POST['warranty1'];
			
				
			$query = "INSERT INTO  mobile (pid,pname,RAM,HardDrive,Battery,Processor,Warranty) VALUES($p_id,'$pname','$ram','$harddisk','$battery','$processor',$warranty)";
			$query_run = mysqli_query($db,$query);
		}
		
		
		}
		
		else{
			
		while($row = mysqli_fetch_array($sqql)){ 
			$qty=$row['quantity'];
		}
		$qty1=$qty+$quantity;
		$query = "UPDATE products SET quantity = $qty1 WHERE cat='$category' AND subcat = '$subcat' AND pname = '$pname' AND brand='$cname' AND price='$price'";
	 	$sqql = mysqli_query($db,$query);
	 	}
 		
		header("Location:seller.php");
	 }
	

?>