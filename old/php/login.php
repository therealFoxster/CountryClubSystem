<?php require 'db/db_interface.php';

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// If email provided, find the username
	if (filter_var($username, FILTER_VALIDATE_EMAIL))
		$username = find_customer_with_email($username)['Username'];

	
	if ($customer = find_customer_with_username($username) && $password === find_user($username)['PasswordHash']) {
		$__err = "Successfully logged in."; 
		# TODO: Set destination page for post-login
	}
	else $__err = "Invalid username/email or password.";
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