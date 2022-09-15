

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
                <div class="row" style="padding-left:200px">
                    <div class="col-sm-offset-1 col-sm-10">
                    <?php
                        require 'connection.php';
						$acc1= $_SESSION['account'];	
                        $sqlQuery = "SELECT * FROM tx_logs where account='$acc1' ";
                        $result = mysqli_query($db,$sqlQuery);
                        ?>
                                                
                        <form id="form" name="form" method="post" ><table border='1' cellspacing='0' width='612'>
                        <tr>
                        
                        <th bgcolor='#337ab7'><font color='white'>Transaction</font></th>
                        <th bgcolor='#337ab7'><font color='white'>View Logs</font></th>
                        
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
                        <td><center><Strong><font color='white'><?php echo $row['txhash']; ?></font></Strong></center></td>
                        <td><strong><input name="<?php echo $row['txhash']; ?>" type="button" id="tx" bgcolor='black' font color='white' value="View Logs" onclick=viewlogs(this.name)></center></strong></td>
                        
                         
                        </tr>
                        <?php } ?>
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
                            <label class="control-label col-sm-2" for="Account">Senders Address:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Account" placeholder=" Account address" name = "Account" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Amount">Value:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="Amount" placeholder=" Amount" name = "Amount" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="b_hash">Block Hash:</label>
                            <div class="col-sm-8"> 
                                <input type="text" class="form-control" id="b_hash" placeholder=" Bloc Hash" name = "b_hash" required>
                            </div>
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



        <script>
                if (typeof web3 !== 'undefined') {
                web3 = new Web3(web3.currentProvider);
            } else {
                web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:7545"));
            }


            web3.eth.defaultAccount = web3.eth.getAccounts[0];


            function viewlogs( name_){
                var hsh = name_;
                var dat=web3.eth.getTransaction(hsh);
                //console.log(data);
                var val=value= dat['value']['c'][0];
                var eth_val= val/1000;
                document.getElementById("Amount").value= eth_val+"ETH";
                document.getElementById("Account").value= dat['from'];
                document.getElementById("b_hash").value= dat['blockHash'];

                //var hash=web3.eth.sendTransaction({from:'0xce342c8C41F79447963f136A0f2087DD42947A07', to:document.getElementById("Account").value,value:document.getElementById("Amount").value}) 
                //console.log(hash);

                // $.ajax({
                //     data: 'txhash=' + hash,
                //     url: 'txhash.php',
                //     method: 'POST', // or GET
                //     success: function(msg) {
                //         window.location.href="register.html";
                //     }
                // });
            }

            
        </script>



  

</body>

</html>