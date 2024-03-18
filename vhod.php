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
    <title>vhod</title>
    <link rel="stylesheet" href="./vhod.css">
</head>
<body>
    <!-- Форма входа -->
    <form action="incl\singin.php" method="post">
        
        <label>Почта</label>
        <input type="email" name="e-mail" placeholder="Введите свой e-mail">
        <label>Телефон</label>
        <input type="text" name="telephone" placeholder="Введите свой номер телефона">
        <label>Пароль</label>
        <input type="password" name="pass" placeholder="Введите свой пароль">
        <button type="submit">Войти</button>

        <p>
            Увас нет аккаунта? - <a href="./reg.php">Зарегестрируйтесь</a>
        </p>
        <!-- ВЫВОД НЕ ПРАВИЛЬНЫЙ ПАРОЛЬ -->
        <?php  
            if (isset($_SESSION ['mess'])){
                echo ' <p class="mesg">' . $_SESSION ['mess'] . '</p>';
            } 
            unset($_SESSION ['mess']);
            ?>

</body>
</html>