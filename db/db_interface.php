<?php require 'config/db_config.php';
    $this_file = basename(__FILE__, ".php") . ".php";

    add_manager("John", "Doe", null, "2021-12-15", "johndoe@email.com", 1234567890, "123 Some Street", date("Y-m-d"), "General manager", null, "johndoe", md5("johndoe"));
    add_employee("Joe", "Dohn", null, "2021-12-15", "joedohn@email.com", 1234567890, "123 Some Street", date("Y-m-d"), "Cashier", null, "joedohn", md5("joedohn"));

    // remove_user("johndoe");
    // remove_manager(0);

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
     * @param  string $dob  The manager's date of birth (format: yyyy-mm-dd; use date("Y-m-d")).
     * @param  string $email  The manager's email.
     * @param  ?int $phone  The manager's phone number (nullable).
     * @param  ?string $address  The manager's address (nullable).
     * @param  string $date_joined  The date that the manager joined.
     * @param  string $title  The manager's title.
     * @param  ?int $super_manager_id  The ID of the manager managing this manager (nullable).
     * @param  string $username  The manager's username.
     * @param  string $password  The manager's MD5 hash of the password (use builtin php function md5()).
     * @return void
     */
    function add_manager(string $fname, string $lname, ?string $mname,  $dob, string $email, ?int $phone, ?string $address, string $date_joined, string $title, ?int $super_manager_id, string $username, string $password) {
        __add_user($username, $password, 2); // $admin_privilege = 2 (full privilege)
        __insert_into_table("Manager", [$fname, $lname, $mname, $dob, $email, $phone, $address, $date_joined, $title, $username, $super_manager_id], "Fname, Lname, MName, DOB, Email, PhoneNumber, Address, DateJoined, Title, Username, SuperManagerId");
    }

    /**
     * Removes a manger from the 'Manager' table using their id 
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
     * @param  string $dob  The employee's date of birth.
     * @param  string $email  The employee's email.
     * @param  ?int $phone  The employee's phone number (nullable).
     * @param  ?string $address  The employee's address (nullable).
     * @param  string $date_joined  The date that the employee joined.
     * @param  string $title  The employee's title.
     * @param  ?int $manager_id  The ID of the manager managing this employee (nullable).
     * @param  string $username  The employee's username.
     * @param  string $password  The employee's MD5 hash of the password (use builtin php function md5()).
     * @return void
     */
    function add_employee(string $fname, string $lname, ?string $mname, $dob, string $email, ?int $phone, ?string $address, $date_joined, string $title, ?int $manager_id, string $username, string $password) {
        __add_user($username, $password, 1);
        __insert_into_table("Employee", [$fname, $lname, $mname, $dob, $email, $phone, $address, $date_joined, $title, $username, $manager_id], "Fname, Lname, MName, DOB, Email, PhoneNumber, Address, DateJoined, Title, Username, ManagerId");
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
        
        println("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");

        try {
            $db->exec("INSERT INTO $table_name ($columns_str) VALUES ($values_str)");
        } catch (PDOException $e) {
            // println("Unable to insert data to table '$table_name': " . $e->getMessage());
            err_log("Unable to insert data to table '$table_name': " . $e->getMessage());
        }
    }

    function __delete_from_table(string $table_name, string $condition) {
        global $db;

        println("DELETE FROM $table_name WHERE $condition");
        
        // try {
            //     $db->exec("DELETE FROM $table_name WHERE $condition");
        // } catch (PDOException $e) {
        //     err_log("Unable to delete row from table '$table_name': $e->getMessage()");
        // }
    }

    function __update_table(string $table_name, $condition, $column, $value) {
        global $db;
        
        if (gettype($value) == "string") 
            $value = "'$value'";

        println("UPDATE $table_name SET $column = $value WHERE $condition");

        // try {
        //     $db->exec("UPDATE $table_name SET $column = $value WHERE $condition");
        // } catch (PDOException $e) {
            // err_log("Unable to update table '$table_name': $e->getMessage()");
        // }
    }

?>