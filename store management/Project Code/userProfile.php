<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM Customer WHERE Username = '{$_SESSION['Username']}'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile Page</title>
 </head>
 <body>
 	<table>
 		<tr>
 			<th>Name</th>
 			<th>Username</th>
 			<th>Email</th>
 			<th>Contact</th>
 		</tr>
 		<tr>
 			<td><?php echo $row['Name']; ?></td>
 			<td><?php echo $row['Username']; ?></td>
 			<td><?php echo $row['Email']; ?></td>
 			<td><?php echo $row['Contact']; ?></td>
 		</tr>
 	</table>
 	<button onclick="window.location.href='indexCustomer.php'">Back</button>
 	<button onclick="window.location.href='logout.php'">Logout</button>
 </body>
 </html>