<?php
$servername = "sql5c0f.megasqlservers.com";
$username = "loriholste698934";
$password = "Lori007$";
$dbname = "ul_loriholste698934";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    // echo "Connected successfully!";
}