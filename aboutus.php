<?php session_start(); ?>
<html>

<head>
    <title>Country Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='./css/style.css'>
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
    <div class="header_about_us">
        <div class="header_text">
            <span class="header_heading_text">ABOUT US</span>
            <span class="header_subtitle_text">WE ARE HERE, FOR YOU</span>
        </div>
    </div>

    <div class='intro'>
        <p>
            Our mission is to let you have a good time. We hope that you can play a good game, meet new people and have
            an enjoyable time overall. We are dedicated to making sure your game here is memorable.
        </p>
    </div>

    <div class='history'>
        <div class="history_left">
            <img src="./images/aboutus_history.jpg" alt="History" />
        </div>
        <div class="history_right">
            <h1>Our History</h1>
            <p>
                The country club was started on 2022 as all the founders had a love for the game. It was part of the
                founder's vision to to create an affordable place for people to pay golf or tennis, spend time with
                peers, celebrate various events of their lives and to have a good time in general.
            </p>

            <h3>Our Team</h3>
            <ol>
                <li>Ali Taheri Hossein Abadi</li>
                <li>Bismi Kayamkulam Mohamed Salih</li>
                <li>Edwin Ronald Lambert</li>
                <li>Huy Bui</li>
                <li>Sandeep Sandeep</li>
            </ol>
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