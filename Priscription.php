

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EMR Dapp</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="js/bundle.js"></script> -->
    <!-- Custom CSS -->
    <style>

    .panel{
        margin-bottom: 60px;
    }
    .navbar{
        margin-bottom: 70px;
    }
    .panel-heading{
        margin-bottom: 20px;
    }
    .nav-pills > li > a{
        padding: 0;
        padding-right: 10px;
    }
    .nav-pills > li > a:hover{
        background-color: initial;
    }
    .nav-pills > li.active > a{
        color: #23527c;
        background-color: initial;
    }
    .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus{
        color: #23527c;
        background-color: inherit; 
    }
    </style>


    <style>
        table, th, td {
        border: 2px solid black;
        padding: 5px;
        }
        table {
        border-spacing: 15px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">EMR Dapp</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="./home.html">Home</a>
                    </li>
                    <li>
                        <a href="./view_patient.php">Patients</a>
                    </li>
                    <li>
                        <a href="./Priscription.php">Add Priscriptions</a>
                    </li>
					<li>
                        <a href="./bill.php">Bill</a>
                    </li>
                    <li>
                        <a href="./index.html">Logout</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
            <?php session_start();?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Priscription Information</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10">
					
                        
						
						                       
                         <form name="registerForm" class="form-horizontal"  method="post">
						 <div class="form-group">
						<select name="to_user" class="form-control">
					<option value="pick">Select Patient</option>
                    <?php
                        require 'connection.php';
                        
                        $sqlQuery = "SELECT * FROM patient_master";
                        $result = mysqli_query($db,$sqlQuery);
						$row = mysqli_num_rows($result);
						while ($row = mysqli_fetch_array($result)){
							echo "<option value='". $row['ID'] ."'>" .$row['Name'] ."</option>" ;
							}
							?>
							</select>
							</div>
							
							<?php
								
								/* if(isset($_POST['publish'])) {
									$username= 	$_POST['to_user'];								  
									$sqlQuery = "SELECT * FROM patient_master where ID='$username' ";
									$result = mysqli_query($db,$sqlQuery);
									$row = mysqli_num_rows($result); 
									while ($row = mysqli_fetch_array($result)){
											$_SESSION['pat_user_id'] = $username;
											$name1=$row['Name'];
											$email1=$row['Email'];
											$phone1=$row['Phone'];
										}
								} */
								
							?>
							<?php 
								
								if(isset($_POST['save'])) 
								{
								$target_dir = "uploads/";
								$target_file = $_FILES["fileToUpload"]["name"];
								$file_tmp =$_FILES['fileToUpload']['tmp_name'];
								$uploadOk = 1;
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								 move_uploaded_file($file_tmp,"uploads/".$target_file);
								 
								$disc = $_POST['w3review'];
								$u_id = $_SESSION['pat_user_id'];
								$sql = "Insert into priscription_master values('$u_id','$target_file','$disc');";
								  $result = mysqli_query($db,$sql);
								  // header("location: index.html");
								  if ($result)
								  {
																  
									}
									else{
										echo mysqli_error($db);
									}
								}
								
								
								elseif (isset($_POST['publish'])) {
									$username= 	$_POST['to_user'];								  
									$sqlQuery = "SELECT * FROM patient_master where ID='$username' ";
									$result = mysqli_query($db,$sqlQuery);
									$row = mysqli_num_rows($result); 
									while ($row = mysqli_fetch_array($result)){
											$_SESSION['pat_user_id'] = $username;
											$name1=$row['Name'];
											$email1=$row['Email'];
											$phone1=$row['Phone'];
											
										}
									}
								
						?>		
							
							<div class="form-group">
                        <input class="btn btn-primary btn-sm" type="submit" name="publish" value="Details">
                    </div>
					
					
                                  </form>
                        
                        
                    </div>
                </div>
                    
            </div>
        </div>


        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h3 class="text-center">Patient details.</h3>
                </div>
                <div class="panel-body">
                    
                    
                    <form name="registerForm" class="form-horizontal"  method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Account">Patient Name:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Name" placeholder="Name" value = "<?php echo (isset($name1))?$name1:'';?>" name = "Name"  required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Amount">Email:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Email" placeholder=" Email" name = "Email" value = "<?php echo (isset($email1))?$email1:'';?>"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="b_hash">Phone Number:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Phone" placeholder=" Phone Number" name = "Phone" value = "<?php echo (isset($phone1))?$phone1:'';?>" required>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-sm-2">Select File:</label>
                            <div class="col-sm-8"> 
                              <input type="file" id="fileToUpload" name="fileToUpload"  class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-sm-2" for="b_hash">Discritpion:</label>
                            <div class="col-sm-8"> 
                               <textarea id="w3review" name="w3review" rows="4" class="form-control"  cols="50">
								</textarea>
                            </div>
                        </div>
                        
						
						
						<div class="class-center" style="padding-left:200px;">
						
                        <input class="btn btn-primary btn-sm" type="submit" name="save" value="Save">
						
                    </div>
                    </form>
                    
                </div>
            </div>
            
            <hr>
                
        </div>
    </div>


       

        <script src="./node_modules/web3/dist/web3.min.js"></script>
        <script type = "text/javascript" 
                src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>



       



  

</body>

</html>