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
	'$_POST[mobile]','$_POST[emailaddress]','$imgContent','$_POST[access_level]','$_POST[username]','$password')			
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