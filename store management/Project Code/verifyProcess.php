<?php

	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$conn = mysqli_connect("localhost","root","");
		mysqli_select_db($conn,"dbms");

		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$username = mysqli_real_escape_string($conn,$username);
		$password = mysqli_real_escape_string($conn,$password);

		
		if ($_SESSION['Username'] == $username && $_SESSION['Password'] == $password) {
			header('Location:addMoney.php');
		}			
		else{
			$message = "Failed to Login, Redirecting to Login";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header('refresh:3;url=addToWallet.php');
		}
	}
  ?>