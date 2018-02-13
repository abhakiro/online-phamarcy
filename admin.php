<?php
/*session_start();
if($_SESSION['username']==NULL){
	header("location: loginMenu.php");
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>RealTimeTech Technologies</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/coda-slider.css">
<link rel="stylesheet" type="text/css" href="css/admin_style.css">

<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/registration.css" type="text/css">
<script type="text/javascript" src="jquery.js">  </script>
<script type="text/javascript" src="myjquery.js">  </script>
<script type="text/javascript" src="admin.js">  </script>
<script type="text/javascript" src="jquery.easing.1.3.js">  </script>
<script type="text/javascript" src="jquery.localscroll-1.2.5.js">  </script>
<script type="text/javascript" src="jquery.scrollTo-1.3.3.js">  </script>
<script type="text/javascript" src="jquery.serialScroll-1.2.1.js">  </script>
<script type="text/javascript" src="jquery-1.2.6.js">  </script>
<script type="text/javascript" src="../mail_filter/jquery.js"></script>


</head>

<body>
 <div id="slider">
    <div id="wrapper">
    	
        <div id="sidebar">
         
			
            <div id="menu">
                <ul class="navigation">
                    <li><a href="#newuser" class="menu_02">Add new user</a></li>
                    <li><a href="#update" class="menu_03">Update user</a></li>
                    <li><a href="#newproperty" class="menu_04">New poperty</a></li>
                    <li><a href="#updateproperty" class="menu_07">Update property</a></li>
                    <li><a href="mailbox.php" class="menu_07">Mail box</a></li>
                </ul>
            </div>
		</div> <!-- end of sidebar -->
    
        <div id="content">
            <div class="scroll">
                <div class="scrollContainer">
                
                    
                    <div class="panel" id="newuser">
                    	<div class="content_section">
                           
                            <div id="contact_form">
                                

  <form name="registration" action="newuser.php" class="form1" method="post" enctype="multipart/form-data">
  <fieldset class="field1">
  <p class="headings">General details</p>
  <p><label for="name">First name </label>    
    <input type="text" name="name" size="45" id="name" required="" pattern="[a-zA-Z\D]+" class="required input_field">
    <label class="name"> *required</label> 
    <label class="dname"><img src="images/tick.jpg" width="30" height="25"></label> 
    
  </p>
  <p><label for="sname">Last name </label> 
    <input type="text" name="surname" size="45" id="sname" required="" pattern="[a-zA-Z\D]+" class="required input_field">
    <label class="dsname"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="sname"> *required</label> 
  </p>
  <p>Sex  <label for="sexx" id="smale">Male</label>
    <input type="radio" name="sex"  required value="Male" id="sexx">
    <label for="sexxx" id="sfemale">Female</label>
    <input type="radio" name="sex"  required value="Female"  id="sexxx" />
  </p>
  <p><label for="dob">Date of Birth </label>   
    <input type="date" name="dob" size="45" id="dob" required placeholder="01-01-2017" pattern="[0-9{2}-0-9{2}-0-9{4}]+" class="required input_field"> 
    <label class="ddob"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="dob"> * required</label> 
  </p>
  
  
  <p><label for="home">Home Address </label>    
    <textarea rows="2" columns="2" name="homeaddress" id="homes" required ="" pattern="[a-zA-Z0-9]+" class="required input_field" required="">


    </textarea> <label class="dhome"><img src="images/tick.jpg" width="30" height="25"></label> 
    <label class="home"> *required</label>
  </p>
  <p class="headings">Authentication details</p>
  <p><label for="username">Username </label> 
   <input type="text" name="username" size="45" id="username" required="" min="6" max="12" pattern= "[a-zA-Z0-9]+" class="required input_field">
   <label class="dusername"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="username">  *required </label>
  </p>
  <p><label for="password">Password </label> 
    <input type="password" name="password" size="45" id="password" required="" min="6" max="12" class="required input_field">

    <label class="dpassword"><img src="images/tick.jpg" width="30" height="25"></label> 
    <label class="password"> *is required</label> 
  </p>


  <p><label for="cpassword">Cornfirm password </label>
   <input type="password" name="cpassword" size="45" id="cpassword" required="" min="6" max="12" pattern=   "[a-zA-Z0-9]+" class="required input_field"> 
   <label class="dcpassword"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="cpassword"> *Cornfirm password</label> 
  </p>
 </fieldset>
 <fieldset class="field2">
  <p class="headings">Contact details</p>
  <p><label for="landline">landline</label>  
    <input type="text" name="landline" size="45" id="landline" pattern="[0-9\W]+" class="required input_field" > 
    <label class="dlandline"><img src="images/tick.jpg" width="30" height="25"></label> 
    <label class="landline"> *required </label>
  </p>
  <p><label for="mobile">Mobile number </label> 
   <input type="teL" name="mobile" size="45" id="mobile" class="required input_field" required pattern="^\+?\d{12}" placeholder="+263778908908">
   <label class="dmobile"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="mobile"> *required </label>
  </p>
  <p><label for="email">Email Address </label> 
   <input type="email" name="emailaddress" size="45" id="email" class="required input_field" >
   <label class="demail"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="email">  *required</label> 
  </p>
  <p><label for="level">Access level </label> 
  <select name="access_level" class="required input_field" id="level">
   <option value="admin">Admin</option>
   <option value="doctor">Doctor</option>
  </select>
  </p>
  <p><label for="apform">Upload your image </label>  
    <input type="file" name="applicationform" size="45" id="apform" required="required" class="required input_field" />
  </p>
 
  
   </fieldset>
 <fieldset class="field9">
  <button type="submit" name="apply" id="apply"  class="send">SUBMIT</button>
  </fieldset>
</form>

                            </div>
                            
                            
						</div>
                        
                    </div>
                    
                    <div class="panel" id="update">
                        <h1>UPDATE USER</h1>
                        <?php
try{
include "connect.php";

 $result = mysqli_query($con, "SELECT * FROM user");
 
echo "<table border='0' width='70%' align='center' class='tb' cellspacing='0' cellpadding'2' bgcolor='#CCCCCC' cols='0'  >

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
                        <div class="cleaner_h20"></div>
                        
                    </div>
                
                    <div class="panel" id="newproperty">
                    <header class="formheading">
 <h1> ADD PROPERTY FORM</h1>
 </header>
                    <form name="registration" action="newproperty.php" class="form1" method="post" enctype="multipart/form-data">
  
    <p><label for="name">Property name </label>    
    <input type="text" name="name" size="45" id="name" required="" pattern="[a-zA-Z\D]+" class="required input_field">
    <label class="name"> *required</label> 
    <label class="dname"><img src="images/tick.jpg" width="30" height="25"></label> 
    
  </p>
  <p><label for="sname">Quantity </label> 
    <input type="number" name="quantity" size="45" id="sname" required="" class="required input_field">
    <label class="dsname"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="sname"> *required</label> 
  </p>
  <p><label for="dob">Date</label>   
    <input type="date" name="date" size="45" id="dob" required class="required input_field"> 
    <label class="ddob"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="dob"> * required</label> 
  </p>
  
  <p><label for="email">Discription </label> 
   <input type="text" name="discription" size="45" id="email" class="required input_field" >
   <label class="demail"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="email">  *required</label> 
  </p>
    
   <p><label for="apform">Upload your image </label>  
    <input type="file" name="image" size="45" id="apform" required="required" class="required input_field" />
  </p>

 
 <button type="submit" name="apply" id="apply"  class="send">SUBMIT</button>
  
</form>
                    </div>
                
                    <div class="panel" id="updateproperty">
                       <?php
try{
include "connect.php";

 $result = mysqli_query($con, "SELECT * FROM property");
 
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
  echo "<td  bordercolor='#FFFFFF'>" . $row['property_name'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['quantity'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['date'] . "</td>";
  echo "<td  bordercolor='#FFFFFF'>" . $row['discription'] . "</td>";
  echo  ("<td><a href=\"updatedproperty.php?id=$row[id]\"> <img src='images/Update.gif' width='70%'></a></td>");
  echo "<td>"?>   <a href="propertydelete.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " ><img src='images/delete.PNG' width='70%'></a> <?php "</td>";        
  echo "</tr>";
  }
echo "</table>";
}catch(Exception $e){
	echo $e;
	}
?>
                                                                
                        
                        
                        <div class="col_380 float_r">
                        
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end of scroll -->
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of content -->
    <div class="cleaner"></div>
</div>

<?php 
 /******************************REGISTER NEW USER**************************************************************************/	
		try{
		if(isset($_POST['submituser'])){
			include "Connections.php";
		$password=md5($_POST['password']);
		
	$query="
	insert into user(name,surname,level,user_id,password)
values('$_POST[name]','$_POST[surname]','$_POST[access_level]','$_POST[userid]','$password')			
		";
		
			if(mysqli_query($con,$query)){?>
			<script language="javascript">
			 alert("new user added");
			 location="admin.php";
			</script>
			<?php
			}else {
				echo "failed".mysqli_error($query);
				}
				
			}
			
			
      }catch(Eception $er){
		echo $er;
			}
			
									

?>


</body>
</html>