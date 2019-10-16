<?php
require '../includes/header.php';
require '../includes/classes/User.php';
require '../includes/classes/gas_bill.php';
$str='';
require '../includes/form_handlers/gas_bill_search.php';

?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="css/main1.css" rel="stylesheet" />
    <style>
    .container{
        background: rgba(0, 0, 0, 0.5);
    }
    .posted_by{
        padding:15px;
        background: rgba(0, 0, 0, 0.5);
    }
    </style>
  </head>
  <body>
    <div class="s01">
      <form action="" method ="post">
        <fieldset>
          <legend>Pay your bills fast</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <input name="search" type="text" placeholder="Please Enter your Bill ID" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit" name="findgasbill" value="Search">Search</button>
          </div>
        </div>
        <?php if(in_array("No Bills Pending<br>", $error_array)) echo "
        <hr>
        <div class='status_post'>

<div class='posted_by' style='color:#ACACAC;'>
    <h6>No Bills Pending</h6>
    </div>

</div>"; ?>

<?php if(in_array("Insufficient balance<br>", $error_array)) echo "<br>
        <center>Insufficient balance</center><br>"; ?>
        <?php if(in_array("Bill payment successful<br>", $error_array)) echo "<br>
        <div class='posted_by'>
        <center style='
        color: slategrey;
    '>Bill payment successful</center><br>
        </div>";?>
       <?php if($str!='') echo $str; ?> 
      </form>
    </div>
       
  </body>

  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
