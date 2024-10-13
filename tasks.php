<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$tasks = $stmt->fetchAll();

foreach ($tasks as $task) {
    echo "Title: " . $task['title'] . "<br>";
    echo "Description: " . $task['description'] . "<br>";
    echo "Due Date: " . $task['due_date'] . "<br>";
    echo "Status: " . $task['status'] . "<br><br>";
}
