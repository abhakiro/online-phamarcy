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
<title>REalTimeTech phamaceauticals</title>
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
 function total(){
	                          var quantity = document.getElementById('quantity').value;
							  var price = document.getElementById('price').value;
							  var total= parseInt(quantity)* parseInt(price)
							  if (!isNaN(total)) {
								 document.getElementById('total').value = total;
							  }
}
 function try(){
	                          document.getElementById('price').hide();
							  
							  
}
</script>

</head>

<body id="sub">
<div id="tooplate_wrapper_sub">
	<div id="tooplate_header">
    	<div id="site_title"><h1><a href="#">RealTimeTech</a></h1></div>
        <div id="tooplate_menu">
            <ul>
               <li><a href="doctorhome.php" class="current">Home</a></li>
                <li><a href="shopping_cart.php" class="popular">Shoping cart</a></li>
                <li><a href="chatt.php">Lets chatt</a></li>
                <li><a href="orders.php">Orders</a></li>
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
        
         <?php
						try{
	include "connect.php";
	$usernames=$_SESSION['username'];
	 $inbox= mysqli_query($con, "SELECT id, COUNT(drug_name) FROM cart where checkout='checked' and status='unread'");
	  while($row = mysqli_fetch_array($inbox)){
        $results= $row['COUNT(drug_name)'];
	  }
						}catch(Exception $ex){
							echo $ex;
							}
	  ?>
        <p class="basket"><a href="checkout.php">Pending orders <label class="lbasket">(<?php echo $results; ?>)</label> </a></p>
        <p> </p>
	</div> <!-- end of middle -->
    
     <div id="tooplate_main">
        <div class="post_box">
           </header>


<form action="orders.php" method="post" class="form3" name="form3">
 <?php  try{
	 
	 $results = mysqli_query($con, "SELECT * FROM cart where checkout='checked' and status='unread'");
	 echo "<table  border='0' width=100%' align='center' cellspacing='1' cellpadding'2' bgcolor='' cols='0' class='tbl'>

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
<th>Buyer</th>
<th >Drug name</th>
<th>Quantity</th>
<th>Stock level</th>
<th>Delete order</th>
</tr>";
 
while($row = mysqli_fetch_array($results)){
	 echo "<tr bgcolor='#FFFFFF' class='tr1'>";
	   
	  echo ("<td '#FFFFFF' id='price' class='continue' ><a href=\"individualorder.php?username=$row[username]\"> $row[username] </a> </td>");
	  echo "<td  bordercolor='#FFFFFF'>" . $row['drug_name'] . "</td>";
	  $dname= $row['drug_name'];
	   $quantity=$row['quantity'];
	  $select=mysqli_query($con, "select * from drugs where drug_name='$dname'");
while($rows=mysqli_fetch_array($select)){
	 $qnty= $rows['quantity'];
	 $checkqnty= $qnty - $quantity;
	}
	$quantity=$row['quantity'];
	$price=$row['price'];
	$total=$quantity  * $price;
	 echo "<td  bordercolor='#FFFFFF' id='total'>" . $row['quantity']. "</td>";
	  echo "<td  bordercolor='#FFFFFF' id='total'>" .$qnty. "</td>";
	  echo "<td>"?>   <a href="deletecart.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><img src="images/dropcart.jpg" width='30%'></a> <?php "</td>";
	     echo "</tr>";
	

	 echo "</tr>";
  }
echo "</table>";
	 
 }catch(Exception $ex){
							echo $ex;
							}
	 
	 
?>
 
 
 
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
            Copyright © 2018 <a href="aboutdeveloper.php">RealTimeTech Technologies</aCopyright © 2017 ><a href="#">RealTimeTech Pharmaceuticals</a>
        </div>                 
    
        <div class="cleaner"></div>
    
    </div> <!-- end of tooplate_footer -->
     <div class="cleaner"></div>
</div>
<?php


if(isset($_POST['checkouts'])){	
try{
include "connect.php";
$drugname =$_POST['drug'];
$quantity = $_POST['qname'];
$username = $_SESSION['username'];
$select=mysqli_query($con, "select * from drugs where drug_name='$_POST[drug]'");
while($rows=mysqli_fetch_array($select)){
	 $qnty= $rows['quantity'];
	 $checkqnty= $qnty - $quantity;
	
	}
if($checkqnty>=0){
	      $id = $_POST['ids'];
 $totals= $_POST['price'] * $quantity;

 $date= Date("Y/m/d h:i");
 $myquery =  "update cart set date ='$date', quantity ='$quantity', checkout='checked', total='$checkqnty' where id= '$id'";
 if(mysqli_query($con,$myquery)){
	 
	  $updatedrug= mysqli_query($con, "update drugs set quantity =$totals where drug_name='$_POST[drug]'");
	  
	  $querry=mysqli_query($con,"
insert into mails(date,sender,receiver,subject,message,status,attachments,filename,filesize,fileextension)
		values('$date','Savanna','$_SESSION[username]','$drugname','','unread','$fileContent','$filename','$filesize','$fileextension')			
		");
	  
	 echo"<script> alert('thank you $username for your order. Please check your mailbox for a receipt.');location='checkout.php';</script>";
	 }else{
		 echo"<script> alert('error in shoping');location='checkout.php';</script>";
		 }
	}else{
		 echo"<script> alert('Sory $username,our $drugname are running out of stock. Only $qnty are left');location='checkout.php';</script>";
		}


	
	}catch(Excdeption $e){
		echo $e;
	}
}
	?>
</body>
</html>