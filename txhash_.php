<?php
session_start();
?>
<?php
   require 'connection.php';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $account = mysqli_real_escape_string($db,$_SESSION["p_acc"]);
      $txhash = mysqli_real_escape_string($db,$_POST['txhash']); 
	  $bill_id = mysqli_real_escape_string($db,$_SESSION["bill_id"]);
	 

      $sql = "Insert into tx_logs values('$account','$txhash');";
      $result = mysqli_query($db,$sql);
	  // header("location: index.html");
      if ($result)
	  {
		 $updt_qry = "update bill_master set Status = 'Done' where bill_id = '$bill_id'";
		if(mysqli_query($db,$updt_qry)){
			 
		}
		else{
			  echo mysqli_query($db);
		} 
  
		}
		else{
			echo mysqli_error($db);
		}
        //echo $_POST['txhash'];
   }
		
   ?>