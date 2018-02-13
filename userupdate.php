<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/update.css" type="text/css">
<title>RealTimeTech phamaceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
</head>

<body>
  <?php
try{
include "connect.php";

 $result = mysqli_query($con, "SELECT * FROM user");
 
echo "<table border='0' width='90%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >;

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
<th >Firstname</th>
<th>Lastname</th>
<th>Sex</th>
<th>Date of Birth</th>
<th>Home address</th>
<th>Mobile number</th>
<th>Email address</th>
<th>Access level</th>
<th>Username</th>
<th>Edit</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr bgcolor='#FFFFFF'>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['name'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['surname'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['sex'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['date_of_birth'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['home_address'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['mobile_number'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['email'] . "</td>";
   echo "<td  bordercolor='#FFFFFF'>" . $row['access_level'] . "</td>";
   echo "<td  bordercolor='#FFFFFF'>" . $row['username'] . "</td>";
  echo  ("<td><a href=\"updateuser.php?id=$row[id]\"> <img src='images/Update.gif' width='70%'></a></td>");
  echo "<td>"?>   <a href="userdelete.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><img src='images/delete.PNG' width='70%'></a> <?php "</td>";        
  echo "</tr>";
  }
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
?>
</body>
</html>