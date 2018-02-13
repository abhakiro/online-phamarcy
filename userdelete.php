<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<?php
include "connect.php";
$id=$_GET['delete_id'];

{
 $sql_query="DELETE FROM user WHERE id='$id'";
 mysqli_query($con, $sql_query);
 header("Location: userupdate.php");
}

?>
</body>
</html>