<?php
require '../includes/header.php';
require '../includes/classes/User.php';

require '../includes/classes/bus.php';

$error_array=array();
$date='';
$loc_from='';
$loc_to='';
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
$error_array=$bus->load_available_buses($date,$loc_from,$loc_to,$error_array);

?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body background="bb.jpg">
<center>



<form action="busbooking.php" method ="post">

<h2>Bus Services
<br><br>

<h4>Date of Journey:
        <input type ="date"  name="doj"  />

<h4>From:
        <select name="from">
                <option value="Current City">Current City</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Bangalore">Bangalore</option>
              </select>
<br>


<h4>To:
        <select name="to">
                <option value="Destination">Destination</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Bangalore">Bangalore</option>
               </select>



<br><br>
<input type ="submit" value="Submit" />
<?php if(in_array("No buses available", $error_array)) echo '<hr>
<h2>No buses available</h2>
'; ?>

</form>
</center>
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
