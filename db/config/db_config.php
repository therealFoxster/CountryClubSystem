<?php
date_default_timezone_set("America/Vancouver");
$server_url = "localhost";
$__username = "root";
$__password = "";
$dbname = "CountryClub";
$setup_script = file_get_contents("db/config/setup.sql");
$date = date("[M j, o][G:i:s]"); 
$err_log = "db/logs/err.log";
$test_log = "db/logs/test.log"; file_put_contents($test_log, ""); # Making test log blank
$this_file = basename(__FILE__, ".php") . ".php";

error_log("\n", 3, $err_log);

db_init();
$db = db_connect();

# Running setup script
try {
    $db->exec($setup_script);
} catch(PDOException $e) {
    err_log("Error while running setup script: $e", $this_file);
} catch(Exception $e) {
    err_log("Error while running setup script: $e", $this_file);
}

# Setting up Time_ table
for ($h = 0; $h < 24; $h++)
    for ($m = 0; $m < 60; $m++)
        try {
            $time_id = date('H:i', strtotime("$h:$m"));
            $db->exec("INSERT IGNORE INTO Time_ VALUES ('$time_id')");
        } catch (PDOException $e) {
            err_log("Error while setting up 'Time_' table: $e", $this_file);
        }

# Setting up Membership table
$memberships = [
    ["Silver", 200],
    ["Gold", 500],
    ["Platinum", 800]
]; 
foreach ($memberships as $membership)
    try {
        $db->exec("INSERT IGNORE INTO Membership (MembershipName, Price) VALUES ('$membership[0]', $membership[1])");
    } catch (PDOException $e) {
        err_log("Error while setting up 'Membership' table: $e", $this_file);
    }

function db_init() {
    global $server_url, $__username, $__password, $dbname, $this_file, $conn;
    
    // println("Connecting to server at $server_url...");
    $connection = new mysqli($server_url, $__username, $__password);
    if ($connection->connect_error)
        exit("Connection failed: " . $connection->connect_error);
    // println("Connected to server at $server_url.");

    // println("Creating database '$dbname'...");
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($connection->query($sql) === TRUE) {
        // println("Created database '$dbname'.");
    } else {
        // println("Database '$dbname' was not created: " . $connection->error); 
        global $date;
        err_log("Database '$dbname' was not created: $connection->error", "db_init() in $this_file");
    }
}

function db_connect() {
    global $server_url, $__username, $__password, $dbname, $this_file;
    
    try {
        // println("Connecting to database '$dbname'...");
        $db = new PDO("mysql:host=$server_url;dbname=$dbname", "$__username", "$__password");
        // println("Connected to database '$dbname'.");
        
        # Sucessfully connected; set error mode
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
    } catch (PDOException $e) {
        // println("Unable to connect to database '$dbname': " . $e->getMessage());
        err_log("Unable to connect to database '$dbname': $e->getMessage()", "db_connect() in $this_file");
    }
}

function err_log($message, $source = "unknown") {
    global $date, $err_log;
    error_log("$date $source: $message \n", 3, $err_log);
}

function test_log($message) {
    global $date, $test_log;
    error_log("$date $message \n", 3, $test_log);
}

function println($line) { print "$line<br>"; }

?>