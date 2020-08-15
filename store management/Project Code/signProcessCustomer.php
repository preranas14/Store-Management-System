	<?php
		$servername = "localhost";
		$username = $_POST['username'];
		$password = $_POST['pass'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		// $id = $_POST['id'];
		$dbname = "dbms";

		$conn = mysqli_connect($servername, 'root', '', $dbname);

		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO Customer (Name, Username, Password, Email, Contact)
		VALUES ('$name','$username','$password','$email','$contact')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		header('refresh:2;url=customerSignUp.php');
		mysqli_close($conn);
	?> 

