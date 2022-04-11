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
	<link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
	<link rel='stylesheet' type="text/css" href='./css/style.css'>
	<link rel="stylesheet" type="text/css" href="./css/login_register.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

	<title>Register</title>
</head>
<body>
	
    <div id='navbar' class='home-body-nav'>
        <header>
        	<section>
                <a href="index.php" id="logo" target="_self">Country Club</a>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="amenities.php">Amenities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="event.php">Events</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        
                        <style> /* Username hover dropdown */
                            .dropdown {position: relative; display: inline-block;}
                            .dropdown a {color: #df2935;}

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #f1f1f1;
                                min-width: 160px;
                                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                z-index: 1;
                            }
                            
                            .dropdown-content a {
                                color: black;
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                            }
                            
                            .dropdown-content a:hover {background-color: #bbb;}
                            .dropdown-content #logout:hover {background-color: red;}
                            .dropdown:hover .dropdown-content {display: block;}
                            .dropdown:hover > a {background-color: #df2935; color: white;}
                        </style>
                        <?php
                            if (isset($_SESSION['username'])) {
                                echo "
                                <li class='dropdown'>
                                    <a id ='username' href='#'>{$_SESSION['username']}</a>
                                    <div class='dropdown-content'>
                                        <a href='profile.php'>Profile</a>
                                        <a href='#'>Register</a>
                                        <a href='logout.php' id='logout'>Log Out</a>
                                    </div>
                                </li>";
                            } else {
                                echo '
                                <li><a href="login.php">Log In</a></li>
                                <li><a href="register.php">Sign Up</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
            </section>
        </header>
    </div>

	<div class="register-page">
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
	</div>

    <hr style="height:1px;margin:0px;background: black">
    <div class='footer'>
        <p style="margin:10px; float:left;">
            Terms | Privacy | SiteMap | FAQs | Cookie Statement
        </p>
        <p style="margin:10px; float:right;">
            &copy; Country Club
        </p>
    </div>

</body>
</html>