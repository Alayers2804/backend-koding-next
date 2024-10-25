<?php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'mydb';
$user = 'root';
$pass = '';

$db = mysqli_connect($host, $user, $pass, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>