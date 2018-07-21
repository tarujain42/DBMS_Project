<?php 
session_start();
ob_start();
$db= mysqli_connect('localhost','root','','login');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel="stylesheet" type="text/css" href="boot.css">
  
      <link rel="stylesheet" href="style.css">

  
</head>

<body  >

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1><b>Sign Up for Free</b></h1>
          
          <form action="process.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name
              </label>
              <input type="text" name="firstname" pattern="[a,A-z,Z]{2,100}" title="Must contain only uppercase or lowercase characters" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name
              </label>
              <input type="text" name="lastname" pattern="[a,A-z,Z]{2,100}"  title="Must contain only uppercase or lowercase characters" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address
            </label>
            <input type="email" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password
            </label>
            <input   type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
          </div>
      
			 <div id="xxxx">
              <select name="type" >
                <option value="customer"   >Customer</option>
               <option value="seller"  >Seller</option>

               </select><br><br>
             </div> 
          <button type="submit" class="button button-block" name="register" />Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1><b>Welcome Back!</b></h1>
          
          <form action="process.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address
            </label>
            <input type="email" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password
            </label>
            <input type="password" name="password" />
          </div>
          
          
          <button name="login" type="submit" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
	  
	  
		
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  

    <script  src="index.js"></script>




</body>

</html>
