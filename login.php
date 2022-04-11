<?php 
require 'db/db_interface.php'; 

session_start();
error_reporting(0);

$last_page = $_SERVER['HTTP_REFERER'];

// if (isset($_SESSION['username'])) {
// 	header("Location: welcome.php");
// }

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
		$_SESSION['pass']=$_POST['password'];
		// $_SESSION['pri']=get_admin_priv($username) ;
		if (get_admin_priv($username) > 0) {
			$_SESSION['pri']=get_admin_priv($username);
		}else{
			unset($_SESSION['pri']);
		}
		header("Location: {$_SESSION['last']}");
		
		

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
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='./css/style.css'>
    <link rel="stylesheet" type="text/css" href="./css/login_register.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>Log In</title>
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
                        <li><a href="games.php">Games</a></li>
                        <li><a href="amenities.php">Amenities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="event.php">Events</a></li>
                        <li><a href="contact.php">Contact</a></li>

                        <style>
                        /* Username hover dropdown */
                        .dropdown {
                            position: relative;
                            display: inline-block;
                        }

                        .dropdown a {
                            color: #df2935;
                        }

                        .dropdown-content {
                            display: none;
                            position: absolute;
                            background-color: #f1f1f1;
                            min-width: 160px;
                            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                            z-index: 1;
                        }

                        .dropdown-content a {
                            color: black;
                            padding: 12px 16px;
                            text-decoration: none;
                            display: block;
                        }

                        .dropdown-content a:hover {
                            background-color: #bbb;
                        }

                        .dropdown-content #logout:hover {
                            background-color: red;
                        }

                        .dropdown:hover .dropdown-content {
                            display: block;
                        }

                        .dropdown:hover>a {
                            background-color: #df2935;
                            color: white;
                        }
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

    <div class="login-page">
        <div class="container">
            <form action="" method="POST" class="login-email">
                <?php $_SESSION['last'] = $_SERVER['HTTP_REFERER']?>
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Log In</p>
                <div class="input-group">
                    <input type="text" placeholder="Username or Email" name="username"
                        value="<?php echo $_POST['username']; ?>" required>
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