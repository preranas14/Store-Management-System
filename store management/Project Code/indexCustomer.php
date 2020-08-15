<!DOCTYPE html> 
<html> 
    <?php
        session_start();
    ?>
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
        height: 450px;
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
    
    form.form1 {
    
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
		width:50%;
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
        margin-left: 50px;
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

    <title> 
    </title> 
</head> 
  
<body style="text-align:center;">  
      
    <?php

        $conn = mysqli_connect("localhost" , "root" , "");
        mysqli_select_db($conn,"login");

        

        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
		}
		else if(array_key_exists('button3', $_POST)) { 
            button3(); 
		}
		else if(array_key_exists('button4', $_POST)) { 
            button4(); 
        }
        else if(array_key_exists('Logout', $_POST))
        {
            button5();
        }

        function button1() { 
            header('Location: selectCategory.php'); 
        } 
        function button2() { 
            header('Location: userProfile.php'); 
        }
        function button3() { 
            header('Location: viewPurchaseHistory.php'); 
		}
		function button4() { 
            header('Location: wallet.php'); 
		}
		function button5() { 
            header('Location: Logout.php'); 
        }



    ?> 
    <div class="main">
        <p class="sign" align="center"><?php echo "Welcome, ";
        echo $_SESSION["Name"]; ?></p>
    
    <form method="post" class="form1"> 

        <input class = "submit" type="submit" name="button1"
                class="button" value="Buy Items" /> 
          
				<input class = "submit" type="submit" name="button3"
				class="button" value="View Purchase History" /> 


		<input class = "submit" type="submit" name="button4"
				class="button" value="Wallet" /> 

        <input class = "submit" type="submit" name="Logout"
                class="button" value="Logout" />        
    </form> 
    </div> 

</head> 
  
</html> 