<?php 

session_start();

$servername = "localhost";

	$dbname = "dbms";

    $conn = mysqli_connect($servername, 'root', '', $dbname);
    
    $query = "SELECT Name,Wallet FROM Customer WHERE Username = '{$_SESSION['Username']}'";
    $result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

 	 	if($_SERVER['REQUEST_METHOD'] == "POST"){

            
            $otpVerify = $_POST['otp'];
            $otp = $_POST['ogOTP'];
            $money = $_POST['money'] + $row['Wallet'];
			if ($otp == $otpVerify) {

				$query = "UPDATE Customer SET Wallet = $money WHERE Username = '{$_SESSION['Username']}'";
				mysqli_query($conn,$query);
                $message = "Money has been added";
                echo "<script type='text/javascript'>alert('$message');</script>";
				header('refresh:3;url=indexCustomer.php');
			}
			else{
                $message = "Wrong OTP";
                echo "<script type='text/javascript'>alert('$message');</script>";
				header('refresh:3;url=indexCustomer.php');
			}
	}
 	  ?>