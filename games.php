<?php session_start(); ?>
<html>

<head>
    <title>Games</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='css/style.css'>
    <link rel='style' href='style/event_ClubHouse.css'>
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
                  <a id ='username' href='profile.php'>{$_SESSION['username']}</a>
                  <div class='dropdown-content'>
                    <a href='profile.php'>Profile</a>";
                if ($_SESSION['pri']) {
                  echo "<a href='adminview.php'>Manage bookings</a>";
                }
                echo "
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
    <div class="header_games">
        <div class="header_text">
            <span class="header_heading_text">GAMES</span>
            <span class="header_subtitle_text">GAME ON</span>
        </div>
    </div>

    <div class='intro'>
        <p>
            Our club provides the facility to play, practice and train for golf and tennis. You can play games at our
            facility in a first-come first-serve basis. Reserve your game beforehand for smooth gameplay.
        </p>
    </div>

    <div class='services'>

        <div id="book-cards">
            <div class="product-details">
                <h1>GOLF COURSE RESERVATION</h1>
                <p class="information">
                    Reserve your place at our prestiges golf course. Booking your time slot gives you priority at our
                    golf course. <br />
                <ul>
                    <li>Course Length: 6,261 yards</li>
                    <li>Par: 71</li>
                    <li>Slope: 120</li>
                    <li>Time: 9 AM - 10 PM</li>
                </ul>
                </p>

                <div class="control">
                    <button class="btn">
                        <span class="buy"><a class='readmore' href="booking.php">BOOK NOW</a></span>
                    </button>
                </div>
            </div>

            <div class="product-image">
                <img src="./images/big_portfolio_item_2.png" alt="" width="600px">
            </div>
        </div>

        <div id="book-cards">
            <div class="product-details">
                <h1>TENNIS COURT RESERVATION</h1>
                <p class="information">
                    Reserve your place at our tennis court. Booking your time slot gives you priority at
                    our tennis court. <br />
                <ul>
                    <li>Time: 9 AM - 10 PM</li>
                </ul>
                </p>

                <div class="control">
                    <button class="btn">
                        <span class="buy"><a class='readmore' href="booking.php">BOOK NOW</a></span>
                    </button>
                </div>
            </div>

            <div class="product-image">
                <img src="./images/amenities_practice.jpg" alt="" width="600px">
            </div>
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