<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
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
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    body {
        font-family: Helvetica;
        -webkit-font-smoothing: antialiased;
        background: #f1f3f6;

    }

    h2 {
        text-align: center;
        font-size: 28px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #324960;
        padding: 10px 0;
    }


    .navbar {
        display: flex;
        min-width: 800px;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        padding: 0 20px;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.8);
        border-radius: 20px;
        margin: 30px;
    }


    .navbar a {

        float: left;
        color: darkgray;
        text-align: center;
        padding: 20px 10px;
        text-decoration: none;
        font-size: 18px;
        transition: 0.3s;
    }

    .navbar a:hover {
        font-size: 20px;
        color: black;

    }

    .navbar .con-logo {
        width: 100px;
    }


    .navbar .con-btns {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .navbar button {
        padding: 12px 30px;
        color: #fff;
        background: #000;
        border: 0;
        outline: none;
        border-radius: 18px;
        cursor: pointer;
        margin-left: 10px;
    }

    .adduser {
        width: 380px;
        height: 390px;
        position: relative;
        margin: 5% auto;
        background: white;
        box-shadow: 0 0 10px gray;
        padding: 5px;
        border-radius: 30px;
        overflow: hidden;
    }

    .input-field {

        padding: 10px 10px;
        margin: 20px 50px;
        width: 70%;
        border-bottom: 1px solid #999;
        border-top: 0;
        border-right: 0;
        border-left: 0;
        background: transparent;
        outline: none;


    }

    .input-label {
        font-size: 20px;
        padding: 20px 20px;
        margin: 20px 25px;
        width: 50%;


    }

    .fl-table {
        border-radius: 5px;
        font-size: 20px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;

    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 20px 8px;
    }

    .fl-table th {
        color: #ffffff;
        background: #324960;
        padding: 20px 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 15px;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /*        search box css*/
    form.search input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.search button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #999;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.search button:hover {
        background: #324960;
    }

    form.search::after {
        content: "";
        clear: both;
        display: table;
    }

    div {
        display: none;
    }

    div:target {
        display: block;
    }
    </style>
</head>

<body>

    <div class="navbar">



        <a href="#resBookings" role="tab" data-toggle="list" aria-controls="home">Resturant Bookings</a>
        <a href="#event" role="tab" data-toggle="list" aria-controls="home">Event Bookings</a>
        <a href="#gulf" role="tab" data-toggle="list" aria-controls="home">Gulf Course Bookings</a>
        <a href="#user">User Details</a>



        <div class="con-btns">
            <button onclick="javascript:logout()">Logout</button>

        </div>
        <script>
        function logout() {
            location.href = "admin.html";

        }
        </script>


    </div>
    <!--        BOOKING LIST-->

    <div id="resBookings">
        <center>
            <h2>Restaurant BOOKING </h2>
        </center>

        <form class="search" method="post" style='float:right'>
            <input type="text" placeholder="Search.." name="name" />
            <button type="submit" name='room'><i class="fa fa-search"></i></button>
        </form>

        <table class="fl-table">
            <tr>
                <th>S No</th>
                <th>User Email</th>
                <th>date</th>
                <th>time</th>
                <th>No Guest</th>
                <th>note</th>
            </tr>
            <?php
//        session_start();
        $count=0;
        $con=mysqli_connect('localhost','root','','');
                  
if(isset($_POST['RestaurantBooking'])){
    $email=$_POST['email'];
   
    $sql=" SELECT * FROM RestaurantBooking WHERE email like '%".$email."%' OR Name like '%".$email."%' OR Type like '%".$email."%'";
    $num=mysqli_query($con,$sql);
}
else{
     $sql="select * from RestaurantBooking ";
    $num=mysqli_query($con,$sql);
}
        // if(mysqli_num_rows($num)>0)
        // {
        // while($row=mysqli_fetch_assoc($num))
        // {
        // $count = $count+1;
        ?>

            <tr>
                <td><?php echo $count?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['no Geust'];?></td>
                <td><?php echo $row['note'];?></td>



                <td>

                    <!-- <?php /* if($row['Status'] == '0' ){ echo"cancelled" ;?>
        <?php } else if($row['Status']=='1'){ echo"Granted" ;?>
        <?php } else if($row['Status']=='paid'){ echo"paid" ;?>

        <?php  } else if ($row['Status']=='Pending'){ ?> <form method="POST" action='status1.php'>
        <input type='hidden' name='SNo' value='<?php echo $row['SNo'] ?>'/> 
        <input type='hidden' name='Type' value='<?php echo $row['Type'] ?>'/> 
        <input type='hidden' name='ID' value='<?php echo $row['ID'] ?>'/> 
        <input type='hidden' name='Name' value='<?php echo $row['Name'] ?>'/> 
        <input class='btn-acc'type='submit' name='accept' value='Accept' />
        <input  class='btn' type='submit' name='reject' value='Reject' /></form>
        <?php  } else { echo"Cancelled by user";  } */?> -->
                    <!--            0-admin cancel ,1-admin accept , pending-processing ,cancel-cancel by user-->

                </td>
                <!--       0-admin cancel ,1-admin accept , pending-processing ,cancel-cancel by user-->
                <?php
        // }
        // }      
        // else 
        // {
        // ?>
                //
            <tr>
                <td colspan="11" style='color:red;'>No Resturant Reservation </td>
            </tr>
            // <?php
        // }
        ?>
        </table>


    </div>

    <!--EVENT BOOKING LIST-->
    <div id="event">
        <center>
            <h2>Event Booking</h2>
        </center>

        <form class="search" method="post" style='float:right'>
            <input type="text" placeholder="Search.." name="name" />
            <button type="submit" name='event'><i class="fa fa-search"></i></button>
        </form>
        <table class="fl-table">
            <tr>
                <th>S No</th>
                <th>Username</th>
                <th>FirtName</th>
                <th>LastName</th>
                <th>email</th>
                <th>phone</th>
                <th>address</th>
                <th>DOB</th>
                <th>Updated Username</th>
                <th>Password</th>

            </tr>
            <?php
                    // session_start();
                    $count=0;
                    $con=mysqli_connect('localhost','root','','');
//                    $query="select * from events";
//                    $num=mysqli_query($con,$query);
                               
if(isset($_POST['RestaurantBooking'])){
    $email=$_POST['email'];
   
     $sql=" SELECT * FROM RestaurantBooking WHERE email like '%".$email."%' OR Name like '%".$email."%' OR Type like '%".$email."%'";
    $num=mysqli_query($con,$sql);
}
else{
     $sql="select * from RestaurantBooking";
    $num=mysqli_query($con,$sql);
}
                    // if(mysqli_num_rows($num)>0)
                    // {
                    // while($row=mysqli_fetch_assoc($num))
                    // {
                    // $count = $count+1;}}
                    ?>

            <tr>
                <td><?php echo $count?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['no Geust'];?></td>
                <td><?php echo $row['note'];?></td>




        </table>


    </div>

    <!--        BOOKING LIST-->

    <div id="resBookings">
        <center>
            <h2>Restaurant BOOKING </h2>
        </center>

        <form class="search" method="post" style='float:right'>
            <input type="text" placeholder="Search.." name="name" />
            <button type="submit" name='room'><i class="fa fa-search"></i></button>
        </form>

        <table class="fl-table">
            <tr>
                <th>S No</th>
                <th>User Email</th>
                <th>date</th>
                <th>time</th>
                <th>No Guest</th>
                <th>note</th>
            </tr>
            <?php
//        session_start();
        $count=0;
        $con=mysqli_connect('localhost','root','','');
                  
if(isset($_POST['RestaurantBooking'])){
    $email=$_POST['email'];
   
    $sql=" SELECT * FROM RestaurantBooking WHERE email like '%".$email."%' OR Name like '%".$email."%' OR Type like '%".$email."%'";
    $num=mysqli_query($con,$sql);
}
else{
     $sql="select * from RestaurantBooking ";
    $num=mysqli_query($con,$sql);
}
        // if(mysqli_num_rows($num)>0)
        // {
        // while($row=mysqli_fetch_assoc($num))
        // {
        // $count = $count+1;
        ?>

            <tr>
                <td><?php echo $count?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['no Geust'];?></td>
                <td><?php echo $row['note'];?></td>



                <td>

                    <!-- <?php /* if($row['Status'] == '0' ){ echo"cancelled" ;?>
        <?php } else if($row['Status']=='1'){ echo"Granted" ;?>
        <?php } else if($row['Status']=='paid'){ echo"paid" ;?>

        <?php  } else if ($row['Status']=='Pending'){ ?> <form method="POST" action='status1.php'>
        <input type='hidden' name='SNo' value='<?php echo $row['SNo'] ?>'/> 
        <input type='hidden' name='Type' value='<?php echo $row['Type'] ?>'/> 
        <input type='hidden' name='ID' value='<?php echo $row['ID'] ?>'/> 
        <input type='hidden' name='Name' value='<?php echo $row['Name'] ?>'/> 
        <input class='btn-acc'type='submit' name='accept' value='Accept' />
        <input  class='btn' type='submit' name='reject' value='Reject' /></form>
        <?php  } else { echo"Cancelled by user";  } */?> -->
                    <!--            0-admin cancel ,1-admin accept , pending-processing ,cancel-cancel by user-->

                </td>
                <!--       0-admin cancel ,1-admin accept , pending-processing ,cancel-cancel by user-->
                <?php
        // }
        // }      
        // else 
        // {
        // ?>
                //
            <tr>
                <td colspan="11" style='color:red;'>No Resturant Reservation </td>
            </tr>
            // <?php
        // }
        ?>
        </table>


    </div>

    <!--Gulf BOOKING LIST-->
    <div id="gulf">
        <center>
            <h2>Gulf Cource</h2>
        </center>

        <form class="search" method="post" style='float:right'>
            <input type="text" placeholder="Search.." name="name" />
            <button type="submit" name='event'><i class="fa fa-search"></i></button>
        </form>
        <table class="fl-table">
            <tr>
                <th>S No</th>
                <th>Username</th>
                <th>FirtName</th>
                <th>LastName</th>
                <th>email</th>
                <th>phone</th>
                <th>address</th>
                <th>DOB</th>
                <th>Updated Username</th>
                <th>Password</th>

            </tr>
            <?php
                    // session_start();
                    $count=0;
                    $con=mysqli_connect('localhost','root','','');
//                    $query="select * from events";
//                    $num=mysqli_query($con,$query);
                               
if(isset($_POST['RestaurantBooking'])){
    $email=$_POST['email'];
   
     $sql=" SELECT * FROM RestaurantBooking WHERE email like '%".$email."%' OR Name like '%".$email."%' OR Type like '%".$email."%'";
    $num=mysqli_query($con,$sql);
    
}
else{
     $sql="select * from RestaurantBooking";
    $num=mysqli_query($con,$sql);
}
                    // if(mysqli_num_rows($num)>0)
                    // {
                    // while($row=mysqli_fetch_assoc($num))
                    // {
                    // $count = $count+1;}}
                    ?>

            <tr>
                <td><?php echo $count?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['no Geust'];?></td>
                <td><?php echo $row['note'];?></td>




        </table>


    </div>


    <!--        SIGN UP TABLE-->
    <div id="user">

        <form class="search" method="post" style='float:right'>
            <input type="text" placeholder="Search.." name="name" />
            <button type="submit" name='user'><i class="fa fa-search"></i></button>
        </form>

        <table class="fl-table">
            <tr>
                <th>Sno</th>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>

            </tr>
            <?php
    // session_start();
    $count=0;
    $con=mysqli_connect('localhost','root','','');
//         $sql="SELECT * FROM signup";
//    $num=mysqli_query($con,$sql);
        
if(isset($_POST['Customer'])){
    $username=$_POST['username'];
   
    $sql=" SELECT * FROM Customer WHERE username like '%".$username."%' OR email like '%".$username."%'";
//      $sql="SELECT * FROM signup";
    $num=mysqli_query($con,$sql);
}
else{
     $sql="SELECT * FROM Customer";
    $num=mysqli_query($con,$sql);
}
    // if(mysqli_num_rows($num)>0)
    // {
    // while($row=mysqli_fetch_assoc($num))
    // {
    // $count = $count+1;
    ?>

            <tr>
                <td><?php echo $count?></td>

                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['password'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phoneno'];?></td>
                <td>
                    <form action="" method="post">
                        <input type='hidden' name='ID' value='<?php echo $row['username'] ?>' />
                        <input class='btn' type='submit' name='delete' value='Delete' />
                    </form>
                </td>
                <?php //} ?>

            </tr>
        </table> <?php //} ?>





    </div>




</body>
<?php
    if (isset($_POST['delete']) || isset($_POST['delete']))
    {
    $id = $_POST['ID'];
    $query="DELETE FROM signup WHERE ID ='$id'";
    $data=mysqli_query($con,$query);

    if($data)
    {

    echo"<script>window.alert('RECORD IS DELETED FROM DATABASE')</script>";
    ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/new/admin.php#user" />
<?php
    }
    else
    {
    echo"<script>window.alert('FAILED TO DELETED THE RECORD FROM DATABASE')</script>";	
    }
    }
    ?>

</html>