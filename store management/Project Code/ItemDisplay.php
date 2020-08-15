<?php 
    session_start();
    $category = $_SESSION['category'];

	//echo "<script type='text/javascript'>alert('$category');</script>";

    $conn = mysqli_connect("localhost" , "root" , "");
        mysqli_select_db($conn,"dbms");

    $query = "SELECT Cname FROM Category WHERE CID = '$category'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    $Cname = $row['Cname'];

    $query = "SELECT * FROM Items INNER JOIN Category ON items.CID = Category.CID where Category.CID = '$category' ";

    $query = mysqli_query($conn,$query)
                OR die("".mysqli_error($conn));

?>
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
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(213, 216, 220);
    margin-bottom: 50px;
    margin-left: 10px;
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
        margin-right:10px;
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
	<title>Items</title>
</head>
<body>

<div class= "main">

	<p class="sign" align="center"><?php echo $Cname; ?> Category</p>
	
		<table>

			<tr>
				<td>IID</td>
                <td>CID</td>
				<td>Name</td>
				<td>Stock</td>
				<td>Cost</td>
				<td>Contact</td>
			</tr>
        <?php

        while( $row = mysqli_fetch_array($query))
        { 
        ?>  
            <!-- //echo "<li><Label>". $row['Iname'] ."</Label>";
            //echo "<input class = 'un' type='hidden' name='". $row['IID'] ."' value ='". $row['Stock'] ."' >";
             -->
             <form class = "form1" action="sendMessage.php" method="POST">
            <tr>
            <td><input type="hidden" name="iid" value="<?php echo $row['IID']; ?>"><?php echo $row['IID']; ?></td>
            <td><input type="hidden" name="cid" value="<?php echo $row['CID']; ?>"><?php echo $row['CID']; ?></td>
            <td><input type="hidden" name="iname" value="<?php echo $row['Iname']; ?>"><?php echo $row['Iname']; ?></td>
            <td><input type="hidden" name="stock" value="<?php echo $row['Stock']; ?>"><?php echo $row['Stock']; ?></td>
            <td><input type="hidden" name="cost" value="<?php echo $row['Cost']; ?>"><?php echo $row['Cost']; ?></td>
            <td><input class = "submit" type="submit" value="Distributor"></td>
            </tr>
            </form>
        <?php
        }
        ?>
        </table>

	    <p class="forgot" align="center">
		    <a href="AdminSelect.php">Go Back</a>

</div>
</body>
</html>