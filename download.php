<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
 include "connect.php"; 
 $id=mysqli_real_escape_string($con, $_GET['id']);
  $result = mysqli_query($con, "SELECT * FROM mails where id='$id'");
while($row = mysqli_fetch_array($result))
  { 
	 $file=$row['attachments'];
	 $name=$row['filename'];
    $size=$row['filesize'];
    $type=$row['fileextension'];
  }
header('Content-Description: File Transfer');
header('Content-type: application/octetstream'.$type);
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="'.$name.'"');
header('Content-Transfer-Encoding: Binary'); 
header('Connection: Keep-Alive');
header('Expires: 0');
//header('Pragma: no-cache');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: '.$size);
set_time_limit(0);
echo $file;
exit(); 
?>
</body>
</html>