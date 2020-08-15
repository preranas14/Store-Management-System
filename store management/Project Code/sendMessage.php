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
	$stock = $_POST['stock'];

	$query = "INSERT INTO Message (IID,CID,Iname,Stock,Stats) VALUES ($iid,$cid,'$iname',$stock,0)";
	if (mysqli_query($conn, $query)) {
		$message = "Message sent";
		echo "<script type='text/javascript'>alert('$message');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	header('refresh:3;url = ItemDisplay.php');
  ?>