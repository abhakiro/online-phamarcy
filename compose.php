<?php
session_start();
if($_SESSION['username']==NULL){
	header("location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/compose.css" type="text/css" rel="stylesheet">
<title>RealTimeTech phamaceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
<script type="text/javascript" src="jquery.js">  </script>
<script language="javascript">
 $(function(){
	 $(".mesage, .success, .fail").hide();
	 });
</script>
</head>

<body>
<header>
 <img src="images/BannerSLMail.jpg" class="barner">
</header>
<div class="body">
<?php
include "connect.php";
 $qry= mysqli_query($con, "select * from user where username='$_SESSION[username]'");
 while($row=mysqli_fetch_array($qry)){
	 $email=$row['email'];

	 }
	  
?>
 <form action="compose.php" method="post" name="compose" class="compose" enctype="multipart/form-data">
 
   <h1>Compose your email</h1>
   <p><input type="email" name="sender" required="required" class="sender" value="<?php echo $email;  ?>"></p>
  <p> <input type="email" name="receiver" required="required" class="receiver" placeholder="To abd@alvota.co.zw"></p>
  <p><input type="text" name="subject" required="required" class="subject" placeholder="subject"></p>
  <p><textarea name="body" class="body" cols="5" rows="5" placeholder="compose email"></textarea></p>
 <p> <input type="file" class="validate-subject required input_field" name="file" id="image"></p>
  <p><button type="submit" name="send" class="send">Send mail</button></p>
   
 </form>

</div>
 <footer >
 </footer>
<?php
  try{
		if(isset($_POST['send'])){
			$reciever=$_POST['receiver'];
			$sender=$_POST['sender'];
			$date= Date("Y/m/d h:i");
				include "connect.php";
				if($sender==$reciever){
		echo"<script> alert('you cant send an email to yourself');location='compose.php';</s";
		}else{
	
				$qry=mysqli_query($con, "select * from user where email= '$_POST[receiver]'");

				if(mysqli_num_rows($qry) > 0) {
					$file = $_FILES['file']['tmp_name'];
					$filename = $_FILES['file']['name'];
		            $filesize = $_FILES['file']['size'];
		            $fileextension = $_FILES['file']['type'];
                    $fileContent = addslashes(file_get_contents($file));
					
					$querry="
insert into mails(date,sender,receiver,subject,message,status,attachments,filename,filesize,fileextension)
		values('$date','$_POST[sender]','$_POST[receiver]','$_POST[subject]','$_POST[body]','unread','$fileContent','$filename','$filesize','$fileextension')			
		";
		
		
		if(mysqli_query($con, $querry)){
			
			?>
            <script language="javascript">
			 alert("mail send");
			 location="compose.php";
		 </script>
         
            <?php
			
			
			}
			else{
				echo "failed".mysqli_error($querry);
				}
			
		}
		
	else{
	
	echo"<script> alert('Sorry $reciever does not exist');location='compose.php';</script>";
	}
			
		}
								
			}
			
      }catch(Eception $er){
		echo $er;
			}
?>
</body>
</html>