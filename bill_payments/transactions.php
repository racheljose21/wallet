<?php
require '../includes/header.php';
require '../includes/classes/User.php';
$userrn = new User($con, $userLoggedIn);
$str='';
$str=$userrn->getTransactions();
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    p {
    margin-top: unset;
    margin-bottom: auto;
}
.container{
    margin-bottom: 1rem;
    border-radius:12px;
    border:2px dotted black;
    box-shadow: 4px 9px 10px 6px #051A38;
    background-color: #758AA8;
}
h6{
    
    TEXT-ALIGN: CENTER;
}
body{
    background-color: #2C4870;
}

</style>
</head>
<body>
<div class="card-body">
                    <h2 class="title"><center><u style="
    color: #a7adb3;">Transaction History</u></center></h2>
                    <br>
    <?php  
    if($str!=''){
        echo $str;
    }
    ?>
    </div>
</body>
</html>