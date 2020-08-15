<?php
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM Category";
	$result = mysqli_query($conn,$query);

  ?>

  <!DOCTYPE html>
  <html>

  <head>

  <style>
body{
	margin:0; padding:0;
  background:url(https://outlane.co/wp-content/themes/outlane/static/img/graphics-store/ecommerce-icons/ecommerce-icons-cover.gif);
	 -webkit-animation: 10s linear 0s normal none infinite animate;
}
    
    .main {
        background-color: #17202A;
        width: 400px;
        height: 500px;
        margin: 5em auto;
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
        padding-top: 40px;
        color: #D5D8DC;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 76%;
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
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }

    .un option {
        color: black;

    }
    
    form.form1 {
        padding-top: 10px;
    }
    
    .pass {
    width: 76%;
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
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(234, 236, 238, 0.18) !important;
        
    }
    
    .submit {
		width : 50%;
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #D5D8DC, #2C3E50);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 100px;
        margin-top : 20px;
        margin-bottom : 20px;
        margin-right:50px;
        align:center;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(234, 236, 238, 0.04);
        text-align: center;
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

  	<title>Category</title>
  </head>
  <body>

  <div class= "main">
  <p class="sign" align="center">Select Category</p>

	<form method="POST" action="buyItems.php">
		<select class = "un" id="category" name="category" id="category">
		<?php
			while($row = mysqli_fetch_array($result))
			{
		  ?>
		  <option class="un" type="submit" value="<?php echo $row['CID']; ?>"><?php echo $row['Cname']; ?></option>
		  <?php
		  	}
		   ?>			
	</select>
	<input class="submit" type="submit" value="Search"> 
	</form>
	<button class="submit" onclick="window.location.href='viewCart.php'">View Cart</button>
	<button class="submit" onclick="window.location.href='indexCustomer.php'">Back</button>
	<button class="submit" onclick="window.location.href='logout.php'">Logout</button>

</div>
  </body>
  </html>