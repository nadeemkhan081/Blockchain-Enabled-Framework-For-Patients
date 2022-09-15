

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
                <h3 class="text-center">Personal Information</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10" style="padding-left:200px;">
                    <?php
                        require 'connection.php';
                        
                        $sqlQuery = "SELECT * FROM patient_master";
                        $result = mysqli_query($db,$sqlQuery);
                        ?>
                                                
                        <form id="form" name="form" method="post" ><table border='1' cellspacing='0' width='612' style="padding-right:200px;">
                        <tr>
                        <th bgcolor='#337ab7'><font color='white'>ID</font></th>
                        <th bgcolor='#337ab7'><font color='white'>Name</font></th>
                        <th bgcolor='#337ab7'><font color='white'>Email</font></th>
						<th bgcolor='#337ab7'><font color='white'>Phone</font></th>
                        
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
						<td><center><Strong><font color='white'><?php echo $row['ID']; ?></font></Strong></center></td>
                        <td><center><Strong><font color='white'><?php echo $row['Name']; ?></font></Strong></center></td>
						 <td><center><Strong><font color='white'><?php echo $row['Email']; ?></font></Strong></center></td>
						  <td><center><Strong><font color='white'><?php echo $row['Phone']; ?></font></Strong></center></td>
                        
                        
                         
                        </tr>
                        <?php } ?>
                                    </table>
                                  </form>
                        
                        
                    </div>
                </div>
                    
            </div>
        </div>


        
    </div>


       

        <script src="./node_modules/web3/dist/web3.min.js"></script>
        <script type = "text/javascript" 
                src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>



        



  

</body>

</html>