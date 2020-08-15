<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT Name,Wallet FROM Customer WHERE Username = '{$_SESSION['Username']}'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	//echo $_SESSION['flag'];
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
        height: 350px;
        margin: 5em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(234, 236, 238, 0.14);

    }

    .Smain {
        background-color: #17202A;
        width: 300px;
        height:200px;
        margin-left: 500px;
        margin-top: 10px;
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
    width: 90%;
    color: rgb(213, 216, 220);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(171, 178, 185, 0.04);
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(213, 216, 220);
    text-align: center;
    font-family: 'Ubuntu', sans-serif;
	padding-left: 20px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-top: 10px;
	margin-top: 10px;
    }
    
    form.form1 {
       
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
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-right:10px;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(234, 236, 238, 0.04);
		margin-top: 10px;
    }

	.Bsubmit {
		width: 50%;
      	cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #D5D8DC, #2C3E50);
        border: 0;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 12px;
        padding-top: 12px;
        font-family: 'Ubuntu', sans-serif;
        margin-left:105px;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(234, 236, 238, 0.04);
		margin-top: 15px;
		margin-bottom: 5px;
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

    td 
	{
		text-shadow: 0px 0px 3px rgba(171, 178, 185, 0.12);
        color: #ABB2B9 ;
		padding-top: 8px;
        padding-left:90px;
		font-size: 20px;
	}

	h1{
		color: #ABB2B9 ;
		margin-left: 140px;
		
	}

	li{
		margin-left :10px;
	}
    	
	</style>

 	<title>Wallet</title>
 </head>
 <body>
 <div class="main">
 	<table>

	 <p class="sign" align="center"><h1>Wallet</h1></p>
 		<tr>
 			<td>Name</td>
 			<td>Money</td>
 		</tr>
 		<tr>
 			<td><?php echo $row['Name']; ?></td>
 			<td><?php echo $row['Wallet']; ?></td>
 		</tr>
 	</table>
 	<button class="Bsubmit" onclick="window.location.href='addToWallet.php'">Add Money</button>
 	<button class="Bsubmit" onclick="window.location.href='indexCustomer.php'">Back</button>
 </div>
 </body>
 </html>