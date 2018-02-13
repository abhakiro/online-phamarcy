<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
try{
include "connect.php";
$drug_id = mysqli_real_escape_string($con, $_GET['id']);
$quantity = $_POST['qnty'];
 echo $drug_id;
 echo $quantity;
 /*$username = $_SESSION['username'];
 $date= Date("Y/m/d h:i");
 $quantity=$_GET['qnty'];
 echo $quantity;
 $myquery =  "update cart set date ='$date', quantity ='$quantity', checkout='checked' where id= '$drug_id'";
 if(mysqli_query($con,$myquery)){
	 echo"<script> alert('thank you $username for your order. Please check your mailbox for a receipt.');location='userhome.php#inbox';</script>";
	 }
	*/
	}catch(Excdeption $e){
		echo $e;
	}
	?>
</body>
</html>