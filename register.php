<?php 
require 'db/db_interface.php'; 

error_reporting(0);
session_start();

$__err="";
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if (!find_user($username))
		if (!find_customer_with_email($email))
			if ($password == $cpassword) {
				add_customer_with_email($fname, $lname, null, $email, $username, $password);
				header("Location: login.php");
			}
			else $__err = "The passwords do not match.";
		else $__err = "This email has already been used to register.";
	else $__err = "This username is already taken.";

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="./css/login_register.css">

	<title>Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="First name" name="fname" value="<?php echo $fname ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Last name" name="lname" value="<?php echo $lname ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm password" name="cpassword" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Continue</button>
			</div>
			<p class="login-register-text">Have an account? Log in <a href="login.php">here</a>.</p>
			<p><?php print $__err;?></p>
		</form>
	</div>
</body>
</html>