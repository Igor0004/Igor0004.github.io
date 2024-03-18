<?php
session_start();
if(isset($_SESSION['prof'])) {
    header('Location: ./index.php');
    exit; // Важно завершить выполнение скрипта после перенаправления
}
if(isset($_SESSION['admin'])) {
    header('Location: ./admin.php');
    exit; // Важно завершить выполнение скрипта после перенаправления
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reg</title>
    <link rel="stylesheet" href="./vhod.css">
</head>
<body>
    <!-- Форма регистраций -->
    <form action="incl\singup.php" method="post">
        <label >ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое ФИО">
        <label >Почта</label>
        <input type="email" name="e-mail" placeholder="Введите свой e-mail">
        <label>Телефон</label>
        <input type="text"  name="telephone" placeholder="Введите свой номер телефона">
        <label>Адрес</label>
        <input type="text"  name="adres" placeholder="Введите свой адрес">
        <label>Пароль</label>
        <input type="password"  name="pass" placeholder="Введите свой пароль">
        <label>Подтверждение пароля</label>
        <input type="password"  name="pass_conf" placeholder="Повторите свой пароль">
        <button type="submit">Зарегестрироваться</button>

        <p>
            У вас уже есть аккаунт? - <a href="./vhod.php">Войти</a>
        </p>
    <!-- ВЫВОД НЕ ПРАВИЛЬНЫЙ ПАРОЛЬ -->
            <?php  
            if (isset($_SESSION ['message'])){
                echo ' <p class="mesg">' . $_SESSION ['message'] . '</p>';
            } 
            // уничтожения сообщения после обновления
            unset($_SESSION ['message']);
            ?>
        

</body>
</html>