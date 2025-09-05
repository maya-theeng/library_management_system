<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "lms";

// Create connection
$db_connect = new mysqli($hostname, $username, $password, $db_name);

// Check connection
if ($db_connect->connect_error) {
    die("Connection failed: " . $db_connect->connect_error);
}

// Set charset to utf8mb4
$db_connect->set_charset("utf8mb4");
?>