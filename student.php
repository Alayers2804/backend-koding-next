<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Please Input Student details</h2>
    <form action="submit.php" method="post">
        <input type="text" name="Student-Name" placeholder="Enter some data" required>
        <button type="submit">Submit</button>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>
