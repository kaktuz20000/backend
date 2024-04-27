<?php
session_start();
include ("db_connect.php");
$login = $_POST['Login'];
$password = $_POSTI ['password'];
$md5_password = md5($password);
$query = mysqli_query ($db,"SELECT * FROM `users` WHERE `login`='{$login}'");
if (mysqli_num_rows($query)== 0) {
    $_SESSION['user'] = ['nick'=> $login];
    mysqli_query($db, "INSERT INTO `users`(`login`,`passsword`)VALUE(`{$login}`,`{$md5_password}`)");
    header("Location:/user.php");
} else {
    echo("ошибка");
}