<?php
session_start();
require 'db/db_interface.php';

if (!isset($_SESSION['username'])==NULL) {
 $useremail= (find_customer_with_username($_SESSION['username']));
 foreach ($useremail as $value) {
  echo "$value <br>";
 }

}

?>




<!DOCTYPE html>
<html>
<head>


<title>Country Club</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="images/golf-player-icon.png" />
  <link rel='stylesheet' type="text/css" href=' css/for profile.css'>
  <!-- <link rel="stylesheet" href="css/StyleSheet.css" /> -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

/* .container {
     		width:auto;
		max-width:390px;

    margin-left: auto;
  margin-right: auto;
            
            position:relative;
            margin:6% auto;
            background: white;
            box-shadow: 0 0 10px #2d545e;
            padding: 25px 20px;
            border-radius:20px;
            overflow: hidden;
		
} */


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

       
  <div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Profile</p>
			<div class="input-group">
				<input type="text" placeholder="First name" name="first name" value="" >
			</div>
      <div class="input-group">
				<input type="text" placeholder="Last name" name="last name" value="">
			</div>
      <div class="input-group">
				<input type="text" placeholder="Email" name="Email" value="">
			</div>
      <div class="input-group">
				<input type="text" placeholder="Mobile" name="mobile" value="" >
			</div>
      <div class="input-group">
				<input type="Address" placeholder="Address" name="address" value="" >
			</div>
      <div class="input-group">
				<input type="text"  name="member" value="" >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="">
			</div>
			<div class="input-group">
				<button name="Save" class="btn">Save</button>
			</div>

		</form>
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