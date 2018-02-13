<?php
if(!isset($_SESSION)){
session_start();
}
if($_SESSION['username'] == NULL){
	header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/update.css" type="text/css">
<title>Untitled Document</title>
</head>

<body>
  <?php
try{
include "connect.php";

 $result = mysqli_query($con, "SELECT * FROM drugs");
 
echo "<table border='0' width='90%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >;

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
<th >Drug name</th>
<th>Quantity</th>
<th>Date</th>
<th>Discription</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr bgcolor='#FFFFFF'>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['drug_name'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['quantity'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['date'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['discription'] . "</td>";
  echo  ("<td><a href=\"updatedrug.php?id=$row[id]\"> <img src='images/Update.gif' width='70%'></a></td>");
  echo "<td>"?>   <a href="drugdelete.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><img src='images/delete.PNG' width='70%'></a> <?php "</td>";        
  echo "</tr>";
  }
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
?>
</body>
</html>