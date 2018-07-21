<?php 
session_start();
ob_start();
?>
<?php
 $db= mysqli_connect('localhost','root','','login');
 //mysqli_select_db('users',$db);
 	if(isset($_POST['register']))
 	{
		if( empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || (!isset($_POST['pass']) || empty($_POST['pass']) || trim($_POST['pass']) == '') || empty($_POST['type']) ){
			header("Location: login.php");
 		}
		
		if(empty($_POST['pass']) || !isset($_POST['pass'])){
			header("Location: login.php");
 			
		}
		
 		//echo '<script type="text/javascript">alert("Registered")</script>'; 
 		$firstname=$_POST['firstname'];
 		$lastname=$_POST['lastname'];
 		$id=$_POST['email'];
 		$password=$_POST['pass'];
 		$type=$_POST['type'];
 		$query="SELECT * FROM users WHERE id='$id'";
 		$query_run=mysqli_query($db,$query);
 		if(mysqli_num_rows($query_run)>0)
 		{
 			echo '<script type="text/javascript">windows.alert("Already Registered")</script>';
 			header("Location: login.php");
 			exit();
 		}
 		echo '<script type="text/javascript">alert("Registered")</script>';
 		$query = "INSERT INTO users(firstname,lastname,id,password,type) VALUES('$firstname','$lastname','$id','$password','$type') ";
 		$register_user = mysqli_query($db,$query);
 		if(!$register_user)
 		{
 			die("Query Failed". mysqli_error($connection));
 		}
 		if($type=="seller")
 		{
 			$_SESSION['usernam']=$id;
 			header("Location:seller.php");
 		}
 		else
 		{
 			$_SESSION['usernam']=$id;
 			header("Location: home.php");
 		}
	 }
	 if(isset($_POST['login']))
	 {		 
	 	$id=$_POST['email'];
	 	$password=$_POST['password'];
	 
	 if($id=="admin@gmail.com" && $password == "Dbmsmini420"){
		$_SESSION['usernam']=$id;
	 	header("Location:admin.php");
	 }
	 
	 else{
		$query="SELECT * FROM users WHERE id='$id' AND password='$password'";
	 	$query_run = mysqli_query($db,$query);
	 	if(mysqli_num_rows($query_run)>0)
	 	{
	 		//echo '<script type="text/javascript">alert("Please sign up first")</script>';
	 		$query1="SELECT type FROM users WHERE id='$id' AND password='$password'";
	 		$query_run1=mysqli_query($db,$query1);
	 		$bio= mysqli_fetch_array($query_run1);
	 		if($bio['type']=="seller")
	 		{
	 			$_SESSION['usernam']=$id;
				header("Location: seller.php");
	 		} 
	 		else
	 		{
	 			$_SESSION['usernam']=$id;
	 			header("Location: home.php");
	 		}
	 	}
	 	else
	 	{
	 		echo '<script type="text/javascript">alert("Please sign up first")</script>';
	 		header("Location: login.php");
	 	}
	  }
	 }
	 if(isset($_POST['logout']))
	 {
	 	session_unset(); 
		session_destroy(); 
		header("Location:startup.php");
	 }
	 
 	?>