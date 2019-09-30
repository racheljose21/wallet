<?php
$con=mysqli_connect('localhost','root','','social');
if(mysqli_connect_errno())
    echo'ERROR:'.mysql_connect_errno();



$fname='';
$lname='';
$email='';
$password='';
$error_array=array();

if(isset($_POST['register_button'])){
    $lname = strip_tags($_POST["lname"]);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));

    
    $fname = strip_tags($_POST["fname"]);
    $fname = str_replace(' ','',$fname);
    $fname = ucfirst(strtolower($fname));

    
    $email = strip_tags($_POST["email"]);

    $password=strip_tags($_POST["password"]);

    if(strlen($fname)<2 || strlen($fname)>25)
        array_push($error_array,'Last name should be between 2-25 chars');

    if(strlen($lname)<2 || strlen($lname)>25)
        array_push($error_array,'Last name should be between 2-25 chars');

    if(empty($error_array))
    {
        $password = md5($password);
        $username=strtolower($fname._.$lname);
        $check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
    }


};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="reg.php" method="POST">
    <input type="text" name='fname' placeholder="First Name">
    <br>
    <input type="text" name='lname' placeholder="Last Name">
    <br>
    <input type="email" name='email' placeholder="Email">
    <br>
    <input type="password" name='password' placeholder="Password">
    <br>
    <input type="submit" name="register_button" value="Register">
	<br>


</form>
    
</body>
</html>