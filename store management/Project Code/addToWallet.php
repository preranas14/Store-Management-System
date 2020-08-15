<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	
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
			header('refresh:3;url=indexCustomer.php');
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>

 <style>
	        
    body{
	margin:0; padding:0;
  background:url(https://thelearninghub.in/wp-content/uploads/2016/12/Wallet_web_anim_v2_AupdwHk.gif);
	-webkit-animation: 10s linear 0s normal none infinite animate;
}
    
    .main {
        background-color: #17202A;
        width: 400px;
        height: 310px;
        margin: 6em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(234, 236, 238, 0.14);

    }

    .Smain {
        background-color: #17202A;
        width: 400px;
        height: 650px;
        margin-left: 500px;
        margin-top: 30px;
        margin-right: 500px;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(234, 236, 238, 0.14);

    }
    
    .sign {
        color: #D5D8DC;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
		padding-top:5px;
    }
    
    .un {
    width: 50%;
    color: rgb(213, 216, 220);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(171, 178, 185, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(213, 216, 220);
    margin-bottom: 50px;
    margin-left: 110px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 5px;
    }
    
    .pass {
            width: 50%;
    color: rgb(213, 216, 220);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(171, 178, 185, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(213, 216, 220);
    margin-bottom: 50px;
    margin-left: 110px;
    text-align: center;
    margin-bottom: 27px;
	font-family: 'Ubuntu', sans-serif;

    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(234, 236, 238, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #D5D8DC, #2C3E50);
        border: 0;
        padding-left: 45px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 37%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(234, 236, 238, 0.04);
    }

    .error {
      color: white;
      flood-color: white;
      font-size: 10px;
    }

    .forgot {
        text-shadow: 0px 0px 3px rgba(171, 178, 185, 0.12);
        color: #ABB2B9 ;
        padding-top: 8px;
    }

    .forg{
        text-shadow: 0px 0px 3px rgba(171, 178, 185, 0.12);
        color: #ABB2B9 ;
        padding-top: 70px;
        font-size: 50px;

    }

    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #ABB2B9 ;
        text-decoration: none
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
    }	

	h1{
		color: #ABB2B9 ;
		margin-left: 140px;
		
	}

	</style>

 	<title>Add Money</title>
 </head>
 <body>
	<div class="main">

	<p class="sign" align="center"><h1>Verify</h1></p>
 	<form  class ="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	 
 	<table>
 		<tr>
 			<td><input class="un" type="text" name="username" placeholder="Enter Username" placeholder="Username" ></td>
 		</tr>
 		<tr>
 			<td><input class="un" type="password" name="password" placeholder="Enter Password" placeholder="Password" ></td>
 		</tr>
 		<tr>
 			<td colspan="2"><input class="submit" type="submit" value="Verify"></td>
 		</tr>
 	</table>
 	</form>
	 </div>
 </body>
 </html>