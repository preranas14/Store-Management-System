<html>
<head>
<style>

@import url('https://fonts.googleapis.com/css?family=Amarante');

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html { overflow-y: scroll; }
body { 
  background: #eee url('https://i.imgur.com/eeQeRmk.png'); /* https://subtlepatterns.com/weave/ */
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #585858;
  padding: 22px 10px;
  padding-bottom: 55px;
}

::selection { background: #5f74a0; color: #fff; }
::-moz-selection { background: #5f74a0; color: #fff; }
::-webkit-selection { background: #5f74a0; color: #fff; }

br { display: block; line-height: 1.6em; } 

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong, b { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}


/** page structure **/
#wrapper {
  display: block;
  width: 1200px;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
  border: 1px solid black;
}


#keywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('https://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('https://i.imgur.com/RkA9MBo.png');
}


#keywords tbody tr { 
  color: #555;
  border: 1px solid black;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
  border: 1px solid black;
}
#keywords tbody tr td.lalign {
  text-align: left;
}

</style>

</head>
<body>
<?php

session_start();

$conn = mysqli_connect("localhost" , "root" , "");
mysqli_select_db($conn,"dbms");


//$result =  mysqli_query($conn,"CREATE VIEW bill AS SELECT Timestamp,purchase.UID,IID_arr,Count_arr,Cost_arr,Total_cost_per_item,Total_cost,Name from purchase INNER JOIN customer ON purchase.UID = customer.UID") 
//OR die("".mysqli_error($conn));

$result = mysqli_query($conn,"SELECT * FROM bill WHERE UID = '{$_SESSION['UID']}' ") 
                    OR die("".mysqli_error($conn));

?>
 <div id="wrapper">
  <h1>Purchase History</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0" >
    <thead>
      <tr>
        <th><span>Time</span></th>
        <th><span>Name</span></th>
        <th><span>Items</span></th>
        <th><span>Quantity</span></th>
        <th><span>Price/item</span></th>
        <th><span>Total Price/item</span></th>
        <th><span>Total</span></th>
      </tr>
    </thead>

    <tbody>
    
    <?php
    while($row = mysqli_fetch_array($result))
    {    

        $IIDs = explode(",",$row["IID_arr"]);
        $Counts = explode(",",$row["Count_arr"]);
        $Prices = explode(",",$row["Cost_arr"]);
        $TPs = explode(",",$row["Total_cost_per_item"]);
        $N = count($IIDs);

        

        echo "<tr>";
        echo "<td rowspan = '". $N ."' >". $row['Timestamp'] ."</td>";
        echo "<td rowspan = '". $N ."' >". $row['Name'] ."</td>";

        $IID = $IIDs[0];

        $Item = mysqli_query($conn,"SELECT * FROM items where IID = '$IID' ") 
        OR die("".mysqli_error($conn));

        $row_item = mysqli_fetch_array($Item);

        echo "<td>". $row_item['Iname'] ."</td>";

        $Count = $Counts[0];
        echo "<td>". $Count ."</td>";

        $Price = $Prices[0];
        echo "<td>". $Price ."</td>";

        $TP = $TPs[0];
        echo "<td>". $TP ."</td>";

        echo "<td rowspan = '". $N ."' >". $row['Total_cost'] ."</td>";

        echo "</tr>";

        
        for($i=1;$i<$N;$i++)
        {   
            echo "<tr>";

            $IID = $IIDs[$i];
            $Item = mysqli_query($conn,"SELECT * FROM items where IID = '$IID' ") 
            OR die("".mysqli_error($conn));

            $row_item = mysqli_fetch_array($Item);

            if(!empty($row_item['Iname']))
              echo "<td>". $row_item['Iname'] ."</td>";

            $Count = $Counts[$i];
            if(!empty($Count))
            echo "<td>". $Count ."</td>";

            $Price = $Prices[$i];
            if(!empty($Price))
            echo "<td>". $Price ."</td>";

            $TP = $TPs[$i];
            if(!empty($TP))
            echo "<td>". $TP ."</td>";

            echo "</tr>";

        }

        echo "<tr> <td colspan =". 7 ."> </td></tr>" ;


    }
    ?> 
    </tbody>
  </table>
 </div> 
</body>

</html>
