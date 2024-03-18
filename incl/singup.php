<?php
session_start();
require_once 'connect.php';


    $full_name = $_POST['full_name'];
    $email = $_POST['e-mail'];
    $telephone = $_POST['telephone'];
    $adres = $_POST['adres'];
    $pass = $_POST['pass'];
    $pass_conf = $_POST['pass_conf'];
// Проверка на пароли
    if($pass === $pass_conf ){
        $pass = md5($pass);
        mysqli_query($connect, "INSERT INTO `user` (`IDuser`, `fullname`, `email`, `telephone`, `address`, `password`, `note`) VALUES (NULL, '$full_name', '$email', '$telephone', '$adres', '$pass', NULL)");

header('Location: ../vhod.php');

    } else{
        // начало сесии в случае не совпадения паролей
        $_SESSION['message'] = 'Пароли не совпадают'; 
        // переодресация на стр рег. в случае не правельных паролей
        header('Location: ../reg.php');

    }
?>
