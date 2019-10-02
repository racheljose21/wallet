<?php
require 'includes/header.php';


$prepaid=0;
$postpaid=0;
if(isset($_POST['mrecharge']))
{
    if(isset($_POST['prepaid']))
    {
        $prepaid=1;
    }
    elseif(isset($_POST['postpaid']))
    {
        $postpaid=1;
    }
    else{
        err
    }
}


?>