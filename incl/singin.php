<?php
session_start();
require_once 'connect.php';

$email = $_POST['e-mail'];
$telephone = $_POST['telephone'];
$pass = md5($_POST['pass']);

$check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE email = '$email' AND telephone = '$telephone' AND password = '$pass' ");

if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    

// Проверка, является ли пользователь администратором
if ($user['note'] == 1) {
    // Пользователь является администратором, переадресация на страницу админки
    $_SESSION['admin'] = true;
    header('Location: ../admin.php');

    exit;
   
}

$_SESSION['prof'] = 'Выйти';
header('Location: ../index.php');
exit;
} else {
$_SESSION['mess'] = 'Введенные данные не верные';
header('Location: ../vhod.php');
exit;
}

?>
