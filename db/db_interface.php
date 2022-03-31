<?php require 'config/db_config.php';
    $this_file = basename(__FILE__, ".php") . ".php";

    ############################
    ##### Public functions #####
    ############################
    
    /**
     * TODOs
     * 
     * membership functions
     */

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
     * Removes a manger from the 'Manager' table using their ID
     * 
     * @param  int $id  The manager's ID.
     * @return void
     */
    function remove_manager(int $id) {
        __delete_from_table("Manager", "ManagerId = $id");
    }
    
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
     * Removes an employee from the 'Employee' table using their ID
     *
     * @param  int $id  The employee's ID.
     * @return void
     */
    function remove_employee(int $id) {
        __delete_from_table("Employee", "EmployeeId = $id");
    }
    
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
        $user = find_user($username, 0);
        if (!$user)
            return null;
        else {
            $customer = __find_record_in_table("Customer", "Username = '$username'");
            if (!$customer)
                return null;
            else return $customer;
        }
    }

    /**
     * Finds a customer matching the provided email.
     *
     * @param  string $email  The email to search for.
     * @return null  If the customer was not found.
     * @return $customer  An array representing the record of the customer.
     */
    function find_customer_with_email($email) {
        $customer = __find_record_in_table("Customer", "Email = '$email'");
        if (!$customer)
            return null;
        else return $customer;
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
     * Finds a user matching the provided username.
     *
     * @param  string $username  The user name to search for.
     * @param  ?int $admin_priv  The type of user: 0 for customer, 1 for employee, 2 for manager (nullable).
     * @return null  If the user was not found.
     * @return $user  An array representing the record of the user.
     */
    function find_user($username, $admin_priv=null) {
        if ($admin_priv !== null)
            $admin_priv = "AND AdminPrivilege = $admin_priv";
        
        $user = __find_record_in_table("User", "Username = '$username' $admin_priv");
        if (!$user)
            return null;
        else return $user;
    }

    /**
     *
     * Removes a user from the User table; use this function to remove customer, employee or manager using their username
     * 
     * @param  string $username  The username of the user.
     */
    function remove_user(string $username) {
        __delete_from_table("User", "Username = '$username'");
    }



    #############################
    ##### Private functions #####
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

        try {
            $db->exec("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");
        } catch (PDOException $e) {
            // println("Unable to insert data to table '$table_name': " . $e->getMessage());
            err_log("Unable to insert data to table '$table_name': " . $e->getMessage());
        }

         # Test
         test_log("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");
        //  println("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");
    }

    function __delete_from_table(string $table_name, string $condition) {
        global $db;

        try {
            $db->exec("DELETE FROM $table_name WHERE $condition");
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

?>