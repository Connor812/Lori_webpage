<?php
session_start();
require_once "../connect/db.php";


$allSuperglobals = [];

$allSuperglobals = [];

$superglobals = [
    '$_POST' => $_POST,
    '$_SESSION' => $_SESSION
];

foreach ($superglobals as $superglobalName => $superglobalValue) {
    $allSuperglobals[$superglobalName] = $superglobalValue;
}

print_r($allSuperglobals);