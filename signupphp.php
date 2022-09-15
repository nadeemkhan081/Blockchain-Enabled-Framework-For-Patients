<?php
   require 'connection.php';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $phone = mysqli_real_escape_string($db,$_POST['Phone']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
	  $myfname = mysqli_real_escape_string($db,$_POST['name']);
	  $account = mysqli_real_escape_string($db,$_POST['addr']);
	  $email = mysqli_real_escape_string($db,$_POST['mail']);
	  $type = $_POST['designation'];
	  if($type == "patient"){		  
      $sql = "Insert into patient_master (Name,Email,Account,Password,Phone)values('$myfname','$email','$account','$mypassword','$phone');";
      $result = mysqli_query($db,$sql);
	  // header("location: index.html");
      if ($result)
	  {
		 header("location: index.html"); 
  
		}
		else{
			echo mysqli_error($db);
		}
	  }
	  else{
		  $sql = "Insert into insurance_master values('$myfname','$email','$account','$mypassword','$phone');";
		  $result = mysqli_query($db,$sql);
		  // header("location: index.html");
		  if ($result)
		  {
			 header("location: index.html"); 
	  
			}
			else{
				echo mysqli_error($db);
			}
	  }
   }
		
   ?>