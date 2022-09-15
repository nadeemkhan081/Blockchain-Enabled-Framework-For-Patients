

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
                        <a href="./Insurance_home.html">Home</a>
                    </li>
                    <li>
                        <a href="./send_insurance.php">Insurance</a>
                    </li>
                    <li>
                        <a href="./transaction.php">Transactions</a>
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
                <div class="row" style="padding-left:200px">
                    <div class="col-sm-offset-1 col-sm-10">
                    <?php
						//session_start();
                        require 'connection.php';
                        // $_SESSION['p_email']="";
						// $_SESSION['p_Name']="";
						// $_SESSION['p_phone']="";
                        $sqlQuery = "SELECT * FROM bill_master where status='Pending'";
                        $result = mysqli_query($db,$sqlQuery);
                        ?>
                                                
                        <form id="form" name="form" method="post" ><table border='1' cellspacing='0' width='612'>
                        <tr>
						<th bgcolor='#337ab7'><font color='white'>Bill_ID</font></th>
						<th bgcolor='#337ab7'><font color='white'>Account</font></th>
                        <th bgcolor='#337ab7'><font color='white'>Amount</font></th>
                        <th bgcolor='#337ab7'><font color='white'>Send Insurance</font></th>
                        
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
						<td><center><Strong><font color='white'><?php echo $row['bill_id']; ?></font></Strong></center></td>
						<td><center><Strong><font color='white'><?php echo $row['Account']; ?></font></Strong></center></td>
                        <td><center><Strong><font color='white'><?php echo $row['Amount']; ?></font></Strong></center></td>
						
                        <td><strong><input name="<?php echo $row['bill_id']; ?>"  type="button" id="<?php echo $row['Amount']; ?>" bgcolor='black' font color='white' value="View" onclick=viewlogs(this.name,this.id)></center></strong></td>
                        
                         
                        </tr>
                        <?php 
						
						} ?>
                                    </table>
                                  </form>
                        
                        
                    </div>
                </div>
                    
            </div>
        </div>


        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h3 class="text-center">Transaction details.</h3>
                </div>
                <div class="panel-body">
                    
                    
                    <form name="registerForm" class="form-horizontal"  method="post">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Name">Reciver Name:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Name" placeholder=" Name" name = "Name" value=<?php  echo $_SESSION['p_Name'] ;?> required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Email">Reciver Email:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Email" placeholder=" Email" name = "Email" value=<?php  echo $_SESSION['p_email'] ;?> required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Phone">Reciver Phone:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Phone" placeholder=" Phone" name = "Phone" value=<?php  echo $_SESSION['p_phone'] ;?> required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-sm-2" for="b_hash">Ammount:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="amount" placeholder="Ammount" name = "amount" value=<?php  echo $_SESSION['p_amt'] ;?>  required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-sm-2" for="b_hash">Reciever Account:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Account" placeholder="Account" name = "Account" value=<?php  echo $_SESSION['p_acc'];?>  required>
                            </div>
                        </div>
						
						

                       <div class="form-group" style="padding-left:200px">
                        <input class="btn btn-primary btn-sm" type="submit" name="publish" value="Send" onclick=send_ins()>
                    </div>
                        
                    </form>
                    
                </div>
            </div>
            
            <hr>
                
        </div>
    </div>


       

        <script src="./node_modules/web3/dist/web3.min.js"></script>
        <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>


		<?php
		
		session_start();
		$variablephp = $_SESSION['account'];
		$variablephp1 = $_SESSION['p_acc'];
		?>

        <script>
                 if (typeof web3 !== 'undefined') {
				   web3 = new Web3(web3.currentProvider);
			   } else {
				   web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:7545"));
			   }


			   web3.eth.defaultAccount = web3.eth.getAccounts[0];
		
			function send_ins()
			{
              
				var from = "<?php echo $variablephp; ?>";
				var to = "<?php echo $variablephp1; ?>";
				// var balance=web3.fromWei(web3.eth.getBalance(from));
				// //console.log(balance['c'][0]);
				// document.getElementById("bal").textContent=balance['c'][0]+"."+balance['c'][1]+" ETH";
				console.log(to);
				console.log(from);
				

					var hash=web3.eth.sendTransaction({from:from, to:to,value:document.getElementById("amount").value}) 
					console.log(hash);

					$.ajax({
						 data: 'txhash=' + hash,
						 url: 'txhash_.php',
						 method: 'POST', // or GET
						 success: function(msg) {
							 window.location.href="send_insurance.php";
							 console.log("Done");
							 alert(msg);
				   
						}
					 });
							
						}
			

            
        </script>
		
		<script>
		
		function viewlogs( name_,ammount){
                var acc = name_;
				var amt=ammount;
                document.getElementById("amount").value= amt;
                console.log("Amt:"+amt);

                $.ajax({
                  //data: 'account=' + acc ,
				  data:{bill_id:acc, ammount:amt},
                  url: 'txhash.php',
                  method: 'post', // or get
                  success: function(msg) {
                  window.location.href="send_insurance.php";
				   
                 }
               });
			   
            }
			</script>



  

</body>

</html>