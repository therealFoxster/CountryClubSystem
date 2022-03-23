<?php require 'db_config.php';

    __insert_into_table("Test", [1234, "John", "Doe", "Test", 8888]);
    println(md5("admin"));

    ############################
    ##### Public functions #####
    ############################
    
    # Add membership
    # TODO

    /**
     * add_manager()
     * 
     * Insert a manager to the Manager table
     * 
     * @param fname  First name
     * @param lname  Last name
     * @param mname  Middle name (optional & nullable)
     * @param dob  Date of birth
     * @param email  Email
     * @param phone  Phone number (nullable)
     * @param address  Address (nullable)
     * @param date_joined  Date joined
     * @param title  Manager's title
     * @param super_manager_id  ID of the manager managing this manager (nullable)
     * @param username  Username
     * @param password  MD5 hash of the password (use builtin php function md5())
     */
    function add_manager(string $fname, string $lname, string $mname, $dob, string $email, $phone, string $address, $date_joined, string $title, int $super_manager_id, string $username, string $password) {
        __add_user($username, $password, 1);
        __insert_into_table("Manager", [$fname, $lname, $mname, $dob, $email, $phone, $address, $date_joined, $title, $super_manager_id]);
    }

    function remove_manager($username) {

    }

    #############################
    ##### Private functions #####
    #############################

    function __add_user(string $username, string $password, int $is_admin) {
        __insert_into_table("User", [$username, $password, $is_admin]);
    }

    function __insert_into_table(string $table_name, array $values) {
        global $db;
        
        $values_str = "";
        foreach ($values as $value) {
            if (gettype($value) == 'string')
                $values_str .= "'$value'" . ", ";
            else $values_str .= $value . ", ";
        } 
        $values_str = substr($values_str, 0, -2);
        
        // try {
        //     $db->exec("INSERT INTO $table_name VALUES ($values_str)");
        // } catch (PDOException $e) {
        //     println("Unable to insert data to $table_name table: " . $e->getMessage());
        // }
        
        println("INSERT INTO $table_name VALUES ($values_str)");
    }

    function __delete_from_table(string $table_name, string $condition) {
        global $db;

        
    }

?>