<?php
if(!isset($_SESSION)){
session_start();
}
if($_SESSION['username']==NULL){
	header("location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/mail.css">
<link rel="stylesheet" type="text/css" href="css/admin_style.css">
<script type="text/javascript" src="jquery.js">  </script>
<script type="text/javascript" src="myjquery.js">  </script>
<title>RealTimeTech Phamarceauticals</title>
<link rel="shortcut icon" href="images/onebit_15.png">

</head>

<body>
 <div id="slider">
    <div id="wrapper">
    	
        <div id="sidebar">
        
           		
            <div id="menu">
                <ul class="navigation">
                    <li><a href="#inbox" class="menu_01"><img src="images/maibox.jpg" width="70" height="40">Inbox</a></li>
                    <li><a href="#unread" class="menu_02"><img src="images/images.png" width="70" height="40">Unread</a></li>
                    <li><a href="#read" class="menu_03"><img src="images/images2.jpg" width="70" height="40">Read</a></li>
                    <li><a href="#sent" class="menu_04"><img src="images/images-4.jpg" width="70" height="40">Sent</a></li>
                    <li><a href="deleteall.php" class="menu_06" onclick="return confirm('sure to delete all your inbox?'); "><img src="images/images-2.jpg"                      width="30%">Delete emails</a></li>
                    <li><a href="compose.php" class="menu_07">Compose</a></li>
                   
                            
                </ul>
            </div>
		</div> <!-- end of sidebar -->
    
        <div id="content">
            <div class="scroll">
                <div class="scrollContainer">
                
                    <div class="panel" id="inbox">
                    	<div class="content_section">
                        <?php
						try{
	include "connect.php";
	$usernames=$_SESSION['username'];
	 $inbox= mysqli_query($con, "SELECT id, COUNT(subject) FROM mails where receiver='$_SESSION[username]'");
	  while($row = mysqli_fetch_array($inbox)){
        $results= $row['COUNT(subject)'];
	  }
	  
	  $read= mysqli_query($con, "SELECT id, COUNT(subject) FROM mails where receiver='$_SESSION[username]' and status='read'");
	  while($row = mysqli_fetch_array($read)){
        $resultread= $row['COUNT(subject)'];
	  }
	  
	   $unread= mysqli_query($con, "SELECT id, COUNT(subject) FROM mails where receiver='$_SESSION[username]' and status='unread'");
	  while($row = mysqli_fetch_array($unread)){
        $resultunread= $row['COUNT(subject)'];
	  }
	  
	 $sent= mysqli_query($con, "SELECT id, COUNT(subject) FROM mails where sender='$_SESSION[username]'");
	  while($row = mysqli_fetch_array($sent)){
        $resultsent= $row['COUNT(subject)'];
	  }
	  
	  
	}catch(Exception $error){
		echo $error;
		}
						?>
                               
                           <p> <h1><label class="lbl">Inbox </label>
                            <label class="num">(<?php  echo $results; ?>)</label></h1> 
                            </p>   
                             <?php
							 require "inbox.php";
							?>
                         </div>
                         
                    </div> <!-- end of home -->
                    
                    <div class="panel" id="unread">
                    	<div class="content_section">
                           <p> <h1><label class="lbl">Unread mails</label>
                             <label class="num">(<?php  echo $resultunread; ?>)</label>
                            </h1></p>
                            <div id="contact_form">
                                <?php
							    require "unread.php";
							   ?>
                            </div>
                            
                           	</div>
                        
                    </div>
                    
                    <div class="panel" id="read">
                     <div class="content_section">
                       <p> <h1><label class="lbl">Read mails</label>
                         <label class="num">(<?php  echo $resultread; ?>)</label>
                        </h1></p>
                          <?php
						 require "read.php";
						?>
                        </div>
                       </div>
                        
                               
                    <div class="panel" id="sent">
                    <div class="content_section">
                       <p> <h1><label class="lbl">Sent mails</label>
                         <label class="num">(<?php  echo $resultsent; ?>)</label>
                        </h1></p>
                           <?php
						 require "send.php";
						?>
                    </div>
                    </div>
                
                    
                   
                  <div class="panel" id="delete">
                       <div class="content_section">
                       <h1>Deleted mails<label class="lbl">(200)</label></h1>
                        <?php
						 require "deleted.php";
						?>
                    </div>
                                                     
                  </div>  
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




</body>
</html>