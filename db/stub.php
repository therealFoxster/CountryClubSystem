<?php require 'db_interface.php';
/**
 * Stub to test database functions
 */

    add_manager("John", "Doe", null, "2021-12-15", "johndoe@email.com", 1234567890, "123 Some Street", date("Y-m-d"), "General manager", null, "johndoe", md5("johndoe"));
    add_employee("Joe", "Dohn", null, "2021-12-15", "joedohn@email.com", 1234567890, "123 Some Street", date("Y-m-d"), "Cashier", null, "joedohn", md5("joedohn"));
    add_customer("Some", "User", null, null, "someuser@email.com", null, null, date("Y-m-d"), null, null, "someuser", md5("someuser"));
    add_customer_with_email("New", "User", null, "newuser@email.com", "newuser", md5("newuser"));

    remove_user("johndoe");
    remove_manager(0);

    println(find_user("admin")['PasswordHash']); # Prints password has for user with Username "admin"
    println(find_customer_with_email("newuser@email.com")['FName']); # Prints first of of customer with email "newuser@email.com"

    if ($ok = "Yeet") {
        println($ok);
    }
?>