<?php
include 'config.php';
session_start();

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $student_age = $_POST['student_age'];

    try {
        // Prepare and bind using mysqli
        $stmt = $db->prepare("INSERT INTO students (student_name, student_age) VALUES (?, ?)");
        $stmt->bind_param("si", $student_name, $student_age); // "si" means string, integer
        $stmt->execute();

        $_SESSION['success_message'] = "Data inserted successfully!";

        header("Location: student.php");
        echo "Data inserted successfully.";
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    } 
}

