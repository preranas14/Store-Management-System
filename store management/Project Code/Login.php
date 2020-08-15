<!DOCTYPE html>
<html>
<head>
	<style>
	        
    body{
	margin:0; padding:0;
  background:url(https://i.gifer.com/J4o.gif);
	-webkit-animation: 10s linear 0s normal none infinite animate;
}
    
    .main {
        background-color: #17202A;
        width: 450px;
        height: 420px;
        margin: 7em auto;
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
        padding-top: 30px;
        color: #D5D8DC;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
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
        padding-top: 40px;
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
	</style>
	<title>Login Page</title>
</head>
<body>

<div class= "main">
	<?php 
session_start();

$emailErr = "";
$passErr = "";
if($_SERVER["REQUEST_METHOD"]=="POST")
{	
	
	if(!empty($_POST['Username']) && !empty($_POST['pass']))
	{
		$username = $_POST['Username'];
		$password = $_POST['pass'];

		$conn = mysqli_connect("localhost" , "root" , "");
		mysqli_select_db($conn,"dbms");

		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$username = mysqli_real_escape_string($conn,$username);
		$password = mysqli_real_escape_string($conn,$password);

		$result = mysqli_query($conn,"SELECT * FROM customer where Username = '$username' and Password = '$password'") 
								OR die("".mysqli_error($conn));

		$row = mysqli_fetch_array($result);
		//echo $username;
		//echo $password;
		
		if($row != NULL)
		{	$_SESSION = $row;
			header('Location:indexCustomer.php');
		}
		else
		{	
			$message = "Username/Password Incorrect or User Does not exist";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	else
	{
		if(empty($_POST['Username']))
		{
			$emailErr = "Username is required";
		}
		if(empty($_POST['pass']))
		{
			$passErr = "Password is required";
		}
	}
}
 ?>
	<p class="sign" align="center">Customer</p>
	<form class = "form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<input class = "un" type="text" name="Usernamee" id = "Email" placeholder = "Username">
		<span class="error">* <?php echo $emailErr ;?></span>

		<input class = "pass" type="password" name="pass" id = "pass" placeholder = "Password">
		<span class="error">* <?php echo $passErr ;?></span>

		<input class="submit" align: center type="submit" id = "btn" value="Login">

	<p class="forgot" align="center">
		<a href="customerSignUp.php">New Here? SignUp</a>

        <p class="forgot" align="center">
		<a href="Admin.php">Switch to Admin Mode</a>
	</p>
	</form>



</div>
</body>
</html>