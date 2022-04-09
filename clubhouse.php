<?php session_start(); ?>
<html>

<head>
  <title>Country Club</title>
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
  <div class="header_clubhouse">
    <div class="header_text">
      <span class="header_heading_text">CLUBHOUSE</span>
      <span class="header_subtitle_text">A PLACE FOR YOUR HAPPIEST MOMENTS</span>
    </div>
  </div>

  <div class='intro'>
    <p>
      The club house offers unique experience for our members. Offering privacy and access to our exclusive
      club. Priority bookings is available for our clubhouse members. Our venue can be arranged to host your private
      events and weddings.
    </p>
  </div>

  <div class='services'>
    <div class='services_container'>
      <div class='services_three'>
        <div class='hotel-image-detail'>
          <img class='img' src='images/golf-yacht-club.jpg' alt='Image Error' width='350px' height='200px'>
          <h2> Gulf Course Reservations </h2>
          <p>Book your piority time slot for our par 72, 6995 yards Gulf course. </p>
          <span>CulfCourse</span><br>
          <span>par 72 - 6955 yards</span><br>
          <span>6am - 10pm everyday</span><br>
          <p><a class='readmore' href="booking.php">BOOK NOW</a></p>
        </div>
        <div class='hotel-image-detail'>
          <img class='img' src='images/clubhouse_Dinning.jpg' alt='Image Error' width='350px' height='200px'>
          <h2>Dinning Reservations</h2>
          <p> Book a table in one of our prestigious dinning options and enjoy a 5 star experience provided by are
            resident celebrity chefs. </span><br>
            <span style='text-align: center'>up to 12 persons per table</span><br>
            <span style='text-align: center'>Capacity - 250</span><br>
          <p><a class='readmore' href="booking.html">BOOK NOW</a></p>
        </div>
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