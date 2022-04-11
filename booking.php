<?php require 'db/db_interface.php'; 
session_start(); 

# Responding to GET request
if(isset($_GET['date'])){
  $date = $_GET['date'];
  
  $facilities = get_facilities();
      $facility_opts = "";
      foreach ($facilities as $facility) {
        $facility_opts .= "<option value='{$facility['FacilityId']}'>{$facility['FacilityName']}</option>";
      }
  echo "$facility_opts\n";

  $time_slots = get_time_slots();
  $time_slot_opts = "";
  foreach ($time_slots as $time_slot) {
    $time_slot_opts .= "<option value='{$time_slot['TimeSlotId']}'> {$time_slot['StartTime']} - {$time_slot['EndTime']}</option>";
  }
  echo "$time_slot_opts\n";

  $bookings = get_bookings_for_date($date);
  foreach ($bookings as $booking) {
    echo "{$booking['FacilityId']}/{$booking['TimeSlotId']}\n";
  }
  return;
}

if (isset($_SESSION['username'])) {
  if (isset($_POST['facility']) && isset($_POST['date']) && isset($_POST['time'])) {
    test_log($_POST['facility']);
    test_log($_POST['date']);
    test_log($_POST['time']);
    test_log($_SESSION['username']);
    add_booking($_POST['facility'], $_POST['date'], $_POST['time'], $_SESSION['username']);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
  <link rel='stylesheet' type="text/css" href='css/style.css'>
  <link rel='stylesheet' href='style/event_ClubHouse.css'>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
  <style>
    body, html {
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
    }

    * {box-sizing: border-box;}

    .input-field{
      font-size: 18px;
      padding:10px 10px;
      margin:25px auto;
      width :100%;
      background: lightgray;
      outline:none;
      border-radius: 10px;
      /* text-transform: uppercase; */
    }

    /* .input-label{text-transform: uppercase;} */

    .container {
      width:auto;
      max-width:390px;
      height:460px;
      position:relative;
      margin:6% auto;
      background: white;
      box-shadow: 0 0 10px #2d545e;
      padding: 25px 20px;
      border-radius:20px;
      overflow: hidden;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      /* text-transform: uppercase; */
      opacity: 0.9;
    }

    .btn:hover {opacity: 1;}
  </style>
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

  
  <?php 
    if (isset($_SESSION['username'])) {
      $facilities = get_facilities();
      $facility_opts = "";
      foreach ($facilities as $facility) {
        $facility_opts .= "<option value='{$facility['FacilityId']}'>{$facility['FacilityName']}</option>";
      }
      
      $time_slots = get_time_slots();
      $time_slot_opts = "";
      foreach ($time_slots as $time_slot) {
        $time_slot_opts .= "<option value='{$time_slot['TimeSlotId']}'> {$time_slot['StartTime']} - {$time_slot['EndTime']}</option>";
      }

      echo "
      <div>
        <form class='container'  method='post' action='booking.php'>
          <center><h2 >Booking</h2></center>  </br>
          <div  class='booking'>
            <label class='input-label'>Facility</label></br>
            <select id='facility' class='input-field' name='facility' required>
              <!-- <option disabled hidden selected>--Select--</option> -->
              $facility_opts
            </select></br>

            <label class='input-label' for='checkin' >Date</label></br>
            <input class='input-field' type='date' id='date' name='date' onchange='checkAvailability(event);' required><br>
                      
            <label class='input-label' >Time slot</label></br>
            <select id='time' class='input-field'  name='time'  onchange='select()' required >       
              <!-- <option disabled hidden selected>--Select--</option> -->
              $time_slot_opts
            </select></br>

            <button type='submit' class='btn' onclick='return confirm('Are you sure you want to book this facility?')'>Book</button>
          </div>
        </form>
      </div>";
    } else {
        echo "
        <div class='container' style='height: 220px;'>
          <center><h2>Become a member to book</h2></center>  </br>
          <a href='register.php'><button class='btn'>Sign Up</button><br><br></a>
          <a href='login.php'><button class='btn'>Log In</button></a>
        </div>";
    }
  ?>
  

  <!-- <hr style="height:1px;margin:0px;background: black">
  <div class='footer'>
    <p style="margin:10px; float:left;">
      Terms | Privacy | SiteMap | FAQs | Cookie Statement
    </p>
    <p style="margin:10px; float:right;">
      &copy; Country Club
    </p>
  </div> -->

  <script>         
    function compareDate(e) {    
      today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; // As January is 0.
      var yy = today.getFullYear();
      var dateformat = e.target.value.split('-');
      var cin = dateformat[2];
      var cinmonth = dateformat[1];
      var cinyear = dateformat[0];

      if (yy == cinyear && mm == cinmonth && dd <= cin)
        return true;
      else if (mm < cinmonth)
          return true;
      else if (yy < cinyear)
          return true;
      else {
        alert("Please select valid booking date from today");
        e.target.value ='';
      }
    }

    function checkAvailability(event) {
      const date = event.target.value;
      $.ajax({
        type: "GET",
        url: "booking.php",
        data: {date: date},
        success: (data) => {
          // Adding all options (will be removed later if needed)
          document.querySelector("#facility").innerHTML = data.split("\n")[0];
          document.querySelector("#time").innerHTML = data.split("\n")[1];

          // Storing booked details
          var bookedFacilityIds = [], bookedTimeSlotIds = [];
          count = -1; data.split("\n").forEach(element => {
            if (element && count) {
              bookedFacilityIds.push(element.split("/")[0]);
              bookedTimeSlotIds.push(element.split("/")[1]);
            } count++;
          });
          
          // Removing unneeded facility options
          facilityOpts = [];
          Array.from(document.querySelectorAll("#facility option")).forEach(opt => {
            if (!bookedFacilityIds.includes(opt.value)) {
              facilityOpts.push(opt);
            }
          });
          document.querySelector("#facility").innerHTML = "";
          facilityOpts.forEach(opt => {
            document.querySelector("#facility").insertAdjacentElement('beforeend', opt);
          });

          // Removing unneeded time slot options
          timeSlotsOpts = [];
          Array.from(document.querySelectorAll("#time option")).forEach(opt => {
            if (!bookedTimeSlotIds.includes(opt.value)) {
              timeSlotsOpts.push(opt);
            }
          });
          document.querySelector("#time").innerHTML = "";
          timeSlotsOpts.forEach(opt => {
            document.querySelector("#time").insertAdjacentElement('beforeend', opt);
          });
        }
      });
    }
  </script>
</body>
</html>