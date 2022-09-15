<?php
session_start();
?>
<?php
   require 'connection.php';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $account = mysqli_real_escape_string($db,$_POST['account']); 
	  $_SESSION['p_amt']=$_POST['ammount'];
      $file = urldecode($_POST["file"]); // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath = "uploads/" . $file;

        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
	  //header("location: index.html");
      }
	else{
			echo mysqli_error($db);
		}
        //echo $_POST['txhash'];
   }
		
   ?>