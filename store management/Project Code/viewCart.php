<?php 
	session_start();

	$servername = "localhost";

	$dbname = "dbms";

	$conn = mysqli_connect($servername, 'root', '', $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// $iid = $_POST['iid'];
	// $cid = $_POST['cid'];
	// $iname = $_POST['iname'];
	// $stock = $_POST['stock'];
	// $amount = $_POST['amount'];
	// $price = $amount*$_POST['cost'];
	$UID = $_SESSION['UID'];
	$total = 0;
	$query = "SELECT * FROM Cart WHERE UID = '$UID' ";
	$result = mysqli_query($conn,$query);
 ?>

 <!DOCTYPE html>
 <html>
 <head>

 <style>
@import url(https://fonts.googleapis.com/css?family=Fredoka+One);

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
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #414141;
  background: #caccf7 url('https://i.imgur.com/Syv2IVk.png'); /* https://subtlepatterns.com/old-map/ */
  padding: 25px 0;
}

::selection { background: #bdc0e8; }
::-moz-selection { background: #bdc0e8; }
::-webkit-selection { background: #bdc0e8; }

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
em, i { font-style: italic; }

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

h1 {
  font-family: 'Fredoka One', Helvetica, Tahoma, sans-serif;
  color: #fff;
  text-shadow: 1px 2px 0 #7184d8;
  font-size: 3.5em;
  line-height: 1.1em;
  padding: 6px 0;
  font-weight: normal;
  text-align: center;
}


/* page structure */
#w {
  display: block;
  width: 600px;
  margin: 0 auto;
}

#title {
  display: block;
  width: 100%;
  background: #95a6d6;
  padding: 10px 0;
  -webkit-border-top-right-radius: 6px;
  -webkit-border-top-left-radius: 6px;
  -moz-border-radius-topright: 6px;
  -moz-border-radius-topleft: 6px;
  border-top-right-radius: 6px;
  border-top-left-radius: 6px;
}

#page {
  display: block;
  background: #fff;
  padding: 15px 0;
  -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
  -moz-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
}

/** cart table **/
#cart {
  display: block;
  border-collapse: collapse;
  margin: 0;
  width: 100%;
  font-size: 1.2em;
  color: #444;
}
#cart thead th {
  padding: 8px 0;
  font-weight: bold;
}

#cart thead th.first {
  width: 175px;
}
#cart thead th.second {
  width: 80px;
}
#cart thead th.third {
  width: 250px;
}
#cart thead th.fourth {
  width: 150px;
}
#cart thead th.fifth {
  width: 40px;
}

#cart tbody td {
  text-align: center;
  margin-top: 4px;
}

tr.productitm {
  height: 65px;
  line-height: 65px;
  border-bottom: 1px solid #d7dbe0;
}


#cart tbody td img.thumb {
  vertical-align: bottom;
  border: 1px solid #ddd;
  margin-bottom: 4px;
}

.qtyinput {
  width: 33px;
  height: 22px;
  border: 1px solid #a3b8d3;
  background: #dae4eb;
  color: #616161;
  text-align: center;
}

tr.totalprice, tr.extracosts {
  height: 35px;
  line-height: 35px;
}
tr.extracosts {
  background: #e4edf4;
}

.remove {
  /* http://findicons.com/icon/261449/trash_can?id=397422 */
  cursor: pointer;
  position: relative;
  right: 12px;
  top: 5px;
}


.light {
  color: #888b8d;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.45);
  font-size: 1.1em;
  font-weight: normal;
}
.thick {
  color: #272727;
  font-size: 1.7em;
  font-weight: bold;
}


/** submit btn **/
tr.checkoutrow {
  background: #cfdae8;
  border-top: 1px solid #abc0db;
  border-bottom: 1px solid #abc0db;
  width:100%;
}
td.checkout {
  padding: 12px 0;
  padding-top: 20px;
  width: 100%;
  text-align: right;
}


/* https://codepen.io/guvootes/pen/eyDAb */
#submitbtn {
  width: 150px;
  height: 35px;
  outline: none;
  border: none;
  border-radius: 5px;
  margin: 0 0 10px 0;
  font-size: 1.3em;
  letter-spacing: 0.05em;
  font-family: Arial, Tahoma, sans-serif;
  color: #fff;
  text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
  cursor: pointer;
  overflow: hidden;
  border-bottom: 1px solid #0071ff;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #66aaff), color-stop(100%, #4d9cff));
  background-image: -webkit-linear-gradient(#66aaff, #4d9cff);
  background-image: -moz-linear-gradient(#66aaff, #4d9cff);
  background-image: -o-linear-gradient(#66aaff, #4d9cff);
  background-image: linear-gradient(#66aaff, #4d9cff);
}
#submitbtn:hover {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #4d9cff), color-stop(100%, #338eff));
  background-image: -webkit-linear-gradient(#4d9cff, #338eff);
  background-image: -moz-linear-gradient(#4d9cff, #338eff);
  background-image: -o-linear-gradient(#4d9cff, #338eff);
  background-image: linear-gradient(#4d9cff, #338eff);
}
#submitbtn:active {
  border-bottom: 0;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #338eff), color-stop(100%, #4d9cff));
  background-image: -webkit-linear-gradient(#338eff, #4d9cff);
  background-image: -moz-linear-gradient(#338eff, #4d9cff);
  background-image: -o-linear-gradient(#338eff, #4d9cff);
  background-image: linear-gradient(#338eff, #4d9cff);
  -webkit-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
  -moz-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
  box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
}

td.other{
padding-top:20px;

}

 </style>
 	<title>View Cart</title>
 </head>
 <body>
	<div id="w">
	<header id="title">
      <h1>View Cart</h1>
    </header>
	<div id="page">
 	<table id="cart"> 
			
	 <thead>
          <tr>
            <th class="third">Product</th>
			<th class="second">Qty</th>
            <th class="fourth">Total Price</th>
            <th class="fifth">&nbsp;</th>
          </tr>
        </thead>
		<tbody>
			<?php
				while($row = mysqli_fetch_array($result))
				{
					$total += $row['Price']; 
			  ?>
			  <form method="POST" action="deleteItem.php">
			  <tr class="productitm">

			  	
			  	<td><input type="hidden" name="iname" value="<?php echo $row['IName']; ?>"><?php echo $row['IName']; ?></td>
			  	<td><input type="hidden" name="amount" value="<?php echo $row['Amount']; ?>"><?php echo $row['Amount']; ?></td>
			  	<td><input type="hidden" name="price" value="<?php echo $row['Price']; ?>"><?php echo $row['Price']; ?></td>
				
				<td><input type="hidden" name="cid" value="<?php echo $row['CID']; ?>"><input type="hidden" name="iid" value="<?php echo $row['IID']; ?>"></td>
				<td><span class="remove"><button type="submit" value="Remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></td>
			  	<td></td>
			  </tr>
			
			</form>
			  <?php
			  	}
			   ?>

			<tr class="totalprice">
            <td class="light">Grand Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick"><?php echo $total; ?></span></td>
          </tr>

			  <?php $_SESSION['total'] = $total; ?>
		
		

		<tr class="checkoutrow">
            <td colspan="5" class="checkout"><button id="submitbtn" onclick="window.location.href='checkOut.php'">CheckOut</button></td>
          </tr>

		<tr>
		<td class="other" colspan="3"><button id="submitbtn" onclick="window.location.href='selectCategory.php'">Continue</button></td>
		
		<td  class="other" colspan="2" ><button id="submitbtn" onclick="window.location.href='logout.php'">Logout</button></td>
		
		</tr>
		</tbody>
		</table>
		</div>
		</div>
 </body>
 </html>