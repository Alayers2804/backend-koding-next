<?php
include 'config.php';
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>" . $_SESSION['success_message'] . "</p>";
    unset($_SESSION['success_message']); // Clear the message
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
        <h2>
            Student Name <input type="text" name="student_name" placeholder="Enter some data" required>
        </h2>
        <h2>
            Student Age <input type="number" name="student_age" placeholder="Enter some data" required>
        </h2>
        <button type="submit">Submit</button>
    </form>
    <a href="logout.php">Logout</a>
</body>

</html>