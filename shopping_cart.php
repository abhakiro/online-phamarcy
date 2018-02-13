'<?php
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
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/registration.css" type="text/css">
<link rel="stylesheet" href="css/shopping_cart.css" type="text/css">
<script type="text/javascript" src="scripts/jquery.js">  </script>
<script type="text/javascript" src="scripts/myjquery.js">  </script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script language="javascript">
 /*$(function(){
	 $("form2").hide();
	 });
function reply(){
	$(".form2").show();
	}
$(document).ready(function(){
$("buy").click(reply);
	 });*/
</script>

</head>

<body id="sub">
<div id="tooplate_wrapper_sub">
	<div id="tooplate_header">
    	<div id="site_title"><h1><a href="#">RealTimeTech</a></h1></div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="adminhome.php" class="current">Home</a></li>
                <li><a href="shopping_cart.php" class="popular">Shoping cart</a></li>
                <li><a href="chat.php">Lets chatt</a></li>
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
        <div id="mid_title">
           Drugs on offer
        </div>
         <?php
						try{
	include "connect.php";
	$usernames=$_SESSION['username'];
	 $inbox= mysqli_query($con, "SELECT id, COUNT(drug_name) FROM cart where username='$_SESSION[username]' and checkout='unchecked'");
	  while($row = mysqli_fetch_array($inbox)){
        $results= $row['COUNT(drug_name)'];
	  }
						}catch(Exception $ex){
							echo $ex;
							}
	  ?>
        <p class="basket"><a href="checkout.php">Drus in your bascket <label class="lbasket">(<?php echo $results; ?>)</label></a> </p>
        <p> </p>
	</div> <!-- end of middle -->
    
     <div id="tooplate_main">
        <div class="post_box">
           </header>
<header class="formheading">
 <h1> REALTIMETECH SHOPPING CART</h1>
 </header>

<form action="shopping_cart.php" method="post" class="form2">
<p>My shopping basket</p>
 <?php  try{
	 
	/* $results = mysqli_query($con, "SELECT * FROM cart where checkout='unchecked' and username = '$_SESSION[username]'");
	 echo "<table  border='0' width=100%' align='center' cellspacing='1' cellpadding'2' bgcolor='' cols='0' class='tbl'>

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
<th >Drug name</th>
<th>Price</th>
<th>Quantity</th>
<th>Total(US$)</th>
<th>Drop</th>
<th>Checkout</th>
</tr>";
 
while($row = mysqli_fetch_array($results)){
	 echo "<tr bgcolor='#FFFFFF'>";
	  echo "<td  bordercolor='#FFFFFF'>" . $row['drug_name'] . "</td>";
	   echo "<td  bordercolor='#FFFFFF'>" . $row['price'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'><input type='text' name='qnty' class='qnty' value='1'> </td>";
	$quantity=$row['quantity'];
	$price=$row['price'];
	$total=$quantity  * $price;
	 echo "<td  bordercolor='#FFFFFF'>" .$total. "</td>";
	  echo "<td>"?>   <a href="deletecart.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><img src="images/dropcart.jpg"' width='30%'></a> <?php "</td>";
	   echo "<td>"?>   <a href="checkout.php?id=<?php echo $row['id']; ?>" ><label class="checkout"></label><img src="images/download.jpg"' width='30%'></a> <?php "</td>";  
	
	
	 echo "</tr>";
  }
echo "</table>";
	 
	 */
	 
	 
if(isset($_POST['buy'])){
	  include "connect.php";
	$id=$_POST['id'];
	$date= Date("Y/m/d h:i");
	echo $id;
	 $myqry = mysqli_query($con, "SELECT * FROM drugs where id='$id'");
	 while($row = mysqli_fetch_array($myqry)){
		$name=$row['drug_name'];
		$price=$row['price'];
		$quantity= 1;
		$total= $price * $quantity;
		 } 
	 
	$username=$_SESSION['username'];
	
	
	$qry= mysqli_query($con, "insert into cart(drug_name,quantity,price,username,date,status,checkout) values('$name','$quantity','$price','$_SESSION[username]','$date','unread','unchecked')");
	
		
	header("location:checkout.php");
	
 }
}catch(Exception $e){
	echo $e;
	}
	
?>
</form>
  <form name="registration" action="shopping_cart.php" class="form1" method="post" enctype="multipart/form-data">
  <table>
  <tr>
  <td>
  <?php
	  try{
include "connect.php";
//$username=$_SESSION['username'];
 $result = mysqli_query($con, "SELECT * FROM drugs where quantity>0 and id & 1");
 

while($row = mysqli_fetch_array($result))
  {
echo "<table  border='0' width='80%' align='center' cellspacing='1' cellpadding'2' bgcolor='' cols='0' class='tb' >"; 
echo "<tr bgcolor='#FFFFFF'>";
   echo "<td  bordercolor='#FFFFFF' colspan='2' class='drug'>" . $row['drug_name'] . "</td>";
     echo "</tr>";
  echo "<tr bgcolor='#FFFFFF'>";
  $imagename= base64_encode($row['image']);
   echo "<td  bordercolor='#FFFFFF' colspan='2'>"?> <img src="<?php echo "data:image/jpeg;base64,".$imagename.""; ?>" border="1" class="img" >.<?php "</td>";
   echo "</tr>";
    echo "<tr bgcolor='#FFFFFF'>";
   echo "<td  bordercolor='#FFFFFF' colspan='2' >" . $row['discription'] . "</td>";
    echo "</tr>";
    echo "<tr bgcolor='#FFFFFF'>";
   echo "<td  bordercolor='#FFFFFF' width='50%' class='prc'>"?><label class="price">Price: US$ </label> <?php echo $row['price']?> <label class="price">.00</label> <?php  "</td>";
   echo "<td  bordercolor='#FFFFFF' align='right'>"?><form action="shopping_cart.php" method="post"><input type="hidden" value="<?php echo $row['id']; ?>" name="id"/> <button type="submit" name="buy" class="buy" >Add to cart<img src="images/cart1.jpg" width="18%" class="cart"></button> </form> <?php "</td>";
     echo "</tr>";
   
 
   echo "</table>";
  }

}catch(Exception $e){
	echo $e;
	}
	
	?>
   </td>
   <td>
    <?php
	  try{
include "connect.php";
//$username=$_SESSION['username'];
 $result = mysqli_query($con, "SELECT * FROM drugs where quantity>0 and id & 2");
 

while($row = mysqli_fetch_array($result))
  {
echo "<table  border='0' width='80%' align='center' cellspacing='1' cellpadding'2' bgcolor='' cols='0' class='tb' >"; 
echo "<tr bgcolor='#FFFFFF'>";
   echo "<td  bordercolor='#FFFFFF' colspan='2' class='drug'>" . $row['drug_name'] . "</td>";
     echo "</tr>";
  echo "<tr bgcolor='#FFFFFF'>";
  $imagename= base64_encode($row['image']);
   echo "<td  bordercolor='#FFFFFF' colspan='2'>"?> <img src="<?php echo "data:image/jpeg;base64,".$imagename.""; ?>" border="1" class="img">.<?php "</td>";
   echo "</tr>";
    echo "<tr bgcolor='#FFFFFF'>";
   echo "<td  bordercolor='#FFFFFF' colspan='2' >" . $row['discription'] . "</td>";
    echo "</tr>";
    echo "<tr bgcolor='#FFFFFF'>";
   echo "<td  bordercolor='#FFFFFF' width='50%' class='prc'>"?><label class="price">Price: US$ </label> <?php echo $row['price']?> <label class="price">.00</label> <?php  "</td>";
   echo "<td  bordercolor='#FFFFFF' align='right'>"?><form action="shopping_cart.php" method="post"><input type="hidden" value="<?php echo $row['id']; ?>" name="id"/> <button type="submit" name="buy" class="buy" >Add to cart<img src="images/cart1.jpg" width="18%" class="cart"></button> </form> <?php "</td>";
     echo "</tr>";
   
 
   echo "</table>";
  }

}catch(Exception $e){
	echo $e;
	}
	
	?>
   </td>
   </tr>
   </table>
 
</form>



 
  </div>


            <div class="cleaner"></div>
        </div>
        
        </div>
    </div> <!-- end of tooplate_main -->
</div> <!-- end of wrapper -->

<div id="tooplate_footer_wrapper">
    <div id="tooplate_footer">
    
    	<div class="col_allw300">
        	<h4>Our Pages</h4>
            <ul class="footer_list">
            	<li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="popular_clinics.php">Popular clinics</a></li>
                <li><a href="join_us.php">Join us</a></li>
          
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
        ></div>                 
    
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