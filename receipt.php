'<?php
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
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/registration.css" type="text/css">
<link rel="stylesheet" href="css/receipt.css" type="text/css">
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
        <p class="basket"><a href="checkout.php">Drus in your bascket <label class="lbasket">(<?php echo $results; ?>)</label> </a></p>
        <p> </p>
	</div> <!-- end of middle -->
    
     <div id="tooplate_main">
        <div class="post_box">
           </header>

<table width="80%" align="center" bgcolor="#FFF" border="0"  cellspacing="0" cellpadding="0" class="tables">
  <tbody>
  <?php
include "connect.php";
$query= mysqli_query($con, "SELECT  max(id) from cart ORDER BY id DESC");
while($row=mysqli_fetch_array($query)){
	//$date=$row['id'];
	
	}
$ddate= date("Y/m/d");
?>
   <tr class="tr">
    <td style="color: rgb(255, 255, 255);" bgcolor="#0099ff" colspan="2" class="tr"><STRONG>Receipt for <?php echo $_SESSION['username']; ?> as at <?php echo $ddate; ?> </STRONG></td>
     </tr>
   <tr class="tr" bgcolor="#FFFFFF">
    <td bgcolor="#ffffff"  class="tr">
    <p class="location">Contact us on</p>
    <p class="p1">RealTimeTech Pvt Ltd</p>
    <p class="p1">44 samora matchel avenue</p>
    <p class="p1">11th floor megawatt house</p>
    
    </td>
    <td bgcolor="#ffffff" class="tr">
    <p class="location">(+263)-772 987 234</p>
    <p class="p1">nelly@gmail.com</p>
    <p class="p1">or savanna facebook page</p>
     </td>
   </tr>
   <tr>
    <td colspan="2">
    <p class="mybasket"> Purchase details </p>
    </td>
   </tr>
   <tr>
    <td bgcolor="#ffffff"  class="tr">
      <?php  try{
	 
	 $results = mysqli_query($con, "SELECT * FROM cart where checkout='checked' and username = '$_SESSION[username]' and id & 1");
	 echo "<table  border='0' width=100%' align='center' cellspacing='1' cellpadding'2' bgcolor='' cols='0' class='tbl'>

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
</tr>";
 
while($row = mysqli_fetch_array($results)){
	 echo "<tr bgcolor='#FFFFFF'>";
	  echo "<td  bordercolor='#FFFFFF'>"?><label class="names">Drug purchased: </label> <?php echo $row['drug_name'] . "</td>";
	  echo "</tr>";
	   echo "<tr bgcolor='#FFFFFF'>";
	   echo "<td  bordercolor='#FFFFFF' id='price'>"?><label class="pice">Price: US$ </label> <?php echo $row['price'] . "</td>"; 
	   echo "</tr>";
  
	$quantity=$row['quantity'];
	$price=$row['price'];
	$total=$quantity  * $price;
	 echo "<tr bgcolor='#FFFFFF'>";
	   echo "<td  bordercolor='#FFFFFF' >"?><label class="quantity">Quantity: </label> <?php echo $row['quantity'] . "</td>"; 
	   echo "</tr>";
	   echo "<tr bgcolor='#FFFFFF'>";
	 echo "<td  bordercolor='#FFFFFF' id='total'>"?><label class="total">Total : US$ <?php echo $total?> </label> <?php "</td>";
	   echo "</tr>";

	  }
echo "</table>";
	 
 }catch(Exception $ex){
							echo $ex;
							}
	 
	 
?>
    </td>
    <td bgcolor="#ffffff"  class="tr">
     <?php  try{
	 
	 $results = mysqli_query($con, "SELECT * FROM cart where checkout='checked' and username = '$_SESSION[username]' and MOD(id,2)=0");
	 echo "<table  border='0' width=100%' align='center' cellspacing='1' cellpadding'2' bgcolor='' cols='0' class='tbl'>

<tr style='color:rgb(255, 255, 255);' bgcolor='#000033'  bordercolor='#990000'>
</tr>";
 
while($row = mysqli_fetch_array($results)){
	 echo "<tr bgcolor='#FFFFFF'>";
	  echo "<td  bordercolor='#FFFFFF'>"?><label class="names">Drug purchased: </label> <?php echo $row['drug_name'] . "</td>";
	  echo "</tr>";
	   echo "<tr bgcolor='#FFFFFF'>";
	   echo "<td  bordercolor='#FFFFFF' id='price'>"?><label class="pice">Price: US$ </label> <?php echo $row['price'] . "</td>"; 
	   echo "</tr>";
  
	$quantity=$row['quantity'];
	$price=$row['price'];
	$ttal=$quantity  * $price;
	 echo "<tr bgcolor='#FFFFFF'>";
	   echo "<td  bordercolor='#FFFFFF' >"?><label class="quantity">Quantity: </label> <?php echo $row['quantity'] . "</td>"; 
	   echo "</tr>";
	   echo "<tr bgcolor='#FFFFFF'>";
	 echo "<td  bordercolor='#FFFFFF' id='total'>"?><label class="total">Total : US$  <?php echo $ttal ?> </label> <?php "</td>";
	   echo "</tr>";

	  }
echo "</table>";
	 
 }catch(Exception $ex){
							echo $ex;
							}
	 
	 
?>
<?php
include "connect.php";
$query= mysqli_query($con, "select * from user where username ='$_SESSION[username]'");
while($row=mysqli_fetch_array($query)){
	$fname=$row['name'];
	$sname=$row['surname'];
	$address=$row['home_address'];
	$phone=$row['mobile_number'];
	}
$tomorrow = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
$deliverydate=date("Y/m/d", $tomorrow);
$querry= mysqli_query($con, "select SUM(total) as totals from cart where username ='$_SESSION[username]' and checkout='checked'");
while($row=mysqli_fetch_array($querry)){
	$totalpayment=$row['totals'];
	}
?>
    </td>
    
   </tr>
   <td colspan="2">
    <p class="mybasket"> Delivery details details </p>
    </td>
    <tr>
     <td  bgcolor='#FFFFFF' colspan="2>
      <label class="delivery">Delivery is to: <?php echo $fname." ". $sname." ".$phone; ?></label>
     </td>
      </tr>
      <tr>
     <td  bgcolor='#FFFFFF' colspan="2>
      <label class="delivery">Delivery venue: <?php echo $address;  ?></label>
     </td>
      </tr>
      <tr>
     <td  bgcolor='#FFFFFF' colspan="2">
      <label class="delivery">Delivery date: <?php echo $deliverydate; ?></label>
     </td>
      </tr>
   <tr class="tr">
    <td style="color: rgb(255, 255, 255);" bgcolor="#0099ff" colspan="2" class="tr"><STRONG><label class="total">Total Payment: US$<?php echo$totalpayment ?> </label> Thank you  Tinotenda  Siyabonga </STRONG></td>
     </tr>
     <tr>
      <td bgcolor='#FFFFFF' colspan="2">
      
       </td>
       </tr>
  </tbody>
  </table>

 <button type="submit" class="save" name="print" onclick="window.print()">print</button>
 
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