<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$iid = $_POST['iid'];
	$Amount = $_POST['amount'];
	//echo $Amount;

	$query = "SELECT * from items where IID = '$iid' ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	//echo $row['Stock'];

	$Amount = $Amount + $row['Stock'];

	$query = "UPDATE items set Stock = '$Amount' where IID = '$iid'";
	$result = mysqli_query($conn,$query);

	$query = "DELETE FROM Cart WHERE IID = $iid";
	$result = mysqli_query($conn,$query);

	if ($result) {
		$message = "Item has been deleted!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('refresh:1;url=viewCart.php');
	}
 ?>