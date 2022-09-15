<?php
session_start();
?>
<?php
   require 'connection.php';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
	
	  
		  $account = mysqli_real_escape_string($db,$_POST['bill_id']); 
		  $_SESSION['p_amt']=$_POST['ammount'];
		  $sql = "Select * from patient_master where Account in (select Account from bill_master where bill_id = '$account' );";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
		  $count = mysqli_num_rows($result);
		  if($count == 1) {
			   $_SESSION['bill_id']=$account;
			   $_SESSION['p_Name']=$row["Name"];
			   $_SESSION['p_email']=$row["Email"];
			   $_SESSION['p_phone']=$row["Phone"];
			   $_SESSION['p_acc']=$row["Account"];
		  //header("location: index.html");
		  }
		else{
				echo mysqli_error($db);
			}
	  }
	  
        
   
		
   ?>