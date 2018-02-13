<?php
if(!isset($_SESSION)){
session_start();
}
if($_SESSION['username'] == NULL){
	header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RealTimeTech phamarceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png">
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
			$quantity=$_POST['quantity'];
			$password= md5($_POST['password']);
			if(($_FILES["image"]["type"]=="image/jpeg")
	 || ($_FILES["image"]["type"]=="image/gif") 
	 || ($_FILES["image"]["type"] == "image/pjpeg")
	  || ($_FILES["image"]["type"] == "image/png")
	  && ($_FILES["image"]["size"] < "1000000") ){
		
			$image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
	
	$query="
	insert into drugs(drug_name,quantity,date,discription,image)
		values('$_POST[name]','$_POST[quantity]','$_POST[date]','$_POST[discription]','$imgContent')			
		";
		
		
		if(mysqli_query($con,$query)){
		echo"<script> alert('$quantity packets of $name have been added');location='admin.php#drugs';</script>";
			}else {
				echo "failed".mysqli_error($query);
				}
	  }else{
		  echo"<script> alert('invalid file');location='admin.php#drugs;</script>";
		  
		  }
				
				
			}
			
			
      }catch(Eception $er){
		echo $er;
			}
?>
</body>
</html>