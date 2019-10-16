<?php
require '../includes/header.php';
require '../includes/classes/User.php';

require '../includes/classes/mob_rech.php';
$error_array=array();
if(isset($_POST['dth'])){
    
	$mrech = new mob_rech($con, $userLoggedIn);
    $amount=$_POST['amount'];
    $phone=$_POST['phone'];
    $operator=$_POST['city'];
    
	
	$error_array=$mrech->dthrecharge($phone,$amount,$operator,$error_array);
	$amount="";
	$type="";
	$operator="";
	$phone="";
}

?>
<html>
<center>
<form action="dth1.php" method ="post">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Go Pay</title>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title"><center><u>DTH Recharge</u></center></h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Registered Mobile Number" name="phone">
						</div>
						<div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Amount" name="amount">
						</div>
						<div class="input-group" style="overflow:visible;">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select id="city" name="city">
									<option disabled="disabled" selected="selected">Operator</option>
                                    <option value="airtel">Airtel Digital TC</option>
                                    <option value="dish">Dish TV</option>
									<option value="tata">Tata Sky</option>
									<option value="d2t">D2H</option>
                                </select>
							
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <input type ="submit" name='dth' value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script>

</body>
<?php if(in_array('Recharge Successful!<br>', $error_array)) echo 'Recharge Successful!<br>'; ?>
<?php if(in_array('Enter a valid amount<br>', $error_array)) echo 'Enter a valid amount<br>'; ?>
<?php if(in_array('Insufficient balance. Please add money into your wallet to continue<br>', $error_array)) echo 'Insufficient balance. Please add money into your wallet to continue<br>'; ?>
<?php if(in_array('Enter a valid Phone number<br>', $error_array)) echo'Enter a valid Phone number<br>'; ?>
      
</form>
</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>