<?php
require '../includes/header.php';
require '../includes/classes/User.php';
require '../includes/classes/gas_bill.php';
$str='';
require '../includes/form_handlers/gas_bill_search.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gas Bill</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    
</head>

<body>

    <div id='searchbill'>
        <form action="" method ="post">
            <input type="text" name="search" hint="Please Enter your bill id">
            <button  type="submit" name="findgasbill" value="Search">Search</button>
            <?php if(in_array('Invalid gas id<br>', $error_array)) echo 'Invalid gas id<br>'; ?>

        </form>
        

    </div>
    <?php if($str!='') echo $str; ?> 
        <?php if(in_array("No Bills Pending<br>", $error_array)) echo "
        <hr>
        <div class='status_post'>

<div class='posted_by' style='color:#ACACAC;'>
    <h6>No Bills Pending</h6>
    </div>

</div>"; ?>
        <?php if(in_array("Insufficient balance<br>", $error_array)) echo "Insufficient balance<br>"; ?>
        <?php if(in_array("Bill payment successful<br>", $error_array)) echo "Bill payment successful<br>"; ?>


   

</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>