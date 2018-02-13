<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RealTimeTech phamaceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png" class="icon">
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/main.css" type="text/css">

<link rel="stylesheet" type="text/css" href="css/login.css">
<script type="text/javascript" src="scripts/jquery.js">  </script>

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
           <div class="forml">
   <form action="login.php" method="post" class="fm" name="form2">
   <fieldset class="fied1">
   <h1>LOG IN</h1>
    <p>
    <label for="username">username</label>
    <input type="text" name="username" required autofocus="" id="username" data-icon="u">
    </p>
    <p>
    <label for="password">password</label>
    <input type="password" name="password" required="required" id="password" data-icon="p">
    </p>
    <p><label class="forget"><a href="">Forgot password?</a></label></p>
   </fieldset>
   <fieldset class="field2">
    <p class="keeplogin">
    <label for="keep">Keep me logged</label>
    <input type="checkbox" name="logged" id="keep" value="keep">
    
    <button type="submit" name="log" id="btnlogin">Login</button>
    
    </p>
   </fieldset>
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
            
            Copyright © 2018 <a href="aboutdeveloper.php">RealTimeTech Technologies</a>
        </div>                 
    
        <div class="cleaner"></div>
    
    </div> <!-- end of tooplate_footer -->
     <div class="cleaner"></div>
</div>
<?php
include "connect.php";
 	
try{

	if(isset($_POST['log'])){
		
		function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
		
		$username = $_POST['username'];
	    $password = md5($_POST['password']);

	$result=mysqli_query($con,"SELECT * FROM user WHERE username='$username' AND password='$password'");
	echo $password;
	while($row = mysqli_fetch_array($result)){
	
		if($result) {
		if(mysqli_num_rows($result) > 0) {
			
			$_SESSION['username'] = $row['username'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['surname'] = $row['surname'];
			session_write_close();
			
					if($row['access_level']=='admin'){
						echo"<script>location='adminhome.php';</script>";
					
					exit();
					}
					else if($row['access_level']=='patient'){
						echo"<script>location='userhome.php';</script>";
						//header("location: join_us.php");
						exit();
						}
						else if($row['access_level']=='doctor'){
						echo"<script>location='doctorhome.php';</script>";
						//header("location: join_us.php");
						exit();
						}
					
					else{
						echo"<script> alert('login failed');location='login.php';</script>";
			             exit();
						}
		
				}else {
			echo"<script> alert('login fails');location='login.php';</script>";
			exit();
		}
	}else {
		die("Query failed");
	}
	}
	}
}catch(Exception $e){
	echo $e;
	}


  ?>
</body>
</html>