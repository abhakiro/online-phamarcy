<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
try{
//if(isset($_POST['buy'])){
	include "connect.php";
	$username=$_SESSION['username'];
	$id=$_POST['id'];
	$date= Date("Y/m/d h:i");
	 $results = mysqli_query($con, "SELECT * FROM drugs where id='1'");
	 echo "<table border='0' width='90%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
<th >Drug name</th>
<th>Price</th>
<th>Quantity</th>
<th>Total(US$)</th>
<th>Drop</th>
</tr>";
 
while($row = mysqli_fetch_array($results)){
	 echo "<tr bgcolor='#FFFFFF'>";
	  echo "<td  bordercolor='#FFFFFF'>" . $row['drug_name'] . "</td>";
	   echo "<td  bordercolor='#FFFFFF'>" . $row['price'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'><input type='text' name='qnty' value='1' class='qnty'> </td>";
	$quantity=$row['quantity'];
	$price=$row['price'];
	$total=$quantity  * $price;
	 echo "<td  bordercolor='#FFFFFF'>" .$total. "</td>";
	//}
	}
}catch(Exception $e){
	echo $e;
	}
?>
</body>
</html>