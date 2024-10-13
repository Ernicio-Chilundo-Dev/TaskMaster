<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['userneme'];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $email = $_POST["email"];
}

$stmt = $pdo -> prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
if($stmt -> execute([$username,$password,$email])){
    echo 'User registered sucessfully!';
}else{
    echo "Erro: User could not be registered.";
}
?>

<form action="" method="post">
    Username: <input type="text" name="username" required>
    Passwoerd: <input type="password" name="password" required>
    Email: <input type="email" name="email" required>

    <button type="submit">Register</button>
</form>