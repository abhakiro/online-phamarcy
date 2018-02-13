<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RealTimeTech</title>
<link rel="shortcut icon" href="images/onebit_15.png">
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
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
<div id="tooplate_wrapper_sub">
	<div id="tooplate_header">
    	<div id="site_title"><h1><a href="#">RealTimeTech</a></h1></div>
        <div id="tooplate_menu">
            <ul>
                <li><a href="index.php" class="current">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="popular_clinics.php" class="popular">Popular Clinics</a></li>
                <li><a href="join_us.php">Join Us</a></li>
                <li><a href="login.php">Login</a></li>
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
           RealTimeTech membership
        </div>
        <p>In order to to chatt with us, order online and receive your delivery at home, you need to fill the form below. </p>
	</div> <!-- end of middle -->
    
     <div id="tooplate_main">
        <div class="post_box">
           </header>
<header class="formheading">
 <h1> REGISTRATION FORM</h1>
 </header>

  <form name="registration" action="join_us.php" class="form1" method="post" enctype="multipart/form-data">
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
  <p><label for="apform">Upload your image </label>  
    <input type="file" name="applicationform" size="45" id="apform" required="required" class="required input_field" />
  </p>
 </fieldset>
 <fieldset class="field3">
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
   
  <fieldset><button type="submit" name="apply" id="apply"  class="send">SUBMIT</button></fieldset>
  </fieldset>
</form>

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