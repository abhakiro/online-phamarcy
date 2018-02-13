<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//try{
//	$database= new PDO("mysql:host=localhost;dbname=st_joseph","root","");
//	$database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//	$database->exec("SET NAMES 'utf8'");
//	}catch(Exception $e){
//		echo $e;
//		exit;	
//		}
//	echo "munhuwese connected";

$con = mysqli_connect("localhost","root","","pharmacy");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  
?>
</body>
</html>