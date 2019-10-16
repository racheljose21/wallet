<?php
require '../includes/header.php';
require '../includes/classes/User.php';

require '../includes/classes/bus.php';

$error_array=array();
$date='';
$loc_from='';
$loc_to='';
$str='';
$str1='';
if (isset($_POST['doj'])) {
    $date=$_POST['doj'];
}
if (isset($_POST['from'])) {
    $loc_from=$_POST['from'];
}
if (isset($_POST['to'])) {
    $loc_to=$_POST['to'];
}


$bus=new bus($con, $userLoggedIn);
$str=$bus->load_available_buses($date,$loc_from,$loc_to,$error_array,$str);

if(isset($_POST['book']))
{
    $bus_id=$_POST['book'];
    $amount=$_POST['amount'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $journey=$_POST['journey'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $error_array = $bus->bookbusticket($bus_id,$amount,$error_array,$from,$to);

}

?>

<html>
<center>
<form action="busbook.php" method ="post">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Go Pay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
                    <h2 class="title"><center><u>Book Bus</u></center></h2>
                    <form method="POST" action="busbook.php">
                        <div class="input-group">
                        <input type ="date"  name="doj"  />
                        </div>
						<div class="input-group" style="overflow:visible;">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="from">
                                    <option value="Current City">Current City</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Bangalore">Bangalore</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group" style="overflow:visible;">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="to">
                                    <option value="Current City">Current City</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Bangalore">Bangalore</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <input type ="submit" value="Submit" />
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
<?php if(in_array("No buses available", $error_array)) echo '<hr>
<h2>No buses available</h2>
'; ?>  
<?php if($str!='') echo $str; ?>   
<?php if(in_array('Bill payment successful<br>', $error_array)) echo 'Ticket booked successful<br>';?>
                  <?php if(in_array('Insufficient balance<br>', $error_array)) echo 'Insufficient balance<br>';?>
                  
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>