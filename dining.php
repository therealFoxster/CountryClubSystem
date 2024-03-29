<?php require 'db/db_interface.php'; 
session_start(); 

if (isset($_SESSION['username'])) {
    if (isset($_GET['num_of_people']) && isset($_GET['date']) && isset($_GET['time'])) {
        // echo $_GET['num_of_people'] . "\n";
        // echo $_GET['date'] . "\n";
        // echo $_GET['time'] . "\n";
        $num_people = $_GET['num_of_people'];
        $date = $_GET['date'];
        $time = $_GET['time'];
        
        $user = find_customer_with_username($_SESSION['username']);
        
        add_restaurant_booking($user['Email'], $date, $time, $num_people);

        return;
    }
}
?>
<html>

<head>
    <title>Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/country_club_icon.png" />
    <link rel='stylesheet' type="text/css" href='css/style.css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.min.css'>
    <script src="js/snackbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <div class="header_dining">
        <div class="header_text">
            <span class="header_heading_text">DINING</span>
            <span class="header_subtitle_text">FOOD THAT TASTES LIKE AT HOME</span>
        </div>
    </div>

    <div class='intro'>
        <p>
            Eat food, that's enjoyable as the one you have at home, or even better. At out restaurant, we provide the
            finest dishes that everyone can enjoy. We provide different cuisines and have numerous good chefs, waiters
            and team members that can let you experience
            savoring food like never before.
        </p>
    </div>

    <div class="dining_time">
        <div class="column">
            <h1>Opening Hours</h1>
            <img src="images/timing_icon.png" alt="Timing" style="margin-top:50px; width: 10%;" />
            <h2>7:00am – 11:00pm daily</h2>
            <p>Eat the finest dishes that you are sure to enjoy after a good game. We serve various cuisines and food
                types for everyone's appetite. Dine-in are available, but be sure to provide proof of vaccination at the
                entrance. Food takeouts or seat
                reservations should be done at least an hour prior.</p>
            <p>Daily Seating offered on a first-come, first-served basis. </p>
            <p>Park admission required to dine at The Country Club Restaurant.</p>
        </div>
        <div class="column">
            <img src="images/dining_time.jpg" alt="Time">
        </div>
    </div>
    <div class="dining_menu">
        <div class="column">
            <img src="images/dining_menu.jpg" alt="Menu">
        </div>
        <div class="column">
            <h1>Menu</h1>
            <div class="menu">
                <h2>Starters</h2>
                <h4>Yam Fries (V)
                </h4> - $9 <br />Chipotle Mayo<br /> Truffle Fries (V) - $9<br /> Grana Padano, truffle powder, chives,
                garlic aioli<br />
                <h4> Roast Butternut Squash Soup (V/GF)</h4> - $9
                <br /> Maple reduction, toasted pumpkin seeds, crème fraiche<br />
                <h4>Fried Brussels Sprouts (V)</h4> - $12 <br />Apple butter, crisp pancetta, toasted hazelnuts, apple
                cider reduction<br />
                <h4>Thunder Crunch Chicken Strips and Fries</h4> - $15<br /> Plum sauce or honey mustard<br />
                <h4>Beer Cheddar Fondue (V)</h4> - $9
                <br />Warm house pretzel twists, jalapeno<br />
                <h4>Chili Lime Tiger Prawns</h4> - $15 <br />Pan seared prawns, chilies, garlic butter, crostini<br />
                <h4> Chorizo Quesadilla</h4> - $16<br /> Chorizo sausage, roasted red pepper, basil tomato sauce,
                arugula, parmesan cheese, balsamic reduction<br />
                <h4>Northview Wings</h4> - $14<br /> house hot, Buffalo hot, Dill pickle, Thai chili, Teriyaki or Salt
                and pepper<br />
                <h2> SALADS</h2>
                <h4> Market Greens (V/GF)</h4> -$15<br /> Granny smith apple, roasted beets, goat cheese, radish,
                candied seeds, apple cider vinaigrette, crouton crumble<br />
                <h4> Romaine and Baby Kale Caesar Salad</h4> - $14<br /> dressing, crouton crumble, parmesan cheese,
                balsamic reduction, lemon<br />
                <h4> Buddha Bowl (Vegan)</h4> - $18 <br /> Falafel, Jerusalem cous-cous, caramelized red onion, roasted
                yams, cucumber, baby kale, spinach, beets, toasted pumpkin seeds, lemon, maple tahini dressing<br />
                <h4> Cobb Salad</h4> - $19 <br />Iceberg wedge, grilled chicken, peppered bacon, roma tomato, hardboiled
                egg, avocado, crumbled blue cheese, red wine vinaigrette<br />
                <h2> MAINS</h2><br />
                <h4> T.B.L.T Sandwich</h4> - $15 <br />Roast turkey, bacon, lettuce, tomato, cranberry mayo, choice of
                bread
                <br />
                <h4> Signature Vegetarian Burger (V)<br /> - $17 <br />Handmade chickpea patty, garlic mayo, arugula,
                    tomato, caramelized red onion, toasted brioche bun<br />
                    <h4> Burger </h4> - $18<br /> Ground chuck patty, sautéed mushrooms, cheddar cheese, bacon, burger
                    sauce, lettuce, tomato, gourmet burger bun<br />
                    <h4> Fried Buttermilk Chicken Burger</h4> - $17<br /> Cajun seasoned fried chicken breast, sliced
                    pickles, roasted garlic mayo, iceberg lettuce, gourmet burger bun<br />
                    <h4> Reuben Sandwich on Marble Rye</h4> - $19 <br />Montreal smoked beef, sauerkraut, Swiss cheese,
                    Russian mayo<br />
                    <h4> The Italian </h4> - $17<br /> Capicola, pepper salami, provolone, romesco, pepperoncini,
                    iceberg, grilled focaccia<br />
                    <h4>Signature Ramen</h4> - $16<br /> Chicken & Pork broth, chashu pork belly, 6 min. egg, tare, baby
                    bok choy, scallions, nori, chili oil<br />
                    <h4> Karaage Chicken or Salmon Rice Bowl</h4> - $22<br /> Jasmine rice, cucumber, pickled shallot,
                    bok choy, sesame mayo, edamame, togarashi, Ponzu<br />
                    <h4> Braised Lamb Pappardelle </h4> - $24<br /> Castelvetrano olives, goat cheese, basil, focaccia
                    bread
                    <br />
                    <h4> Lois Lake Steelhead Filet</h4> - $29<br /> Pistachio crusted, maple butter, pomegranate
                    reduction, Yukon gold potato puree, charred Brussels sprouts 10 oz<br />
                    <h4> Frenched Pork Chop</h4> - $33<br /> Warm fingerling potato salad, grainy Dijon, apple butter,
                    sambal roasted green beans 6 oz<br />
                    <h4> Top Sirloin Steak</h4> - $31<br /> Peppercorn crust, confit fingerling potato, cauliflower
                    puree, herb oil, roasted beets, Cognac cream 10 oz<br />
                    <h4> Ribeye</h4> - $39<br /> Yukon gold potato puree, garlic kale, chimmichurri Handhelds served
                    with your choice of fries or green salad
                    <br />
                    <h2> DESSERTS</h2>
                    <h4> Italian Tiramisu (V)</h4> - $9<br /> Espresso, cocoa, mascarpone, whipped vanilla custard, lady
                    finger biscuits, marsala<br />
                    <h4> Vanilla Crème Brulée (V/GF)</h4> - $8<br />
                    <h4> Dark Chocolate Pistachio Brownie (V)</h4> - $10<br /> Served warm, vanilla ice cream, caramel
                    <br />
                    <h4>Baked Cheesecake (V)</h4> - $8<br />
                    <h4> Vanilla Bean Ice Cream (V/GF)</h4> - $8<br />Fresh Berries
            </div>
        </div>
    </div>
    <div class=" dining_book ">
        <div class="column ">
            <br><h1>Make a Reservation</h1>
            <div class='reservation'>
                <?php 
                if (isset($_SESSION['username']))
                    echo "<div class='card'>";
                else echo "<div class='card' style='box-shadow: none;'>"
                ?>
                
                <?php 
            if (isset($_SESSION['username'])) {
                    echo "<section class='ftco-section'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='content w-100'>
                                        <div class='calendar-container'>
                                            <div class='calendar'>
                                                <div class='year-header'>
                                                    <span class='left-button fa fa-chevron-left' id='prev'> </span>
                                                    <span class='year' id='label'></span>
                                                    <span class='right-button fa fa-chevron-right' id='next'> </span>
                                                </div>
                                                <table class='months-table w-100'>
                                                    <tbody>
                                                        <tr class='months-row'>
                                                            <td class='month'>Jan</td>
                                                            <td class='month'>Feb</td>
                                                            <td class='month'>Mar</td>
                                                            <td class='month'>Apr</td>
                                                            <td class='month'>May</td>
                                                            <td class='month'>Jun</td>
                                                            <td class='month'>Jul</td>
                                                            <td class='month'>Aug</td>
                                                            <td class='month'>Sep</td>
                                                            <td class='month'>Oct</td>
                                                            <td class='month'>Nov</td>
                                                            <td class='month'>Dec</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table class='days-table w-100'>
                                                    <td class='day'>Sun</td>
                                                    <td class='day'>Mon</td>
                                                    <td class='day'>Tue</td>
                                                    <td class='day'>Wed</td>
                                                    <td class='day'>Thu</td>
                                                    <td class='day'>Fri</td>
                                                    <td class='day'>Sat</td>
                                                </table>
                                                <div class='frame'>
                                                    <table class='dates-table w-100'>
                                                        <tbody class='tbody'>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class='card'>
                    <div class='chosen-wrapper' data-js='custom-scroll'>
                        <select class='chosen-select' data-placeholder='Select Time'>
                            <option></option>
                            <option>7:00 AM</option>
                            <option>7:30 AM</option>
                            <option>8:00 AM</option>
                            <option>8:30 AM</option>
                            <option>9:00 AM </option>
                            <option>9:30 AM</option>
                            <option>10:00 AM</option>
                            <option>10:30 AM</option>
                            <option>11:00 AM</option>
                            <option>11:30 AM</option>
                            <option>12:00 PM</option>
                            <option>12:30 PM</option>
                            <option>1:00 PM</option>
                            <option>1:30 PM</option>
                            <option>2:00 PM</option>
                            <option>2:30 PM</option>
                            <option>3:00 PM </option>
                            <option>3:30 PM</option>
                            <option>4:00 PM</option>
                            <option>4:30 PM</option>
                            <option>5:00 PM</option>
                            <option>5:30 PM</option>
                            <option>6:00 PM</option>
                            <option>6:30 PM</option>
                            <option>7:00 PM </option>
                            <option>7:30 PM</option>
                            <option>8:00 PM</option>
                            <option>8:30 PM</option>
                            <option>9:00 PM</option>
                            <option>9:30 PM</option>
                            <option>10:00 PM </option>
                        </select>
                    </div>
                    <div class='chosen-wrapper chosen-wrapper--style2' data-js='custom-scroll'>
                        <select class='chosen-select' data-placeholder='Select People'>
                            <option></option>
                            <option>1 Person</option>
                            <option>2 People</option>
                            <option>3 People</option>
                            <option>4 People</option>
                            <option>5 People </option>
                            <option>6 People</option>
                            <option>7 People</option>
                            <option>8 People</option>
                            <option>9 People</option>
                            <option>10 People</option>
                        </select>
                    </div>
                    
                        <button onclick='reserve()'>Reserve</button>
                    
                    <div id='snackbar'>Your seat is reserved.</div>
                        ";
        } else {
            echo "
            <div class='container' style='height: 220px;'>
                <center><h2>Become a member to book</h2></center>  </br>
                <a href='register.php'><button>Sign Up</button><br><br></a>
                <a href='login.php'><button>Log In</button></a>
            </div>";
        }
        ?></div>
        </div>
        </div>
        <div class="column ">
            <img src="images/dining_book.jpg " alt="Book">
        </div>
    </div>
    <div class="dining_info ">
        <div class="column ">
            <img src="images/dining_info.jpg " alt="Time">
        </div>
        <div class="column ">
            <h1>Covid Precautions</h1>
            <img src="images/health_icon.png" alt="Health" style="margin-top:50px; width: 10%;" />
            <p>
                During this COVID-19 pandemic times, the priority of our guests and members is #1. People dining in our
                place are required to keep their proof of vaccination with them. The proof/masks are not mandatory but
                encouraged to stop any spread of the virus at
                our premises. We have taken steps to reduce the risk of COVID-19 transmission, but we ask for each and
                everyone's cooperation in the matter.
            </p>
            <p>We also encourage everyone to wear their masks if you are not actively eating. Tables and chairs are
                spread out, wiped and sanitized for your safety. Seats are limited because of this reason and some seats
                are available for pre-book (must
                be done before an hour).</p>
            <p>Hope you enjoy the foot at The Country Club Restaurant.</p>
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
    <script>
        function reserve(){
            var time = document.querySelector(".chosen-wrapper div a.chosen-single span").innerHTML;
            var people=document.querySelector(".chosen-wrapper.chosen-wrapper--style2 div a.chosen-single span").innerHTML;
            if(time=="Select Time"){
                document.querySelector("#snackbar").innerHTML="Please select time";
                snackBar();
            }else if(people=="Select People"){
                document.querySelector("#snackbar").innerHTML="Please select number of people";
                snackBar();
            }else{
                snackBar();
                var year=document.querySelector("span.year").innerHTML;
                var month=document.querySelector("td.month.active-month").innerHTML.toUpperCase();
                var date=document.querySelector("td.table-date.active-date").innerHTML;
                if(month=="JAN"){
                    month='01';
                }else if(month=="FEB"){
                    month='02';
                }else if(month=="MAR"){
                    month='03';
                }else if(month=="APR"){
                    month='04';
                }else if(month=="MAY"){
                    month='05';
                }else if(month=="JUN"){
                    month='06';
                }else if(month=="JUL"){
                    month='07';
                }else if(month=="AUG"){
                    month='08';
                }else if(month=="SEP"){
                    month='09';
                }else if(month=="OCT"){
                    month='10';
                }else if(month=="NOV"){
                    month='11';
                }else if(month=="DEC"){
                    month='12';
                }
                people=people.split(" ")[0];
                // $_POST['time']=time;
                // $_POST['num_of_people']=people;
                // $_POST['date']=year+"-"+month+"-"+date;
                
                date = year + "-" + month + "-" + date;
                formattedTime = (new Date(date + " " + time)).toLocaleTimeString('en-GB').slice(0, -3);

                $.ajax({
                    type: "GET",
                    url: "dining.php",
                    data: {
                        time: formattedTime,
                        num_of_people: parseInt(people),
                        date: date
                    },
                    success: (response) => {
                        // alert(response);
                    }
                });
            }
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="js/selectionbox_script.js"></script>
    <script src="js/jquery.min.js "></script>
    <script src="js/main.js "></script>
    

</body>

</html>