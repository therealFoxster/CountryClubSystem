<?php
date_default_timezone_set("America/Vancouver");
$server_url = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "CountryClub";
$setup_script = file_get_contents("config/setup.sql");
$date = date("[M j, o][G:i:s]"); 
$err_log = "./logs/err.log";
$this_file = basename(__FILE__, ".php") . ".php";

error_log("\n", 3, $err_log);

db_init();
$db = db_connect();

// Running setup script
try {
    $db->exec($setup_script);
} catch(PDOException $e) {
    // println("Error while running setup script: $e");
    err_log("Error while running setup script: $e", $this_file);
}

function db_init() {
    global $server_url, $username, $password, $dbname, $this_file;
    
    // println("Connecting to server at $server_url...");
    $connection = new mysqli($server_url, $username, $password);
    if ($connection->connect_error)
        exit("Connection failed: " . $connection->connect_error);
    // println("Connected to server at $server_url.");

    // println("Creating database '$dbname'...");
    $sql = "CREATE DATABASE $dbname";
    if ($connection->query($sql) === TRUE) {
        // println("Created database '$dbname'.");
    } else {
        // println("Database '$dbname' was not created: " . $connection->error); 
        global $date;
        err_log("Database '$dbname' was not created: $connection->error", "db_init() in $this_file");
    } 
}

function db_connect() {
    global $server_url, $username, $password, $dbname, $this_file;
    
    try {
        // println("Connecting to database '$dbname'...");
        $db = new PDO("mysql:host=$server_url;dbname=$dbname", "$username", "$password");
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

function println($line) { print "$line<br>"; }

?>