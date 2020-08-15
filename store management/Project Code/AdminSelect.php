<!DOCTYPE html> 
<html> 
    <?php
        session_start();
    ?>
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
        height: 500px;
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
        padding-top: 40px;
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
        mysqli_select_db($conn,"dbms");

        $category = mysqli_query($conn,"SELECT * FROM Category")
            OR die("".mysqli_error($conn));
            
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {    
        $_SESSION['category'] = $_POST['Category'];
        }
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        }
        else if(array_key_exists('Logout', $_POST))
        {
            button3();
        }

    
        function button1() { 
            
            header('Location: ItemDisplay.php');
        } 
        function button2() { 
            header('Location: Purchase.php'); 
        }
        function button3() { 
            header('Location: Logout.php'); 
        } 
          

    ?> 
    <div class="main">
        <p class="sign" align="center"><?php echo "Welcome, Admin"; ?></p>
    
    <form method="POST" class="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    
    <select class = "un" name="Category" id="Category">
  					<option type = "submit" name = "Category" id="Category" class = "un" value="">Select Category</option>
                    <?php
                        // $c = "Cname";
                        // for($i=0;$i<count($row);$i++)
                        // echo "<option class = 'un' value=". '$row[$i][$c]' .">". $row[$i][$c] ."</option>";
                        while($row = mysqli_fetch_array($category))
                        {
                            $C = $row['Cname'];
                            $I = $row['CID'];
                            echo "<option class = 'un' value=". $I .">". $C ."</option>";
                        }
                    ?>
				</select>

        <input class = "submit" type="submit" name="button1"
                class="button" value="Search" />
        
        <form class="form1" method="POST">         
          
        <input class = "submit" type="submit" name="button2"
                class="button" value="Purchase Data" /> 

        <input class = "submit" type="submit" name="Logout"
                class="button" value="Logout" />        
    </form> 
    </form>
    
    </div> 

</head> 
  
</html> 