<?php
if(!isset($_SESSION)){
session_start();
}
if($_SESSION['username'] == NULL){
	//header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/newuser.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/main.css" type="text/css">
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
<?php
try{
include "connect.php";
$user_id = mysqli_real_escape_string($con, $_GET['id']);

 $result = mysqli_query($con, "SELECT * FROM user where id='$user_id'");

while($row = mysqli_fetch_array($result))
  {
	  $id=$row['id'];
 $name=  $row['name'] ;
 $surname=$row['surname'] ;
 $sex=  $row['sex'] ;
 $dob= $row['date_of_birth'] ;
 $home_address=$row['home_address'];
 $home_direct=$row['home_direct'];
 $mobile=$row['mobile_number'];
 $email=$row['email'];
 $image=$row['image'];
 $level=$row['access_level'];
 $username=$row['username'];
 $password=  $row['password'];
  
  }

}catch(Exception $e){
	echo $e;
	}
?>
    
<header class="formheading">
 <h1> REGISTRATION FORM</h1>
 </header>

  <form name="registration" action="updateuser.php" class="form1" method="post" enctype="multipart/form-data">
  <fieldset class="field1">
  <p class="headings">General details</p>
  <p><label for="name">First name </label>    
    <input type="text" name="name" size="45" id="name" required="" pattern="[a-zA-Z\D]+" class="required input_field" value="<?php echo $name;?>">
    <label class="name"> *required</label> 
    <label class="dname"><img src="images/tick.jpg" width="30" height="25"></label> 
    
  </p>
  <p><label for="sname">Last name </label> 
    <input type="text" name="surname" size="45" id="sname" required="" pattern="[a-zA-Z\D]+" class="required input_field" value="<?php echo $surname;?>">
    <label class="dsname"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="sname"> *required</label> 
  </p>
  <p>Sex  <label for="sexx" id="smale">Male</label>
    <input type="radio" name="sex"  required value="Male" id="sexx" >
    <label for="sexxx" id="sfemale">Female</label>
    <input type="radio" name="sex"  required value="Female"  id="sexxx" />
  </p>
  <p><label for="dob">Date of Birth </label>   
    <input type="date" name="dob" size="45" id="dob" required placeholder="01-01-2017" pattern="[0-9{2}-0-9{2}-0-9{4}]+" class="required input_field" value="<?php echo $dob;?>"> 
    <label class="ddob"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="dob"> * required</label> 
  </p>
  
  
  <p><label for="home">Home Address </label>    
    <textarea rows="2" columns="2" name="homeaddress" id="homes" required ="" pattern="[a-zA-Z0-9]+" class="required input_field" required="" value="<?php echo $home_address;?> ">
    </textarea> <label class="dhome"><img src="images/tick.jpg" width="30" height="25"></label> 
    <label class="home"> *required</label>
  </p>
 </fieldset>
 <fieldset class="field2">
  <p class="headings">Contact details</p>
  <p><label for="landline">landline</label>  
    <input type="text" name="landline" size="45" id="landline" pattern="[0-9\W]+" class="required input_field" value="<?php echo $home_direct;?>"> 
    <label class="dlandline"><img src="images/tick.jpg" width="30" height="25"></label> 
    <label class="landline"> *required </label>
  </p>
  <p><label for="mobile">Mobile number </label> 
   <input type="teL" name="mobile" size="45" id="mobile" class="required input_field" required pattern="^\+?\d{12}" placeholder="+263778908908" value="<?php echo $mobile;?>">
   <label class="dmobile"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="mobile"> *required </label>
  </p>
  <p><label for="email">Email Address </label> 
   <input type="email" name="emailaddress" size="45" id="email" class="required input_field" value="<?php echo $email;?>">
   <label class="demail"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="email">  *required</label> 
  </p>
  <p><label for="level">Access level </label> 
  <select name="access_level" class="required input_field" id="level" value="<?php echo $level; ?>">
   <option value="admin">Admin</option>
   <option value="doctor">Doctor</option>
   <option value="patient">Doctor</option>
  </select>
  </p>
  <p><label for="apform">Upload your image </label>  
    <input type="file" name="applicationform" size="45" id="apform" required="required" class="required input_field" />
  </p>
 </fieldset>
 <fieldset class="field3">
  <p class="headings">Authentication details</p>
  <p><label for="username">Username </label> 
   <input type="text" name="username" size="45" id="username" required="" min="6" max="12" pattern= "[a-zA-Z0-9]+" class="required input_field" value="<?php echo $username;?>">
   <label class="dusername"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="username">  *required </label>
  </p>
  <p><label for="password">Password </label> 
    <input type="password" name="password" size="45" id="password" required="" min="6" max="12" class="required input_field" value="<?php echo $password;?>">

    <label class="dpassword"><img src="images/tick.jpg" width="30" height="25"></label> 
    <label class="password"> *is required</label> 
  </p>
  <p><label for="cpassword">Cornfirm password </label>
   <input type="password" name="cpassword" size="45" id="cpassword" required="" min="6" max="12" pattern=   "[a-zA-Z0-9]+" class="required input_field"> 
   <label class="dcpassword"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="cpassword"> *Cornfirm password</label> 
  </p>
   <p><input type="hidden" name="id" value="<?php echo $id;?>"></p>
  <fieldset><button type="submit" name="apply" id="apply"  class="send">SUBMIT</button></fieldset>
  </fieldset>
</form>

            <div class="cleaner"></div>
        </div>
        
        </div>
    </div> <!-- end of tooplate_main -->
</div> <!-- end of wrapper -->

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
	update user set name ='$_POST[name]',surname ='$_POST[surname]',sex ='$_POST[sex]',date_of_birth = '$_POST[dob]',home_address ='$_POST[homeaddress]',
	home_direct ='$_POST[landline]',mobile_number='$_POST[mobile]',email='$_POST[emailaddress]',image='$imgContent',access_level='$_POST[access_level]',username='$_POST[username]',password='$password' where id='$_POST[id]'";
		
		
		if(mysqli_query($con,$query)){
			//echo"<script> alert('Thank you ');location='login.php';</script";
			echo"<script> alert('Thank you $name $surname for updating your details');location='login.php';</script>";
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