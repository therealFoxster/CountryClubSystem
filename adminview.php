<?php session_start(); ?>
<html>

<head>
    <title>Country Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='./css/admin register view1.css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="./css/admin register view.css">
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

      
        <div class="container">
		<form action="" method="POST" class="login-email">
			    <p class="login-text" style="font-size: 2rem; font-weight: 800;">GAME REGISTERED    </p>
                <table style="width:100%">




  <tr>
    <th>NAME</th>
    <th>DATE</th>
    <th>SLOT</th>
    <th>CONFIRM</th>
      </tr>

      
      <?php

  '<tr>
    <td>SANDEEP</td>
    <td>02-02-2022</td>
    <td>9:00-3-00</td>
    <td><button name="Save" class="button">Save</button></td>
     
  </tr>'
  ?>
</table>








		</form>
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