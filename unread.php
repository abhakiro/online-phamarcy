<?php
//session_start();
if($_SESSION['username']==NULL){
	header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js">  </script>
<link rel="stylesheet" href="css/update.css" type="text/css">
<title>Untitled Document</title>
</head>

<body>
<?php



try{
include "connect.php";

 $result = mysqli_query($con, "SELECT * FROM mails where receiver='$_SESSION[username]' and status='unread' order by id DESC");
 
echo "<table border='1' class='tb' width='90%' align='center' cellspacing='0' cellpadding'0' bgcolor='#CCCCCC'   >;

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  >
<th >Subject</th>
<th>From</th>
<th>Date</th>
<th>Reply</th>
<th>Download</th>
<th>Delete</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
	  
  echo "<tr bordercolor='#000033'>";
  echo ("<td  ><a href=\"reply.php?id=$row[id]\"> $row[subject] </a> </td>");
  echo "<td  >" . $row['sender'] . "</td>";
  echo "<td  >" . $row['date'] . "</td>";
  echo  ("<td ><a href=\"reply.php?id=$row[id]\" name='click'> <img src='images/reply.jpg' width='20%'></a></td>");
  echo  ("<td><a href=\"download.php?id=$row[id]\"><img src='images/attachment.jpg' width='20%'></a></td>");
  echo "<td>"?><a href="delete.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete this row?'); " ><img src='images/images-2.jpg' width='20%'></a> <?php "</td>";        
  echo "</tr>";
  }
 
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
	
?>
</body>
</html>