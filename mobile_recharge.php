<?php  
require 'includes/header.php';
require 'includes/classes/User.php';
require 'includes/classes/mob_rech.php';
$amount="";
$type="";
$operator="";
$phone="";
if(isset($_POST['mrecharge'])){
	$mrech = new mob_rech($con, $userLoggedIn);
	$amount=$_POST['amount'];
	$operator=$_POST['city'];
	if(isset($_POST['prepaid']))
	{
		$type=$_POST['prepaid'];
	}
	if(isset($_POST['postpaid']))
	{
		$type=$_POST['postpaid'];
	}
	$phone=$_POST['mobile'];
	
	$operator=$_POST['city'];

	$mrech->recharge($phone,$amount,$operator,$type);
	$amount="";
	$type="";
	$operator="";
	$phone="";
}
?>



<html>
<body background="bb.jpg">
<center>
<form action="mobile_recharge.php" method ="post">

<h2>Mobile Recharge
<br><br>

<h4>
	<input type ="radio" value="prepaid" name="prepaid" />Prepaid
	<input type ="radio" value="postpaid" name="postpaid"/>Postpaid

	<h4>Mobile Number:
<input type ="text" value="" name="mobile" maxlength="10" />

<h4>Amount:
<input type ="text"  name="amount" maxlength="5" />

<h4>Operator:
	<select id="city" name="city">
		<option value="airtel">Airtel</option>
		<option value="idea">Idea</option>
		<option value="vodafone">Vodafone</option>
		<option value="jio">Jio</option>
	  </select>

<br><br>
<input type="submit" name="mrecharge" value="Recharge">
</form>