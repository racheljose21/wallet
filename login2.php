<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<html>
<head>
<title>Welcome to WALLET!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="login1.css">
</head>
<body>
		<?php  

	if(isset($_POST['register_button'])) {
		echo '
		<script>

		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
		});

		</script>

		';
	}


	?>

    <div class="row">
    <div class="col-md-6 mx-auto">
            <div class="jumbotron " style="height: 100vh">
                    <h1 class="text-center">Benefits of Paytm Account</h1>
                    <div class="marg">
                    <p>Fast & Secure Payments</p>
                    <p>Pay Utility Bills or Mobile Recharge & Get Cashbacks </p><p>Fast & Secure Payments</p><p>Pay at over 10 million Paytm merchant network</p><p>Amazing deals on Travel, Movies & Shopping</p>
                </div>
                  </div>

    </div>

    <div class="col-md-6" id="first">
            <div class="container h-100">
                    <div class="d-flex justify-content-center h-100">
                        <div class="user_card">
                            <div class="d-flex justify-content-center">
                                <div class="brand_logo_container">
                                    <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center form_container">
                                <form action="login2.php" method="POST">
                                    <div class="mb-3">
									
                                        <input type="email" name="log_email" class="form-control input_user" value="<?php 
					if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					} 
					?>" required placeholder="Email Address">
                                    </div>
                                    <div class="mb-2">
                                        <input type="password" name="log_password" class="form-control input_pass" value="" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="mx-auto">
                                            <input type="checkbox" id="customControlInline">
                                            <label  for="customControlInline">Remember me</label>
											<br>
											<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
                                        </div>
                                    </div>
									<div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" class="btn login_btn" name="login_button" value="Login">
                            </div>
                            <div class="mt-4">
                                <div class="d-flex justify-content-center links">
                                    Don't have an account? <a href="#" id="signup" class="signup ml-2">Sign Up</a>
                                </div>
                                <div class="d-flex justify-content-center links">
                                    <a href="#">Forgot your password?</a>
                                </div>
                            </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
    </div>

    <div class="col-md-6" id="second">
            <div class="container h-100">
                    <div class="d-flex justify-content-center h-100">
                        <div class="user_card">
                            <div class="d-flex justify-content-center">
                                <div class="brand_logo_container">
                                    <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center form_container">
                                <form action="login2.php" method="POST">
                                    <div class="mb-3">
								
									<input type="text" name="reg_fname" class="form-control input_user" value="<?php 
							if(isset($_SESSION['reg_fname'])) {
								echo $_SESSION['reg_fname'];
							} 
							?>" required placeholder="First Name">
					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
					
                                    </div>
									<div class="mb-3">
                                        <input type="text" name="reg_lname" class="form-control input_user" value="<?php 
							if(isset($_SESSION['reg_lname'])) {
								echo $_SESSION['reg_lname'];
							} 
							?>" required placeholder="Last Name">
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your Last name must be between 2 and 25 characters<br>"; ?>
					
							</div><div class="mb-3">
							<input type="email" name="reg_email" class="form-control input_user" placeholder="Email" value="<?php 
					if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
					 ?>

                                    </div><div class="mb-3">
                                        <input type="text" name="phone" class="form-control input_user" value="phone" placeholder="Phone no">
                                    </div><div class="mb-3">
                                        <input type="password" class="form-control input_user" name="reg_password" placeholder="Password" required>
										</div>
                                    <div class="mb-2">
                                       <input type="password" class="form-control input_user" name="reg_password2" placeholder="Confirm Password" required>
					</div>
					<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>

                                        <div class="mx-auto">
                                            <input type="checkbox" id="customControlInline1">
                                            <label  for="customControlInline">Remember me</label>
                                        </div>
										
                            <div class="d-flex justify-content-center mt-3 login_container">
								<input type="submit" class="btn login_btn" name="register_button" value="Register">
                            </div>
							<br>

					<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
					<?php if(in_array("not set", $error_array)) echo "<span style='color: #14C800;'>You're not set! Go ahead and login!</span><br>"; ?>
					
                                <div class="d-flex justify-content-center links">
                                    Already have an account?  <a href="#" id="signin" class="signin ml-2">Sign in here!</a>
                                </div>
                                <div class="d-flex justify-content-center links">
                                    <a href="#">Forgot your password?</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

    
</div>
    
</body>
</html>