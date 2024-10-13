<?php
$host = "localhost";
$db = "task_manager";
$user = "root";
$pass = "";

try{
$pdo = new PDO("mysql:host = $host; dbname = $db", $user, $pass);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo 'Connection faild'. $e -> getMessage();
}
?>