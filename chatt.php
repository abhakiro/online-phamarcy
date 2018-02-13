<?php
session_start();
if($_SESSION['username'] == NULL){
	header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RealTimeTech phamaceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
<link rel="stylesheet" href="css/chat.css" type="text/css">
<link rel="stylesheet" href="css/registration.css" type="text/css">
<script type="text/javascript" src="scripts/jquery.js">  </script>
<script type="text/javascript" src="scripts/myjquery.js">  </script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

</head>

<body id="sub">
<div id="tooplate_wrapper_sub">
	<div id="tooplate_header">
    	<div id="site_title"><h1><a href="#">RealTimeTech</a></h1></div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="userhome.php" class="current">Home</a></li>
                <li><a href="shopping_cart.php" class="popular">Shoping cart</a></li>
                <li><a href="chatt.php">Lets chatt</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>    	
            <div id="search_box">
                <form action="#" method="get">
                <input type="text" value="Search" name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="" id="searchbutton" title="Search" />
                </form>
            </div>
        </div> <!-- end of tooplate_menu -->
    </div> <!-- end of header -->
    
    <div id="tooplate_middle_sub">
        
        <p>You are logged in as <?php echo $_SESSION['username']; ?> </p>
	</div> <!-- end of middle -->
    
     <div id="tooplate_main">
        <div class="post_box">
           </header>


             <div class="cleaner"></div>
   <form action="chat.php" method="post" name="compose" class="compose" enctype="multipart/form-data">
   <h1>Begin chatt</h1>
   <p><input type="text" name="receiver" required="required" class="subject" placeholder="To" ></p>
  <p><textarea name="body" class="bod" cols="5" rows="5" placeholder="Your story"></textarea></p>
   <p><button type="submit" name="send" class="send"><img src='images/reply.jpg' width='30%'></button></p>
  <?php 
   include "connect.php";
	$usernames=$_SESSION['username'];
	 $inbox= mysqli_query($con, "SELECT id, COUNT(receiver) FROM chat where receiver='$_SESSION[username]' and status='unread'");
	 
	  while($row = mysqli_fetch_array($inbox)){
        $results= $row['COUNT(receiver)'];
	  }
	  
	  $al= mysqli_query($con, "SELECT id, COUNT(receiver) FROM chat where receiver='$_SESSION[username]'");
	 
	  while($row = mysqli_fetch_array($al)){
        $all= $row['COUNT(receiver)'];
	  }
	  ?>

  <h1><label>New </label><label class="lbl">(<?php echo $results; ?>)</label> <label class="all">(<?php echo $all; ?>)</label><label class="al">All</label></h1> 
 
            <?php
try{
include "connect.php";

 $result = mysqli_query($con, "SELECT * FROM chat where receiver='$_SESSION[username]' order by id DESC");
 
echo "<table border='0' width='70%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>

</tr>";

while($row = mysqli_fetch_array($result))
  {
	  $username=$row['sender'];
	   $qry = mysqli_query($con, "SELECT * FROM user where username='$username' ");
	   while($rows = mysqli_fetch_array($qry)){
		    $imagename= base64_encode($rows['image']);
		   }
  
  echo "<tr bgcolor='#FFFFFF'>";
  echo "<td>"?><img src="<?php echo "data:image/jpeg;base64,".$imagename.""; ?>" border="1" width="50" height="50" class="image" ><?php "</td>"; 
  echo ("<td  ><a href=\"reply.php?id=$row[id]\"> $row[sender] </a> </td>");
   echo "<td>"?>   <a href="userdelete.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><img src='images/delete.PNG' width='50%'></a> <?php "</td>";        
  echo "</tr>";
  }
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
?>
 </form>
        </div>
        
        </div>
    </div> <!-- end of tooplate_main -->
</div> <!-- end of wrapper -->

<div id="tooplate_footer_wrapper">
    <div id="tooplate_footer">
    
    	<div class="col_allw300">
        	<h4>Our Pages</h4>
            <ul class="footer_list">
            	<li><a href="userhome.php" class="current">Home</a></li>
                <li><a href="shopping_cart.php" class="popular">Shoping cart</a></li>
                <li><a href="chatt.php">Lets chatt</a></li>
                <li><a href="logout.php">Logout</a></li>
          
            </ul>
        </div>
    	<div class="col_allw300">
        	<h4>Our Partners</h4>
            <ul class="footer_list">
            	<li><a href="#">Avenues Clinic, Zimbabwe</a></li>
                <li><a href="#">Parirenyatwa hospital groups,Zimbabwe</a></li>
            	<li><a href="#">Emalahleni Private hospital, SA</a></li>
                <li><a href="#">Capetown General hospital, SA</a></li>
                <li><a href="#">Ministry of Health and child care</a></li>
            </ul>
        </div>
    	<div class="col_allw300 col_last">
        
        	<h4>About Us</h4>
             RealTimeTech pharmacy is a registered phamarcy operating within the Zimbabwe boaders. 
            <div class="cleaner h10"></div>
            
           Copyright © 2018 <a href="aboutdeveloper.php">RealTimeTech Technologies</a
        </div>                 
    
        <div class="cleaner"></div>
    
    </div> <!-- end of tooplate_footer -->
     <div class="cleaner"></div>
</div>
<?php
  try{
		if(isset($_POST['send'])){
			$receiver=$_POST['receiver'];
			$sender=$_SESSION['username'];
			$date= Date("Y/m/d h:i");
				include "connect.php";
				if($sender==$receiver){
		echo"<script> alert('you cant chatt to yourself');location='chat.php';</s";
		}else{
	
				$qry=mysqli_query($con, "select * from user where username= '$_POST[receiver]'");

				if(mysqli_num_rows($qry) > 0) {
					
					$querry="
insert into chat(sender,receiver,date,message,status)
		values('$sender','$_POST[receiver]','$date','$_POST[body]','unread')			
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
	
	echo"<script> alert('Sorry $receiver does not exist');location='chat.php';</script>";
	}
			
		}
								
			}
			
      }catch(Eception $er){
		echo $er;
			}
?>
</body>
</html>