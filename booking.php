<?php
session_start();
?>




<!DOCTYPE html>
<html>
<head>

	<title>Booking-Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
  <link rel='stylesheet' type="text/css" href='css/style.css'>
  <link rel='style' href='style/event_ClubHouse.css'>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="style1.css">
<style>

body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}



  .input-field{
            font-size: 18px;
            padding:10px 10px;
            margin:25px auto;
            width :100%;
            background: lightgray;
            outline:none;
            border-radius: 10px;
		text-transform: uppercase;
        }

.input-label{
text-transform: uppercase;


}

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
text-transform: uppercase;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

</style>





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

        <div>
             
                <form class="container"  method='post' action='booking.php'>
                      <center><h2 >BOOKING</h2></center>  </br>
		 <div  class="booking">
                        
                        <label class='input-label'>Select Event</label></br>
                        <select id='type' class='input-field' name='Type' required>
                        <option disabled hidden selected>--Select--</option>
                        <option value="Conference-Hall">Conference-Hall</option>
                        <option value="Meeting">Meeting</option>
                        <option value="Gulf">Gulf Course Reservations</option>
				<option value="Dinning">Dinning Reservation</option>
				<option value="Wedding">Wedding</option>
                        </select></br>
                           
                         
                         
                         <label class='input-label' for="checkin" >Date</label></br>
                        <input class='input-field' type="date" id="checkin" name="Checkin" onchange="CompareDate(event);" required><br>
                    

 				 <label class='input-label' >Time slot</label></br>
                         <select id='time' class='input-field'  name='time'  onchange="select()" required >       
                           <option disabled hidden selected>--Select--</option>
				    <option value='1'> 9:00-12:00</option>
                            <option value='2'> 12:00-3:00 </option>
                            <option value='3'> 3:00-6:00 </option>
                            </select></br>

                        <button type='submit' class='btn'onclick="return confirm('Are you sure ,do you want to book this Event?')" >Book</button>
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


 <script>
   
                  
            function CompareDate(e) {    
                today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //As January is 0.
                var yy = today.getFullYear();
                var dateformat = e.target.value.split('-');
                var  cin=dateformat[2];
                var  cinmonth=dateformat[1];
                var  cinyear=dateformat[0];

                if (yy==cinyear && mm==cinmonth && dd<=cin) { 
                   
                return true;

                }
                else if   (mm<cinmonth ){
                    return true;
                }
                 else if   (yy<cinyear){
                    return true;
                }
                
                else {    
                alert("Please select valid booking date from today");
                e.target.value ='';
                }    
                }
       
        
        </script>
        
    
    </body>
</html>