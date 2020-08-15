<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_SESSION['UID'];
	$total = 0;

	$item_arr = "";
	$amount_arr = "";

	$cost_arr = "";
	$Cost = "";
	
	$UID = $_SESSION['UID'];

	$query = "SELECT * FROM Cart WHERE UID = $UID";
	$result = mysqli_query($conn,$query);

	$TS = strtotime("now");

	
	while ($row = mysqli_fetch_array($result)) {

		$item_arr .= $row['IID'].",";
		$amount_arr .= $row['Amount'].",";
		$A = $row['Price']/$row['Amount'];
		$Cost .= $A.",";
		$cost_arr .= $row['Price'].",";
		$total += $row['Price'];
	}

	$query = "SELECT * from customer WHERE UID = $UID";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	//echo $TS;
	
	if($row['Wallet'] >= $total)
	{

	$New = $row['Wallet'] - $total;

	$query = "INSERT INTO purchase (UID,IID_arr,Count_arr,Cost_arr,Total_cost_per_item,Total_cost) VALUES ('$username','$item_arr','$amount_arr','$Cost','$cost_arr','$total')";
	$result = mysqli_query($conn,$query);
	if ($result) {

		$query = "DELETE FROM Cart WHERE UID = $UID";
		mysqli_query($conn,$query);

		$query = "UPDATE customer SET Wallet = $New WHERE UID = $UID";
		mysqli_query($conn,$query);

		$message =  "Thank you for Shopping";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('refresh:3;url=indexCustomer.php');
	}
	}
	else
	{
		$message = "Not enough money";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('refresh:3;url=indexCustomer.php');
	}
 ?>