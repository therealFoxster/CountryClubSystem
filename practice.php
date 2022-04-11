<?php
session_start();
?>



<html>

<head>




    <title>Practice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='css/style.css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                    <a id ='username' href='register.php'>{$_SESSION['username']}</a>
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
    <div class="header_practice">
        <div class="header_text">
            <span class="header_heading_text">PRACTICE</span>
            <span class="header_subtitle_text">PRACTICE MAKES IT PERFECT</span>
        </div>
    </div>

    <div class='intro'>
        <p>
            Members can prebook golf course and tennis courts beforehand for practice games. Booking should be done at
            least a day prior and is given out depending on the availability. <a href="./contact.php"
                style="text-decoration:none; font-weight:400; color: #df2935">Contact
                us</a> for
            more
            details.
        </p>
    </div>

    <hr style="height:1px;margin:0px;background: black ">
    <div class='footer'>
        <p style="margin:10px; float:left; ">
            Terms | Privacy | SiteMap | FAQs | Cookie Statement
        </p>
        <p style="margin:10px; float:right; ">
            &copy; Country Club
        </p>
    </div>

    <script src="js/jquery.min.js "></script>
    <script src="js/main.js "></script>
    <script src="js/selectionbox_script.js"></script>
    <script src="js/snackbar.js"></script>

</body>

</html>