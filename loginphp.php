<?php
  require 'connection.php';
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
	  $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
	  $login_type =  $_POST['type'];
	  if($login_type == "Doctor"){
		  $sql = "SELECT * FROM doctor_master WHERE email = '$myusername' and password = '$mypassword'";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
		  $count = mysqli_num_rows($result);
		  if($count == 1) {
		  $_SESSION['login_user'] = $myusername;
			$_SESSION['Name']=$row["Name"];
		   $_SESSION['email']=$row["Email"];
		   $_SESSION['phone']=$row["Phone"];
		   
			 
		   header("location: home.html"); 
		  }else {
			 $error = "Your Login Name or Password is invalid";
		  }
	  }
	  if($login_type == "Patient"){
		  $sql = "SELECT * FROM patient_master WHERE email = '$myusername' and password = '$mypassword'";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
		  $count = mysqli_num_rows($result);
		  if($count == 1) {
		  $_SESSION['login_user'] = $myusername;
			 $_SESSION['Name']=$row["Name"];
		   $_SESSION['email']=$row["Email"];
		   $_SESSION['phone']=$row["Phone"];
		   $_SESSION['account']=$row["Account"];
			$_SESSION['u_id']=$row["ID"]; 
		   header("location: patient_home.html"); 
		  }else {
			 $error = "Your Login Name or Password is invalid";
		  }
	  }
	  else{
		  $sql = "SELECT * FROM insurance_master WHERE email = '$myusername' and password = '$mypassword'";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
		  $count = mysqli_num_rows($result);
		  if($count == 1) {
		  $_SESSION['login_user'] = $myusername;
		  $_SESSION['Name']=$row["Company_Name"];
		  $_SESSION['email']=$row["Email"];
		  $_SESSION['phone']=$row["Phone"];
		  $_SESSION['account']=$row["Account"];
		   header("location: insurance_home.html"); 
		  }else {
			 $error = "Your Login Name or Password is invalid";
		  }
	  }
   }
   ?>