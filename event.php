<?php session_start(); ?>
<html>

<head>
  <title>Country Club</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
  <link rel='stylesheet' type="text/css" href='css/style.css'>
  <link rel='style' href='css/events_Clubhouse.css'>
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
  <div class="header_events">
    <div class="header_text">
      <span class="header_heading_text">EVENTS</span>
      <span class="header_subtitle_text">CELEBRATE JOY</span>
    </div>
  </div>

  <div class='intro'>
    <p>
      The Country Club offers the most sophisticated spaces for hosting meetings, conferences, conventions, symposiums,
      banquets and performances with state of the art facilities and amenities. In fact, the facilities available at The
      Country Club, which include meeting rooms, banquet halls and conference rooms, are one of the largest and most
      comprehensive in Vancouver. Main Hall, with its enormous pillarless area, can be divided into 8 separate spaces
      with its own private pre-function area. On the other hand, the banquet area has its own exclusive entrance.
    </p>
  </div>

  <div class='services'>
    <div class='hotel-image'>
      <div class='services_three'>
        <div class='hotel-image-detail'>
          <img class='img' src='images/meetings.jpg' alt='Image Error' width='350px' height='200px'>
          <h2> MEETINGS </h2>
          <p>Meeting Hall is the perfect combination of space and ideal ambiance with state of the art amenities and
            audio visual equipments</p>
          <span>Meeting Rooms </span><br>
          <span>Avg Area - 60 m2</span><br>
          <span>Capacity - 12 to 24 pax</span><br>
          <p><a class='readmore' href="booking.php">BOOK NOW</a></p>
        </div>
        <div class='hotel-image-detail'>
          <img class='img' src='images/event.jpg' alt='Image Error' width='350px' height='200px'>
          <h2>CONFERENCE</h2>
          <p>Three distinct conference halls featuring international cuisine along with some of the world's most well
            appreciated and prized beverages.Designed to meet different majestic venues.</p>
          <span style='text-align: center'>Room A,B,C</span><br>
          <span style='text-align: center'>Avg Area - 2465 m2</span><br>
          <span style='text-align: center'>Capacity - 250 to 2400 pax</span><br>
          <p><a class='readmore' href="booking.php">BOOK NOW</a></p>
        </div>
        <div class='hotel-image-detail'>
          <img class='img' src='images/wedding.jpg' alt='Image Error' width='350px' height='200px'>
          <h2>WEDDING</h2>
          <p>Dream up the perfect wedding and turn it into an event extraordinaire. Encapsulate the most memorable
            moments and weave dreams into reality.</p>
          <span style='text-align: center'>ClubHouse</span><br>
          <span style='text-align: center'>Avg Area - 2465 m2</span><br>
          <span style='text-align: center'>Capacity - 250 to 2500 pax</span><br>
          <p><a class='readmore' href="booking.php">BOOK NOW</a></p>
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