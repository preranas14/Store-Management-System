<?php 
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{	
	//echo "test1";
	
    $conn = mysqli_connect("localhost" , "root" , "");
        mysqli_select_db($conn,"dbms");

    $query = "SELECT * FROM Items ";

    $query = mysqli_query($conn,$query)
                OR die("".mysqli_error($conn));

    while($row = mysqli_fetch_array($query))
    {   
       $ID = $row['IID'];
       if(isset($_POST[$ID]))
       {
           //echo $Stock;
           $Stock = $_POST[$ID];
           //echo $Stock;
           $Stock = stripcslashes($Stock);
           $Stock = mysqli_real_escape_string($conn,$Stock);
           $result = mysqli_query($conn,"UPDATE items SET Stock = '$Stock' WHERE IID = '$ID'") 
                        OR die("".mysqli_error($conn));
       }
        
    }            

    //Upar se kuch pop up lana hai ki successfull karke

	header('Location: AdminSelect.php'); 
	
	
}
 ?>