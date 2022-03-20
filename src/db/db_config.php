<?php
$server_url = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "CountryClub";
$setup_script = file_get_contents("setup.sql");

db_init();
$db = db_connect();

println("$setup_script");

function db_init() {
    global $server_url, $username, $password, $dbname;
    
    println("Connecting to server at $server_url...");
    $connection = new mysqli($server_url, $username, $password);
    if ($connection->connect_error)
        exit("Connection failed: " . $connection->connect_error);
    println("Connected to server at $server_url.");

    println("Creating database '$dbname'...");
    $sql = "CREATE DATABASE $dbname";
    if ($connection->query($sql) === TRUE)
        println("Created database '$dbname'.");
    else println("Database '$dbname' was not created: " . $connection->error); 
}

function db_connect() {
    global $server_url, $username, $password, $dbname;
    
    try {
        println("Connecting to database '$dbname'...");
        $db = new PDO("mysql:host=$server_url;dbname=$dbname", "$username", "$password");
        println("Connected to database '$dbname'.");
        
        # Sucessfully connected; set error mode
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
    } catch (PDOException $e) {
        println("Unable to connect to database '$dbname': " . $e->getMessage());
    }
}

function println($line) {
    print "$line" . "<br>";
}

?>