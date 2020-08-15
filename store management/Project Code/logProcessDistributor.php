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

		

		$result = mysqli_query($conn,"SELECT * FROM distributor WHERE Email = '$username' AND Password = '$password'")
			OR die("Failed to query database ".mysqli_error($conn));

		$row = mysqli_fetch_array($result);
		$_SESSION = $row;
		if ($row['Email'] == $username && $row['Password'] == $password) {
			header('Location:indexDistributor.php');
		}
		else{
			echo "Failed to Login, Redirecting to Login";
			header('refresh:3;url=distributorLogin.php');
		}
	}
  ?>