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
<body background="bb.jpg">
<center>
<form action="dth.php" method ="post">

<h2>DTH Recharge
<br><br>


<h4>Amount:
<input type ="text" name="amount" maxlength="5" />
<h4>Registered Mobile Number:
<input type ="text" name="phone" maxlength="10" />


<h4>Operator:
	<select id="city" name="city">
		<option value="airtel">Airtel Digital TC</option>
		<option value="dish">Dish TV</option>
		<option value="tata">Tata Sky</option>
		<option value="d2h">d2h</option>
	  </select>

<br><br>
<input type ="submit" name='dth' value="Submit" />
<br>

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