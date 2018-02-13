 // JavaScript Document
$(function() {  
 $(".name, .sname, .email, .home, .landline, .dob, .mobile, .username, .password, .cpassword, .national").hide();  
  $(".dname, .dsname, .dcpassword, .ddob, .demail, .dhome, .dlandline, .dmobile, .dnational, .dpassword, .dusername").hide();
 }); 
 
 function namehide(){
	 if($(this).val().length>1){
		 $(".dname").show();
		$(".name").hide(); 
		}else{
			$(".name").show(); 
			 $(".dname").hide();
			};
	 }
	 
 $(document).ready(function(){
$("#name").focus(namehide).keyup(namehide)	});

function surnamehide(){
	if($(this).val().length>1){
		 $(".dsname").show();
		$(".sname").hide(); 
		}else{
			$(".sname").show(); 
			 $(".dsname").hide();
			};
	}
	$(document).ready(function(){
$("#sname").focus(surnamehide).keyup(surnamehide) });

function birthhide(){
	if($(this).val().length>9){
		 $(".ddob").show();
		$(".dob").hide(); 
		}else{
			$(".dob").show(); 
			 $(".ddob").hide();
			};
	}
	$(document).ready(function(){
$("#dob").focus(birthhide).keyup(birthhide) });

function nationalhide(){
	if($(this).val().length>13){
		 $(".dnational").show();
		$(".national").hide(); 
		}else{
			$(".national").show(); 
			 $(".dnational").hide();
			};
	}
	$(document).ready(function(){
$("#national").focus(nationalhide).keyup(nationalhide) });

function homehide(){
	if($(this).val().length>6){
		 $(".dhome").show();
		$(".home").hide(); 
		}else{
			$(".home").show(); 
			 $(".dhome").hide();
			};
	}
	$(document).ready(function(){
$("#home").focus(homehide).keyup(homehide) });

function landlinehide(){
	if($(this).val().length>6){
		 $(".dlandline").show();
		$(".landline").hide(); 
		}else{
			$(".landline").show(); 
			 $(".dlandline").hide();
			};
	}
	$(document).ready(function(){
$("#landline").focus(landlinehide).keyup(landlinehide) });

function mobilehide(){
	if($(this).val().length>9){
		 $(".dmobile").show();
		$(".mobile").hide(); 
		}else{
			$(".mobile").show(); 
			 $(".dmobile").hide();
			};
	}
	$(document).ready(function(){
$("#mobile").focus(mobilehide).keyup(mobilehide) });

function emailhide(){
	if($(this).val().length>7){
		 $(".demail").show();
		$(".email").hide(); 
		}else{
			$(".email").show(); 
			 $(".demail").hide();
			};
	}
	$(document).ready(function(){
$("#email").focus(emailhide).keyup(emailhide) });

function usernamehide(){
	if($(this).val().length>6){
		 $(".dusername").show();
		$(".username").hide(); 
		}else{
			$(".username").show(); 
			 $(".dusername").hide();
			};
	}
	$(document).ready(function(){
$("#username").focus(usernamehide).keyup(usernamehide) });


function passwordhide(){
	var $password = $("#password");
	if($password.val().length>6){
		 $(".dpassword").show();
		$(".password").hide(); 
		}else{
			$(".password").show(); 
			 $(".dpassword").hide();
			};
	}
	$(document).ready(function(){
		var $password = $("#password");	
$password.focus(passwordhide).keyup(passwordhide).focus(cpasswordhide).keyup(cpasswordhide) });

function cpasswordhide(){
	var $confirmPassword = $("#cpassword");
	 if($("#cpassword").val().length<7){
		 $(".dcpassword").hide();
		$(".cpassword").show();
		$("#apply").prop("disabled", true); 	 
		}else if($("#password").val()===$("#cpassword").val()){
				$(".dcpassword").show();
		     $(".cpassword").hide();
			 $("#apply").prop("disabled", false);
				}
		else{
			$(".cpassword").show(); 
			 $(".dcpassword").hide();
			 $("#apply").prop("disabled", true);
			};
	}
	$(document).ready(function(){
		var $confirmPassword = $("#cpassword");
$confirmPassword.focus(cpasswordhide).keyup(cpasswordhide) });

