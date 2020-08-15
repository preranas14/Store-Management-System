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
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(234, 236, 238, 0.14);

    }

    .Smain {
        background-color: #17202A;
        width: 450px;
        height: 710px;
        margin-left: 550px;
        margin-top: 30px;
        margin-right: 500px;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(234, 236, 238, 0.14);

    }
    
    .sign {
        padding-top: 20px;
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
    padding: 5px 20px;
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
    padding: 5px 20px;
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
	<title>Register</title>
</head>
<body>


<div class = "Smain">
	<?php 
	$usererr = $Rusererr = $Rpasserr = $CRpasserr = $Fnameerr = $Addresserr = $Contacterr =  "";
	$Idresult = 0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(!empty($_POST['user']) && !empty($_POST['Ruser']) && !empty($_POST['Rpass']) && !empty($_POST['CRpass']) && !empty($_POST['Fname']) )
	{

		$Lastname = $DOB = $Gender = NULL;

        //$ID = $_POST['ID'];
        $user = $_POST['user'];
		$username = $_POST['Ruser'];
		$password = $_POST['Rpass'];
		$CPassword = $_POST['CRpass'];
		$Firstname = $_POST['Fname'];
		//$Lastname = $_POST['Lname'];
		//$DOB = $_POST['DOB'];
        //$Gender = $_POST['Gender'];
        //$Address = $_POST['Address'];
        $Contact = $_POST['Contact'];
		//echo $Firstname." ".$Lastname." ".$DOB." ".$Gender." " ;

		$conn = mysqli_connect("localhost" , "root" , "");
		mysqli_select_db($conn,"dbms");

        $user = stripcslashes($user);
		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$CPassword = stripcslashes($CPassword);
		$Firstname = stripcslashes($Firstname);
		//$Lastname = stripcslashes($Lastname);
		//$DOB = stripcslashes($DOB);
        //$Gender = stripcslashes($Gender);
        //$Address = stripcslashes($Address);
        $Contact = stripcslashes($Contact);
        //$ID = stripcslashes($ID);
        
        $user = mysqli_real_escape_string($conn,$user);
		$username = mysqli_real_escape_string($conn,$username);
		$password = mysqli_real_escape_string($conn,$password);
		$CPassword = mysqli_real_escape_string($conn,$CPassword);
		$Firstname = mysqli_real_escape_string($conn,$Firstname);
		//$Lastname = mysqli_real_escape_string($conn,$Lastname);
		//$DOB = mysqli_real_escape_string($conn,$DOB);
		//$Gender = mysqli_real_escape_string($conn,$Gender);
        //$ID = mysqli_real_escape_string($conn,$ID);
        $Contact = mysqli_real_escape_string($conn,$Contact);
        //$Address = mysqli_real_escape_string($conn,$Address);
        
        
		if($password==$CPassword)
		{

			$exits = mysqli_query($conn,"SELECT * FROM customer where Username = '$user'")
            OR die("".mysqli_error($conn));
            
            $row = mysqli_fetch_array($exits);

			if(empty($row))
			{
				$super = mysqli_query($conn,"SELECT * FROM users where UID = (SELECT max(UID) from users) ")
                OR die("".mysqli_error($conn));
                
                $row = mysqli_fetch_array($super);

                $Idresult = 1;

                if($row!=NULL)
                    $Idresult = $row['UID'] + 1;
                    

				$result = mysqli_query($conn,"INSERT INTO customer values('$Idresult','$Firstname','$user','$password','$username','$Contact',0,0)")
									OR die("".mysqli_error($conn));
			
				header('Location: customerLogin.php');
			}
			else
			{
				$message = "Account already exists";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}	
			//echo "Successful";
		}
		else
		{
			$message = "Password and Confirm Password should be same";
			echo "<script type='text/javascript'>alert('$message');</script>";

		}
	}
	else
	{

		if(empty($_POST['Fname']))
		{
			$Fnameerr = "Firstname required";
		}
		if(empty($_POST['Ruser']))
		{
			$Rusererr = "Email required";
		}
		if(empty($_POST['Rpass']))
		{
			$Rpasserr = "Password required";
		}
		if(empty($_POST['CRpass']))
		{
			$CRpasserr = "Confirm Password";
        }
        if(empty($_POST['user']))
		{
			$Addresserr = "Username required";
        }
        if(empty($_POST['Contact']))
		{
			$Contacterr = "Contact Required";
		}
		
		
	}
}

?>
		<p class="sign" align="center" >Register</p>
		<form class = "form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			
				<input class = "un" type="text" name="Fname" id="Fname" pattern = "[A-Z-a-z]*" title = "Only alphabets" placeholder = "Firstname" >
				<span class="error">* <?php echo $Fnameerr ;?></span>

                <input class = "un" type="text" name="user" id="user" placeholder = "Username">
				<span class="error">* <?php echo $usererr ;?></span>

				<input class = "un" type="Email" name="Ruser" id="Ruser" placeholder = "Email">
				<span class="error">* <?php echo $Rusererr ;?></span>


				<input class = "pass" type="Password" name="Rpass" id ="Rpass" placeholder = "Password">
				<span class="error">* <?php echo $Rpasserr ;?></span>


				<input class = "pass" type="Password" name="CRpass" id="CRpass" placeholder = "Confirm Password">
				<span class="error">* <?php echo $CRpasserr ;?></span>

                <input class = "un" type="Number" name="Contact" id="Contact" placeholder = "Contact">
				<span class="error">* <?php echo $Contacterr ;?></span>
			
				<input class="submit" type="submit" name="btn" value="SignUp">
		

			<p class = "forgot" align = "center">
			<a href="customerLogin.php">Already a user? Login</a>
			</p>

		</form>
		
	</div>

</body>
</html>