<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM Items LEFT JOIN Category ON Items.CID = Category.CID WHERE Category.CID = '".$_SESSION['Category']."'";
	$result = mysqli_query($conn,$query);

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{

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
            
            $query = "DELETE from Message WHERE Stats = 1 ";
			mysqli_query($conn,$query);	

			$message = "Stock Sent!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		    header('refresh:3;url=sendStock.php');
		    
		} else {
		    echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}

	}

 ?>

<!DOCTYPE html>
<html>
<head>
<style>
	        
    body{
	margin:0; padding:0;
  background:url(https://thumbs.gfycat.com/CelebratedSelfreliantBluebottle-size_restricted.gif);
	-webkit-animation: 10s linear 0s normal none infinite animate;
}
    
    .main {
        background-color: #17202A;
        width: 500px;
        height: 470px;
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
        padding-left:20px;
		font-size: 20px;
	}

	li{
		margin-left :10px;
	}
    	
	</style>

	<title>Stock</title>
</head>
<body>
	
	<div class = "main">
		<table>
			
		<p class="sign" align="center">Stocks</p>
			<br>
			<tr>
				<td>IID</td>
				<td>CID</td>
				<td>Name</td>
				<td>Stock</td>
				<td>Send</td>
			</tr>
			<?php
				while($row = mysqli_fetch_array($result))
				{
			  ?>
			  <form class = "form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <tr>
			  	<td><input type="hidden" name="iid" value="<?php echo $row['IID']; ?>"><?php echo $row['IID']; ?></td>
			  	<td><input type="hidden" name="cid" value="<?php echo $row['CID']; ?>"><?php echo $row['CID']; ?></td>
			  	<td><input type="hidden" name="iname" value="<?php echo $row['Iname']; ?>"><?php echo $row['Iname']; ?></td>
			  	<td><input class = "un" type="number" name="stock" value="<?php echo $row['Stock']; ?>"></td>
			  	<td><input class = "submit" type="submit" value="Send Stock"></td>
			  </tr>
			  </form>
			<?php
				  }
			 ?>
			 
		</table>
		<p class = "forgot" align = "center">
			<a href="indexDistributor.php">Go Back</a>
			</p>

	</div>	
</body>
</html>