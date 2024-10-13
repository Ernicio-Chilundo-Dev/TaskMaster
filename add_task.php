<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$user_id, $title, $description, $due_date])) {
        echo "Task added successfully!";
    } else {
        echo "Error: Task could not be added.";
    }
}
?>

<form method="POST">
    Title: <input type="text" name="title" required>
    Description: <textarea name="description"></textarea>
    Due Date: <input type="date" name="due_date" required>
    <button type="submit">Add Task</button>
</form>