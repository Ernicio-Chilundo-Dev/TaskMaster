<?php
session_start();
include 'db.php';

if(!isset($_SESSION["user_id"])){
    header("location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $description = $_POST["description"];
    $due_date = $_post["due_post"];
    $user_id = $_SESSION["user_id"];

    $stmt = $pdo -> prepare("INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)");
    if($stmt -> execute([$user_id,$title,$description,$due_date])){
        echo 'Task added sucessfully!';
    }else{
        echo 'Erro: Task could not be added';
    }
}
?>

<form action="" method="post">
    Title: <input type="text" name="title" required>
    Description: <textarea name="description"></textarea>
    Due Date: <input type="date" name="due_date" required>

    <button type="submit">Add Task</button>
</form>
