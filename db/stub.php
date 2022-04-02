<?php require 'db_interface.php';
/**
 * Stub to test database functions
 */
    
    add_manager("John", "Doe", null, "2021-12-15", "johndoe@email.com", 1234567890, "123 Some Street", date("Y-m-d"), "General manager", null, "johndoe", md5("johndoe"));
    add_employee("Joe", "Dohn", null, "2021-12-15", "joedohn@email.com", 1234567890, "123 Some Street", date("Y-m-d"), "Cashier", null, "joedohn", md5("joedohn"));
    add_customer("Some", "User", null, null, "someuser@email.com", null, null, date("Y-m-d"), null, null, "someuser", md5("someuser"));
    add_customer_with_email("New", "User", null, "newuser@email.com", "newuser", md5("newuser"));
    __insert_into_table("Time_", [10]);

    remove_user("johndoe");
    remove_manager(0);

    // add_restaurant_booking("newuser@email.com", date("Y-m-d"), "13:01", 10, null);

    // println(find_restaurant_booking_with_email("newuser@email.com")["BookedDate"]);
    // remove_restaurant_booking_with_booking_id(3);
    println(remove_restaurant_booking_with_email("newuser@email.com"));


    function test(&$str) {
        $str .= "!";
    }
    $str = "Hello";
    test($str);
    println($str);
?>