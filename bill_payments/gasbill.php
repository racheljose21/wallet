<?php
require '../includes/header.php';
require '../includes/classes/User.php';
require '../includes/classes/gas_bill.php';
require '../includes/form_handlers/gas_bill_search.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gas Bill</title>
</head>

<body>

    <div id='searchbill'>
        <form action="" method ="post">
            <input type="text" name="search" hint="Please Enter your bill id">
            <button onclick="javascript:switchVisible();" type="submit" name="findgasbill" value="Search">Search</button>
            <?php if(in_array('Invalid gas id<br>', $error_array)) echo 'Invalid gas id<br>'; ?>

        </form>
        

    </div>
    <div class='paybill' id='paybill'>
         <form action="" method ="post">
        <button onclick="javascript:switchVisible();" type="submit" name="paygasbill" value="Pay" >Pay</button>
        <?php if(in_array("No Bills Pending<br>", $error_array)) echo "No Bills Pending<br>"; ?>
        <?php if(in_array("Insufficient balance<br>", $error_array)) echo "Insufficient balance<br>"; ?>
        <?php if(in_array("Bill payment successful<br>", $error_array)) echo "Bill payment successful<br>"; ?>


					
    </form>
        

    </div>
   

</body>

</html>