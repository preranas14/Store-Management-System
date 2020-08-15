Dropped
<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "UPDATE items SET Stock = '".$_POST['stock']."'WHERE Iname = '".$_POST['iname']."'";
	if (mysqli_query($conn, $query)) {
			
			$query = "UPDATE Message SET Stats = 1 WHERE IID = '".$_POST['iid']."'";
			mysqli_query($conn,$query);	
			
			echo "Stock Sent!";
		    header('refresh:3;url=sendStock.php');
		    
		} else {
		    echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
 ?>

