<?php require 'config/db_config.php';
$this_file = basename(__FILE__, ".php") . ".php";

############################

############################
##### Public functions #####
############################

############################

###################
##### Manager #####
###################

/**
 * Insert a manager to the 'Manager' table
 * 
 * @param  string $fname  The manager's first name.
 * @param  string $lname  The manager's last name.
 * @param  ?string $mname  The manager's middle name (nullable).
 * @param  string $dob  The manager's date of birth (format: yyyy-mm-dd).
 * @param  string $email  The manager's email.
 * @param  ?int $phone  The manager's phone number (nullable).
 * @param  ?string $address  The manager's address (nullable).
 * @param  string $date_joined  The date that the manager joined (format: yyyy-mm-dd; use date("Y-m-d")).
 * @param  string $title  The manager's title.
 * @param  ?int $super_manager_id  The ID of the manager managing this manager (nullable).
 * @param  string $username  The manager's username.
 * @param  string $password  The manager's MD5 hash of the password (use builtin php function md5()).
 * @return void
 */
function add_manager(string $fname, string $lname, ?string $mname, string $dob, string $email, ?int $phone, ?string $address, string $date_joined, string $title, ?int $super_manager_id, string $username, string $password) {
    __add_user($username, $password, 2); // $admin_privilege = 2 (full privilege)
    __insert_into_table("Manager", [$fname, $lname, $mname, $dob, $email, $phone, $address, $date_joined, $title, $username, $super_manager_id], "FName, LName, MName, DOB, Email, PhoneNumber, Address, DateJoined, Title, Username, SuperManagerId");
}

/**
 * Finds a manager matching the provided username.
 *
 * @param  string $username  The username to search for.
 * @return null  If the manager was not found.
 * @return $manager  An array representing the record of the manager.
 */
function find_manager_with_username($username) {
    if (find_user($username, 0)) // Manager username exists
        if ($manager = __find_record_in_table("Manager", "Username = '$username'"))
            return $manager;
        else return null;
    else return null;
}

/**
 * Finds a manager matching the provided email.
 *
 * @param  string $email  The email to search for.
 * @return null  If the manager was not found.
 * @return $manager  An array representing the record of the manager.
 */
function find_manager_with_email($email) {
    if ($manager = __find_record_in_table("Manager", "Email = '$email'"))
        return $manager;
    else return null;
}

/**
 * Removes a manger from the 'Manager' table using their ID
 * 
 * @param  int $id  The manager's ID.
 * @return void
 */
function remove_manager(int $id) {
    __delete_from_table("Manager", "ManagerId = $id");
}

####################
##### Employee #####
####################

/**
 * Insert an employee to the 'Employee' table
 *
 * @param  string $fname  The employee's first name.
 * @param  string $lname  The employee's last name.
 * @param  ?string $mname  The employee's middle name (nullable).
 * @param  string $dob  The employee's date of birth (format: yyyy-mm-dd).
 * @param  string $email  The employee's email.
 * @param  ?int $phone  The employee's phone number (nullable).
 * @param  ?string $address  The employee's address (nullable).
 * @param  string $date_joined  The date that the employee joined (format: yyyy-mm-dd; use date("Y-m-d")).
 * @param  string $title  The employee's title.
 * @param  ?int $manager_id  The ID of the manager managing this employee (nullable).
 * @param  string $username  The employee's username.
 * @param  string $password  The employee's MD5 hash of the password (use builtin php function md5()).
 * @return void
 */
function add_employee(string $fname, string $lname, ?string $mname, string $dob, string $email, ?int $phone, ?string $address, string $date_joined, string $title, ?int $manager_id, string $username, string $password) {
    __add_user($username, $password, 1); // $admin_privilege = 1 (moderate privilege)
    __insert_into_table("Employee", [$fname, $lname, $mname, $dob, $email, $phone, $address, $date_joined, $title, $username, $manager_id], "FName, LName, MName, DOB, Email, PhoneNumber, Address, DateJoined, Title, Username, ManagerId");
}

/**
 * Finds a employee matching the provided username.
 *
 * @param  string $username  The username to search for.
 * @return null  If the employee was not found.
 * @return $employee  An array representing the record of the employee.
 */
function find_employee_with_username($username) {
    if (find_user($username, 0)) // Employee username exists
        if ($employee = __find_record_in_table("Employee", "Username = '$username'"))
            return $employee;
        else return null;
    else return null;
}

/**
 * Finds a employee matching the provided email.
 *
 * @param  string $email  The email to search for.
 * @return null  If the employee was not found.
 * @return $employee  An array representing the record of the employee.
 */
function find_employee_with_email($email) {
    if ($employee = __find_record_in_table("Employee", "Email = '$email'"))
        return $employee;
    else return null;
}

function find_employees_managed_by(int $manager_id) {
    if ($employees = __find_records_in_table("Employee", "ManagerId = $manager_id"))
        return $employees;
    else return null;
}

/**
 * Removes an employee from the 'Employee' table using their ID
 *
 * @param  int $id  The employee's ID.
 * @return void
 */
function remove_employee(int $id) {
    __delete_from_table("Employee", "EmployeeId = $id");
}

####################
##### Customer #####
####################

/**
 * Insert a customer to the 'Customer' table
 *
 * @param  string $fname  The customer's first name.
 * @param  string $lname  The customer's last name.
 * @param  ?string $mname  The customer's middle name (nullable).
 * @param  ?string $dob  The customer's date of birth (format: yyyy-mm-dd).
 * @param  string $email  The customer's email.
 * @param  ?int $phone  The customer's phone number (nullable).
 * @param  ?string $address  The customer's address (nullable).
 * @param  string $date_joined  The date that the customer joined (format: yyyy-mm-dd; use date("Y-m-d")).
 * @param  ?int $membership_id  The customer's membership (nullable).
 * @param  ?string $member_since  The date the customer became a member (format: yyyy-mm-dd).
 * @param  string $username  The customer's username.
 * @param  string $password  The customer's MD5 hash of the password (use builtin php function md5()).
 * @return void
 */
function add_customer(string $fname, string $lname, ?string $mname, ?string $dob, string $email, ?int $phone, ?string $address, $date_joined, ?int $membership_id, ?string $member_since, string $username, string $password) {
    __add_user($username, $password, 0); // $admin_privilege = 0 (no privilege)
    __insert_into_table("Customer", [$fname, $lname, $mname, $dob, $email, $phone, $address, $date_joined, $membership_id, $member_since, $username], "FName, LName, MName, DOB, Email, PhoneNumber, Address, DateJoined, MembershipId, MemberSince, Username");
}
    
/**
 * Insert a customer to the 'Customer' table (only email is required)
 *
 * @param  string $fname  The customer's first name.
 * @param  string $lname  The customer's last name.
 * @param  ?string $mname  The customer's midle name (nullable).
 * @param  string $email  The customer's email.
 * @param  string $username  The customer's username.
 * @param  string $password  The customer's MD5 hash of the password (use builtin php function md5()).
 * @return void
 */
function add_customer_with_email(string $fname, string $lname, ?string $mname, string $email, string $username, string $password) {
    add_customer($fname, $lname, $mname, null, $email, null, null, date("Y-m-d"), null, null, $username, $password);
}

/**
 * Finds a customer matching the provided username.
 *
 * @param  string $username  The username to search for.
 * @return null  If the customer was not found.
 * @return $customer  An array representing the record of the customer.
 */
function find_customer_with_username($username) {
    if (find_user($username, 0)) // Customer username exists
        if ($customer = __find_record_in_table("Customer", "Username = '$username'"))
            return $customer;
        else return null;
    else return null;
}

/**
 * Finds a customer matching the provided email.
 *
 * @param  string $email  The email to search for.
 * @return null  If the customer was not found.
 * @return $customer  An array representing the record of the customer.
 */
function find_customer_with_email($email) {
    if ($customer = __find_record_in_table("Customer", "Email = '$email'"))
        return $customer;
    else return null;
}

/**
 * Removes a customer from the 'Customer' table using their ID
 *
 * @param  int $id  The customer's ID.
 * @return void
 */
function remove_customer(int $id) {
    __delete_from_table("Customer", "CustomerId = $id");
}

/**
 * Updates a customer from the 'Customer' table using their username
 *
 * @param  string $username  The customer's current username (used for searching).
 * @param  ?string $fname  The customer's updated first name (nullable).
 * @param  ?string $lname  The customer's updated last name (nullable).
 * @param  ?string $email  The customer's updated email (nullable).
 * @param  ?string $phone  The customer's updated phone numer (nullable).
 * @param  ?string $address  The customer's updated address (nullable).
 * @param  ?string $dob  The customer's updated date of birth (nullable).
 * @param  ?string $new_username  The customer's updated username (nullable).
 * @param  ?string $password  The md5 hash of the customer's updated password (nullable).
 * @return void
 */
function update_customer(string $username, ?string $fname = null, ?string $lname = null, ?string $email = null, ?int $phone = null, ?string $address = null, ?string $dob = null, ?string $new_username, ?string $password = null) {
    if ($fname) __update_table("Customer", "Username = '$username'", "FName", $fname);
    if ($lname) __update_table("Customer", "Username = '$username'", "LName", $lname);
    if ($email) __update_table("Customer", "Username = '$username'", "Email", $email);
    if ($phone) __update_table("Customer", "Username = '$username'", "PhoneNumber", $phone);
    if ($address) __update_table("Customer", "Username = '$username'", "Address", $address);
    if ($dob) __update_table("Customer", "Username = '$username'", "DOB", $dob);
    if ($new_username) __update_table("User", "Username = '$username'", "Username", $new_username);
    if ($password) __update_table("User", "Username = '$username'", "Password", $password);
}

################
##### User #####
################

/**
 * Finds a user matching the provided username.
 *
 * @param  string $username  The user name to search for.
 * @param  ?int $admin_priv  The type of user: 0 for customer, 1 for employee, 2 for manager (nullable).
 * @return null  If the user was not found.
 * @return $user  An array representing the record of the user.
 */
function find_user($username, ?int $admin_priv=null) {
    if ($admin_priv !== null)
        $admin_priv = "AND AdminPrivilege = $admin_priv";
    
    if ($user = __find_record_in_table("User", "Username = '$username' $admin_priv"))
        return $user;
    else return null;
}

/**
 *
 * Removes a user from the User table; use this function to remove customer, employee or manager using their username
 * 
 * @param  string $username  The username of the user.
 * @return void
 */
function remove_user(string $username) {
    __delete_from_table("User", "Username = '$username'");
}

function get_admin_priv(string $username) {
    if ($user = find_user($username)) 
        return $user['AdminPrivilege'];
    else return null;
}

######################
##### Restaurant #####
######################

/**
 * Adds a restaurant booking to the database ('RestaurantBooking' table)
 *
 * @param  string $email  The email of the customer (must exist in 'Customer' table).
 * @param  string $date  The date booked for (format: yyyy-mm-dd).
 * @param  ?string $time  The time booked for (format: 24h (from 00:00 to 23:59)) (nullable).
 * @param  ?int $num_guests  The number of guests (nullable).
 * @param  ?string $notes  Any notes related to the booking (nullable).
 * @return void
 */
function add_restaurant_booking(string $email, string $date, ?string $time = null, ?int $num_guests = null, ?string $notes = null) {
    __insert_into_table("RestaurantBooking", [$email, $date, $time, $num_guests, $notes], "CustomerEmail, BookedDate, BookedTime, NumGuests, Notes");
}


/**
 * Finds the number of available seats at for certain time
 *
 * @param  string $time  The time to base the search on (format: hh:mm (24h)).
 * @param  ?string $date  The date to base the search on (nullable)(format: yyyy-mm-dd, default: today's date).
 * @return $seats  The number of available seats.
 */
function avail_seats_for_time(string $time, ?string $date = null) {
    if ($date === null) $date = date("Y-m-d");
    
    $total_seats = 100; $seats = 0;
    $h = intval(explode(":", $time)[0]);

    $hours = [$h - 1, $h, $h + 1];
    foreach ($hours as $hour) {
        $bookings = __find_records_in_table("RestaurantBooking", "BookedTime LIKE '$hour%' AND BookedDate = '$date'");
        foreach ($bookings as $booking) {
            $seats += $booking["NumGuests"];
        }
    }

    return $total_seats - $seats;
}

/**
 * Finds a restaurant booking using a booking ID
 *
 * @param  int $id  The booking ID.
 * @return null  If no booking was found.
 * @return $booking  The array representing the booking.
 */
function find_restaurant_booking_with_booking_id(int $id) {
    if ($booking = __find_record_in_table("RestaurantBooking", "BookingId = $id"))
        return $booking;
    else return null;
}

/**
 * Finds a restaurant booking using a customer's email
 *
 * @param  string $email  The customer's email.
 * @param  string $date  The date booked for (format: yyyy-mm-dd, default: today's date).
 * @return null  If no booking was found.
 * @return $booking  The array representing the booking.
 */
function find_restaurant_booking_with_email(string $email, string $date = null) {
    if ($date === null)
        $date = date("Y-m-d");
    if ($booking = __find_record_in_table("RestaurantBooking", "CustomerEmail = '$email' AND BookedDate = '$date'"))
        return $booking;
    else return null;
}

/**
 *
 * Removes a booking from the 'RestaurantBooking' table using a booking ID
 * 
 * @param  int $id  The booking ID.
 * @return void
 */
function remove_restaurant_booking_with_booking_id(int $id) {
    __delete_from_table("RestaurantBooking", "BookingId = $id");
}

/**
 *
 * Removes a booking from the 'RestaurantBooking' table using a customer's email
 * 
 * @param  string $email  The customer's email.
 * @param  string $date  The date booked for (format: yyyy-mm-dd, default: today's date).
 * @return $r  The number of bookings removed.
 */
function remove_restaurant_booking_with_email(string $email, string $date=null) {
    if (!$date)
        $date = date("Y-m-d");
    
    return __delete_from_table("RestaurantBooking", "CustomerEmail = '$email' AND BookedDate = '$date'");
}

####################
##### Facility #####
####################

function get_facilities() {
    return __find_records_in_table("Facility");
}

function get_facility(int $id) {
    return __find_record_in_table("Facility", "FacilityId = $id");
}

####################
##### TimeSlot #####
####################

function get_time_slots() {
    return __find_records_in_table("TimeSlot");
}
function get_time_slot(int $id) {
    return __find_record_in_table("TimeSlot", "TimeSlotId = $id");
}

###################
##### Booking #####
###################

function add_booking(int $facility_id, string $date, int $time_slot_id, string $username) {
    __insert_into_table("Booking", [$facility_id, $date, $time_slot_id, $username], "FacilityId, Date, TimeSlotId, Username");
}

function get_bookings(?string $date = null, ?int $time_slot_id = null) {
    $condition = "";
    if ($date) $condition .= "Date = '$date'";
    if ($time_slot_id) $condition .= "AND TimeSlotId = $time_slot_id";
    return __find_records_in_table("Booking", "$condition");
}

function remove_booking(int $id) {
    __delete_from_table("Booking", "BookingId = $id");
}

/**
 * TODOs
 * 
 * membership functions
 */

 

#############################

#############################
##### Private functions #####
#############################

#############################

function __add_user(string $username, string $password, int $admin_privilege) {
    __insert_into_table("User", [$username, $password, $admin_privilege]);
}

function __insert_into_table(string $table_name, array $values, $columns_str="") {
    global $db;

    $values_str = "";
    foreach ($values as $value) {
        if (gettype($value) == "string")
            $values_str .= "'$value'" . ", ";
        else {
            if ($value === null)
                $value = "null";
            $values_str .= $value . ", ";
        }
    } 
    $values_str = substr($values_str, 0, -2);

    test_log("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");
    
    try {
        $db->exec("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");
    } catch (PDOException $e) {
        // println("Unable to insert data to table '$table_name': " . $e->getMessage());
        err_log("Unable to insert data to table '$table_name': " . $e->getMessage());
    }
}

function __delete_from_table(string $table_name, string $condition) {
    global $db;

    try {
        $r = $db->exec("DELETE FROM $table_name WHERE $condition");
        return $r;
    } catch (PDOException $e) {
        err_log("Unable to delete row from table '$table_name': $e->getMessage()");
    }

    # Test
    test_log("DELETE FROM $table_name WHERE $condition");
    // println("DELETE FROM $table_name WHERE $condition");
}

function __update_table(string $table_name, $condition, $column, $value) {
    global $db;
    
    if (gettype($value) == "string") 
        $value = "'$value'";

    try {
        $db->exec("UPDATE $table_name SET $column = $value WHERE $condition");
    } catch (PDOException $e) {
        err_log("Unable to update table '$table_name': $e->getMessage()");
    }

    # Test
    test_log("UPDATE $table_name SET $column = $value WHERE $condition");
    // println("UPDATE $table_name SET $column = $value WHERE $condition");
}

function __find_record_in_table(string $table_name, $condition) {
    global $db, $this_file;

    try {
        $q = $db->query("SELECT * FROM $table_name WHERE $condition");
        $r = $q->fetch();

        if (!$r)
            return null;
        else return $r;
        
    } catch (PDOException $e) {
        err_log("Unable to execuate query", "__find_record_in_table() in $this_file");
    }
}

function __find_records_in_table(string $table_name, $condition = "true") {
    global $db, $this_file;

    if (!$condition) $condition = "true";

    try {
        $q = $db->query("SELECT DISTINCT * FROM $table_name WHERE $condition");
        $r = $q->fetchAll();

        if (!$r)
            return null;
        else return $r;
        
    } catch (PDOException $e) {
        err_log("Unable to execuate query", "__find_records_in_table() in $this_file");
    }
}

?>