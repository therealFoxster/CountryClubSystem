<?php session_start(); ?>
<html>

<head>
    <title>Country Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='./css/style.css'>
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
    <div class="header_home">
        <div class="header_text">
            <span class="header_intro_text">WELCOME TO THE</span>
            <span class="header_heading_text">COUNTRY CLUB</span>
            <span class="header_subtitle_text">YOUR DESTINATION FOR A GREAT TIME.</span>
        </div>
    </div>

    <div class='intro'>
        <p>
            Welcome to the Country Club - a private golf and tennis court located on the outskirts of Vancouver City.
            With spectacular golf and tennis courts, we provide a peaceful yet exciting place to play games, all your
            required amenities and exceptional food options. This makes our Country Club is one location that you
            wouldn't want to miss spending your time at.
        </p>
    </div>

    <div class='services'>

        <h1>SERVICES</h1>

        <div class="service-portfolio-home" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="service-portfolio-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>GAMES</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_games.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-portfolio-item">
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
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-portfolio-item">
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
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-portfolio-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>EVENTS</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_events.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-portfolio-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>COMPETITION</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_competition.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-portfolio-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <h1>PRACTICE</h1>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="images/amenities_practice.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='last'>

        <div class='dest'> &nbsp;
            <h2><i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;ADDRESS</h2>
            <address style='font-size:20px'>
                Country Club<br />
                8705 Angus Dr<br />
                Vancouver, BC, V6P6G2<br />
            </address>
        </div>

        <div class="vertical"></div>

        <div class='contact'>

            <h2><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;CONTACT</h2>
            <p style='font-size:20px'>
                Telephone Number: +1 123 456 7890<br> Fax Number: +1 123 456 7890<br> Email Id: country@club.com</p>
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