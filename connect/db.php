<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loridb";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    // echo "Connected successfully!";
}