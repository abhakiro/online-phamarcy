<?php
session_start();
if($_SESSION['username']==NULL){
	//header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>RealTimeTech phamaceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js">  </script>
<link rel="stylesheet" href="css/chat.css" type="text/css">
<link href="css/reply.css" type="text/css" rel="stylesheet">
<title>Untitled Document</title>
<script language="javascript">
 $(function(){
	 $(".compose").hide();
	 });
function reply(){
	$(".compose").show();
	}
$(document).ready(function(){
$(".reply").click(reply);
	 });
</script>
</head>

<body>
<div class="body">
 <?php

try{
include "connect.php";
 $id=$_GET['id'];
 $qry= mysqli_query($con, "UPDATE chat SET status='read' WHERE id='$id'");
		
				  
 $result = mysqli_query($con, "SELECT * FROM chat where id='$id'");

while($row = mysqli_fetch_array($result))
  {
	  
    $sender= $row['sender'];
   $date= $row['date'];
   $receiver= $row['receiver'];
   $body=$row['message'];
    }
 
}catch(Exception $e){
	echo $e;
	}
?>
 <table width="70%" align="center" bgcolor="#990000" border="0"  cellspacing="1" cellpadding="2" class="table">
  <tbody>
   <tr class="tr">
    <td style="color: rgb(255, 255, 255);" bgcolor="#0099ff" colspan="2" class="tr"><STRONG> Chat with <?php echo $sender; ?> </STRONG></td>
     </tr>
   <tr class="tr" >
    <td bgcolor="#ffffff"  class="tr">
    
     <?php
try{
include "connect.php";

 $results = mysqli_query($con, "SELECT * FROM chat where sender='$sender' and receiver='$_SESSION[username]' order by id ASC");
 
echo "<table border='0' width='90%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>

</tr>";

while($rw = mysqli_fetch_array($results))
  {
	  $username=$rw['sender'];
	   $qrry = mysqli_query($con, "SELECT * FROM user where username='$username' ");
	   while($rows = mysqli_fetch_array($qrry)){
		    $imagename= base64_encode($rows['image']);
		   }
  
  echo "<tr bgcolor='#FFFFFF'>";
  echo "<td>"?><img src="<?php echo "data:image/jpeg;base64,".$imagename.""; ?>" border="1" width="50" height="50" class="image" ><?php "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $rw['message'] . "</td>";
   echo "<td  bordercolor='#FFFFFF'>" . $rw['date'] . "</td>";    
  echo "</tr>";
  }
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
?>
      
     
     <p><img src="images/reply.jpg" width="10%" class="reply"></p>
      </td>
       <td  bgcolor="#ffffff"  class="tr">
       <?php
try{
include "connect.php";

 $results = mysqli_query($con, "SELECT * FROM chat where sender='$_SESSION[username]' and receiver='$sender' order by id ASC");
 
echo "<table border='0' width='90%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>

</tr>";

while($rw = mysqli_fetch_array($results))
  {
	  $username=$rw['sender'];
	   $qrry = mysqli_query($con, "SELECT * FROM user where username='$username' ");
	   while($rows = mysqli_fetch_array($qrry)){
		    $imagename= base64_encode($rows['image']);
		   }
  
  echo "<tr bgcolor='#FFFFFF'>";
  echo "<td>"?><img src="<?php echo "data:image/jpeg;base64,".$imagename.""; ?>" border="1" width="50" height="50" class="image" ><?php "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $rw['message'] . "</td>";
   echo "<td  bordercolor='#FFFFFF'>" . $rw['date'] . "</td>";    
  echo "</tr>";
  }
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
?>
      </td>
   </tr>
  </tbody>
  </table>
  
  <form action="reply.php" method="post" name="compose" class="compose" enctype="multipart/form-data">
   <h1>Reply</h1>
     <p><textarea name="body" class="bod" cols="5" rows="5" placeholder="Your story"></textarea></p>
   <p><button type="submit" name="send" class="send"><img src='images/reply.jpg' width='30%'></button></p>
  <p><input type="hidden" name="recver" value="<?php echo $sender; ?>"></p>
  </form>
 <?php
  try{
		if(isset($_POST['send'])){
			$recver=$_POST['recver'];
			$sendr=$_SESSION['username'];
			$date= Date("Y/m/d h:i");
				include "connect.php";
				if($sendr==$recver){
		echo"<script> alert('you cant send an email to yourself');location='chat.php';</script>";
		}else{
	
				$qry=mysqli_query($con, "select * from user where username= '$recver'");

				if(mysqli_num_rows($qry) > 0) {
										
					$querry="
insert into chat(date,sender,receiver,message,status)
		values('$date','$sendr','$_POST[recver]','$_POST[body]','unread')			
		";
				
		if(mysqli_query($con, $querry)){
			
			?>
            <script language="javascript">
			
			 location="chat.php";
		 </script>
         
            <?php
			
			
			}
			else{
				echo "failed".mysqli_error($querry);
				}
			
		}
		
	else{
	
	echo"<script> alert('Sorry $recver does not exist');location='chat.php';</script>";
	}
			
		}
								
			}
			
      }catch(Eception $er){
		echo $er;
			}
?>
  </div>
  
</body>
</html>