<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data'];

    $stmt = $pdo->prepare("INSERT INTO data_table (user_id, data) VALUES (:user_id, :data)");
    $stmt->execute(['user_id' => $_SESSION['user_id'], 'data' => $data]);

    header("Location: dashboard.php");
    exit;
}
?>
