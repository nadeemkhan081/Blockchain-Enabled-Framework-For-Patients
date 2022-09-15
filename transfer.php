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
                        <a href="./patient_home.html">Home</a>
                    </li>
                    <li>
                        <a href="./transfer.php">Info</a>
                    </li>
                    <li>
                        <a href="./transaction_patient.php">Transactions</a>
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
                <h3 class="text-center">Personal Information</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10">
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <td id="name1"> <label class="control-label col-sm-2" id="name" ><?php  echo $_SESSION['Name'] ;?></td>
                            </tr>
                            <tr>
                                <th>Account Address:</th>
                                
                                <td><label class="control-label col-sm-2" id="addr" ><?php echo $_SESSION['account'] ;?></label></td>
                            </tr>
                            <tr>
                                <th>Account Balance:</th>
                                
                                <td><label class="control-label col-sm-2" id="bal" ></label></td>
                            </tr>
                        </table>
                        <!-- <div class="form-group"> 
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg">Update details</button>
                            </div>
                        </div> -->
                    </div>
                </div>
                    
            </div>
        </div>
		
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Priscription Information</h3>
            </div>
            <div class="panel-body">
                <div class="row" style="padding-left:200px">
                    <div class="col-sm-offset-1 col-sm-10">
                    <?php
                        require 'connection.php';
                        $uid=$_SESSION['u_id'];
                        $sqlQuery = "SELECT * FROM priscription_master where User_ID='$uid' ";
                        $result = mysqli_query($db,$sqlQuery);
                        ?>
                                                
                        <form id="form" name="form" method="post" ><table border='1' cellspacing='0' width='612'>
                        <tr>
                        
                        <th bgcolor='#337ab7'><font color='white'>File Name</font></th>
						<th bgcolor='#337ab7'><font color='white'>Discription</font></th>
                        <th bgcolor='#337ab7'><font color='white'>Download</font></th>
                        
                        </tr>
                                    
                        <?php
                        $i = 0; 

                        $number = 0;
                        while($row = $result->fetch_assoc()){

                        $number++;

                        ?>
                        
                        <?php
                        $i++;

                        if($i%2)
                        {
                        $bg_color = "#337ab7";
                        }
                        else {
                        $bg_color = "#2e6da4";
                        }
                        ?> 
                        
                        <tr bgcolor='#2e6da4'>
                        <td><center><Strong><font color='white'><?php echo $row['File']; ?></font></Strong></center></td>
						<td><center><Strong><font color='white'><?php echo $row['Discription']; ?></font></Strong></center></td>
                        <td><strong><input name="<?php echo $row['File']; ?>" type="button" id="tx" bgcolor='black' font color='white' value="Download" onclick=transfer(this.name)></center></strong></td>
                        
                         
                        </tr>
                        <?php } ?>
                                    </table>
                                  </form>
                        
                        
                    </div>
                </div>
                    
            </div>
        </div>
		
		
		

        
        
    </div>

<script src="js/jquery.js"></script>

<script src="./node_modules/web3/dist/web3.min.js"></script>
<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>


<script>
    if (typeof web3 !== 'undefined') {
	   web3 = new Web3(web3.currentProvider);
   } else {
	   web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:7545"));
   }


   web3.eth.defaultAccount = web3.eth.getAccounts[0];

    var acc=document.getElementById("addr").textContent;
    var balance=web3.fromWei(web3.eth.getBalance(acc));
    //console.log(balance['c'][0]);
    document.getElementById("bal").textContent=balance['c'][0]+"."+balance['c'][1]+" ETH";

	function transfer(file){

       // var hash=web3.eth.sendTransaction({from:acc, to:document.getElementById("Account").value,value:document.getElementById("Amount").value}) 
        //console.log(hash);

        $.ajax({
            data: 'file=' + file,
            url: 'download.php',
            method: 'POST', // or GET
            success: function(msg) {
                //window.location.href="register.html";
				 window.location.href 
                    = "Uploads/"+file;
            }
        });
	}

	
</script>
  

</body>

</html>