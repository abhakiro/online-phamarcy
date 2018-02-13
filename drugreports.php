<?php
session_start();
if($_SESSION['username'] == NULL){
	//header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RealTimeTech phamaceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
<link href="css/adminhom.css" rel="stylesheet" type="text/css" />
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/registration.css" type="text/css">
<link rel="stylesheet" href="css/reports.css" type="text/css">
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
                <li><a href="adminhome.php" class="current">Home</a></li>
                    <li id="ds"><a href="userreport.php">User reports</a></li>
                    <li id="cm"><a href="ordersreports.php">Order reports</a></li>
                    <li id="sc"><a href="drugreports.php">Drug reports</a></li>
                    <li><a href="logout.php">Logout</a></li>
            </ul>    	
            <div id="search_box">
                <form action="drugreports.php" method="post">
                <input type="text" name="searchfields" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
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
            <?php

	include "connect.php";
		$result = mysqli_query($con, "SELECT * FROM drugs");
		
		if(isset($_POST['Search'])){
		if($_POST['searchfields']!=""){
		$result = mysqli_query($con,"SELECT * FROM `drugs` where drug_name='$_POST[searchfields]' or quantity='$_POST[searchfields]' or price='$_POST[searchfields]' or date='$_POST[searchfields]'");
				}else{
					 $result = mysqli_query($con, "SELECT * FROM drugs");
					}
		}
echo "<table border='0' width='70%' align='center' class='tbls' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >;

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
<th >Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Date</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr bgcolor='#FFFFFF'>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['drug_name'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['quantity'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['price'] . "</td>";
   echo "<td  bordercolor='#FFFFFF'>" . $row['date'] . "</td>";
   echo "</tr>";
  }
echo "</table>";
		

?>
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
                <li><a href="join_us.php">Lets chatt</a></li>
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
		if(isset($_POST['apply'])){
			include "connect.php";
			$name=$_POST['name'];
			$surname=$_POST['surname'];
			$password= md5($_POST['password']);
			if(($_FILES["applicationform"]["type"]=="image/jpeg")
	 || ($_FILES["applicationform"]["type"]=="image/gif") 
	 || ($_FILES["applicationform"]["type"] == "image/pjpeg")
	  || ($_FILES["applicationform"]["type"] == "image/png")
	  && ($_FILES["applicationform"]["size"] < "1000000") ){
		
			$image = $_FILES['applicationform']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
	
	$query="
	insert into user(name,surname,sex,date_of_birth,home_address,
	home_direct,mobile_number,email,image,access_level,username,password)
		values('$_POST[name]','$_POST[surname]','$_POST[sex]','$_POST[dob]','$_POST[homeaddress]','$_POST[landline]',
	'$_POST[mobile]','$_POST[emailaddress]','$imgContent','patient','$_POST[username]','$password')			
		";
		
		
		if(mysqli_query($con,$query)){
			//echo"<script> alert('Thank you ');location='login.php';</script";
			echo"<script> alert('Thank you $name $surname for joining us ');location='login.php';</script>";
			}else {
				echo "failed".mysqli_error($query);
				}
	  }else{
		  echo"<script> alert('invalid file');location='join_us.php';</script>";
		  
		  }
				
				
			}
			
			
      }catch(Eception $er){
		echo $er;
			}
?>
</body>
</html>