<?php
$host = 'localhost';
$dbname = 'backend-koding-next';
$user = 'root';
$pass = '';

$db = mysqli_connect($host, $user, $pass, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}