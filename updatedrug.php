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

<body id="sub">
<?php
try{
include "connect.php";
$drug_id = mysqli_real_escape_string($con, $_GET['id']);

 $result = mysqli_query($con, "SELECT * FROM drugs where id='$drug_id'");

while($row = mysqli_fetch_array($result))
  {
	  $id=$row['id'];
 $name=  $row['drug_name'] ;
 $quantity=$row['quantity'] ;
 $date=  $row['date'] ;
 $discription= $row['discription'] ;
  
  }

}catch(Exception $e){
	echo $e;
	}
?>
    
<header class="formheading">
 <h1> ADD DRUG FORM</h1>
 </header>

  <form name="registration" action="updatedrug.php" class="form1" method="post" enctype="multipart/form-data">
  
    <p><label for="name">Drug name </label>    
    <input type="text" name="name" size="45" id="name" required="" pattern="[a-zA-Z\D]+" class="required input_field" value="<?php echo $name; ?>">
    <label class="name"> *required</label> 
    <label class="dname"><img src="images/tick.jpg" width="30" height="25"></label> 
    
  </p>
  <p><label for="sname">Quantity </label> 
    <input type="number" name="quantity" size="45" id="sname" required="" class="required input_field"  value="<?php echo $quantity; ?>">
    <label class="dsname"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="sname"> *required</label> 
  </p>
  <p><label for="dob">Date</label>   
    <input type="date" name="date" size="45" id="dob" required class="required input_field"  value="<?php echo $date; ?>"> 
    <label class="ddob"><img src="images/tick.jpg" width="30" height="25"></label>
    <label class="dob"> * required</label> 
  </p>
  
  <p><label for="email">Discription </label> 
   <input type="text" name="discription" size="45" id="email" class="required input_field"  value="<?php echo $discription; ?>" >
   <label class="demail"><img src="images/tick.jpg" width="30" height="25"></label> 
   <label class="email">  *required</label> 
  </p>
    
   <p><label for="apform">Upload your image </label>  
    <input type="file" name="image" size="45" id="apform" required="required" class="required input_field" />
  </p>
 <p><input type="hidden" name="id" value="<?php echo $id; ?>"></p>
 <fieldset class="field3">
 <button type="submit" name="apply" id="apply"  class="send">SUBMIT</button>
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
	update drugs set drug_name ='$_POST[name]',quantity ='$_POST[quantity]',date ='$_POST[date]',discription ='$_POST[discription]',image='$imgContent' where id='$_POST[id]'
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