<?php  
require 'config/config.php';

if (isset($_SESSION['userid'])) {
	$userLoggedIn = $_SESSION['userid'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: login2.php");
}
?>

<html>
<head>
	<title>Welcome to Swirlfeed</title>
</head>
<body>
	Hello Reece!!!!!
</body>
</html>