<?php session_start(); ?>
<html>

<head>
    <title>Country Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='css/style.css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
                                    <a id ='username' href='register.php'>{$_SESSION['username']}</a>
                                    <div class='dropdown-content'>
                                        <a href='profile.php'>Profile</a>
                                        <a href='#'>Register</a>
                                        <a href='logout.php' id='logout'>Log Out</a>
                                    </div>
                                </li>";
                            } else {
                                echo '
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Signup</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
            </section>
        </header>

    </div>
    <div class="header_amenities">
        <div class="header_text">
            <span class="header_heading_text">AMENITIES</span>
            <span class="header_subtitle_text">WHAT YOU REQUIRE, AND MORE</span>
        </div>
    </div>

    <div class='intro'>
        <p>
            We provide all the necessary items that you require for a good game. We are here to make sure your time here
            is met comfortably. We provide golf cart services, golf and tennis requirements, fine dishes that are sure
            to make you happy and also personal trainers and practice sessions to up your game.
        </p>
    </div>

    <div class="service-portfolio-amenities" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="service-portfolio-item">
                        <a href="./clubhouse.php">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>CLUBHOUSE</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_clubhouse.jpg">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-portfolio-item">
                        <a href="./dining.php">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>DINING</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_dining.jpg">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-portfolio-item">
                        <a href="./trainer.php">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>TRAINER</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_trainer.jpg">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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