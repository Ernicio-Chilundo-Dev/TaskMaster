<?php
session_start();
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo -> prepare("SELECT * FROM users WHERE username = ?");
    $stmt -> execute([$username]);
    $user = $stmt -> fetch();

    if($user && password_verify($password,$user["password"])){
        $_SESSION['user_id']= $user["id"];
        echo "Login sucessfully!";
    }else{
        echo "Invalid Username or Password.";
    }
}

?>

<form action="" method="post">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>