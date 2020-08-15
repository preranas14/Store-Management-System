<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$iid = $_POST['iid'];
	$cid = $_POST['cid'];
	$iname = $_POST['iname'];
	$stock = $_POST['stock'] - $_POST['amount'];
	$amount = $_POST['amount'];
	$price = $amount*$_POST['cost'];

	$UID = $_SESSION['UID'];

	$query = "INSERT INTO Cart (IID,CID,IName,Amount,Price,UID) VALUES ($iid,$cid,'$iname',$amount,$price,$UID)";
	$result = mysqli_query($conn,$query);
	if ($result) {
		$message = "Item has been added!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$query = "UPDATE items SET Stock = $stock WHERE IID = $iid";
		$result = mysqli_query($conn,$query);

		header('refresh:1;url=selectCategory.php');
	}
	else {
		echo "ERROR";
	}
	
 ?>