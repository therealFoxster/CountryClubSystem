<?php 
require 'db/db_interface.php'; 

session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// Finding the username if email was provided
	if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
		if (find_customer_with_email($username)['Username']) // Customer
			$username = find_customer_with_email($username)['Username'];
		else if (find_employee_with_email($username)['Username']) // Employee
			$username = find_employee_with_email($username)['Username'];
		else if (find_manager_with_email($username)['Username']) // Manager
			$username = find_manager_with_email($username)['Username'];
	}

	$user = find_user($username);
	if ($user && $password === $user['PasswordHash']) {
		$_SESSION['username']=$username;
		if(isset($_SESSION['address'])==null){
			header("Location: profile.php");
		}
		else{header("Location: index.php");}
		
		

		switch ($user['AdminPrivilege']) {
			case 0: // Customer
				# code...
				break;
			case 1: // Employee
				# code...
				break;
			case 2: // Manager
				# code...
				break;
		}

		// $__err = "Successfully logged in. (admin: ${user['AdminPrivilege']})"; # Test
	} else $__err = "Invalid username/email or password.";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="./css/login_register.css">

<title>Log In</title>
</head>
<body>
<div class="container">
	<form action="" method="POST" class="login-email">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Log In</p>
		<div class="input-group">
			<input type="text" placeholder="Username or email" name="username" value="<?php echo $_POST['username']; ?>" required>
		</div>
		<div class="input-group">
			<input type="password" placeholder="Password" name="password" value="" required>
		</div>
		<div class="input-group">
			<button name="submit" class="btn">Continue</button>
		</div>
		<p class="login-register-text">Don't have an account? Register <a href="register.php">here</a>.</p>
		<p><?php print $__err;?></p>
	</form>
</div>
</body>
</html>