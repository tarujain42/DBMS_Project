<?php
session_start();
session_unset(); 
		session_destroy(); 
		unset($_SESSION['usernam']);
		header("Location:startup.php");
		?>