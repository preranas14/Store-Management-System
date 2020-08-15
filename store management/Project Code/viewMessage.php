<?php
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    $CID = $_SESSION['Category'];
	$query = "SELECT * FROM Message WHERE CID = '$CID' ";
	$result = mysqli_query($conn,$query);
 ?>

 <!DOCTYPE html>
 <html>

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
        font-size: 40px;
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
        padding-left:95px;
		font-size: 20px;
	}

	li{
		margin-left :10px;
	}
    	
	</style>

 <head>
 	<title>View Message</title>
 </head>
 <body>
 <div class = "main">
 	<table>
	 <p class="sign" align="center">Messages</p>
			<tr>
				<td>IID</td>
				<td>Name</td>
				<td>Stock</td>
			</tr>
			<?php
				while($row = mysqli_fetch_array($result))
				{
				if($row['Stats']==0)
				{

			  ?>

			
			 <tr>
			  <td><?php echo $row['IID']; ?></td>
			  <td><?php echo $row['Iname']; ?></td>
			  <td><?php echo $row['Stock']; ?></td>
			 </tr>
			
			<?php
				}
			  }
			 ?>
	</table>
	</div>
 </body>
 </html>