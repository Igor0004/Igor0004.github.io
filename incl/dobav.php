<?php


session_start();
// Подключаемся к базе данных
require_once 'connect.php';

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, существуют ли необходимые поля в массиве $_POST
    if (isset($_POST['Name_prod'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['subcategories'])) {
        // Получаем данные из формы
        $name = $_POST['Name_prod'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $subcategories = $_POST['subcategories'];

        // Проверяем, было ли выбрано поле "Акция" и присваиваем соответствующее значение
        $stocks = isset($_POST['stocks']) ? 1 : 0;
        // Проверяем, было ли выбрано поле "Архив" и присваиваем соответствующее значение
        $archive = isset($_POST['archive']) ? 1 : 0;
        // Проверяем, было ли выбрано поле "На главную страницу" и присваиваем соответствующее значение
        $main_page = isset($_POST['main_page']) ? 1 : 0;

        // Обработка загруженного изображения
        if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/'. time() . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], '../'.$uploadDir);
        }
        
        // Проверяем, заполнены ли все обязательные поля
        if (!empty($name) && !empty($description) && !empty($price) && !empty($quantity) && !empty($subcategories)) {
            // Вставляем данные в базу данных
            $dobav = mysqli_query($connect, "INSERT INTO `products` (`ID_subcut`, `Name_prod`, `description`, `price`, `quantity`, `stocks`, `archive`, `main_page`, `photo`) VALUES ('$subcategories ', '$name', '$description', '$price', '$quantity', '$stocks', '$archive', '$main_page', '$uploadDir')");      
            if ($dobav) {
                $_SESSION['admin'] = true;
                header('Location: ../admin.php');
                exit(); // Добавляем exit() после перенаправления, чтобы прекратить выполнение кода
            } 
        } else {
            $_SESSION['message'] = 'Не все обязательные поля заполнены.';
            header('Location: ../admin.php');
        }
    } else {
        $_SESSION['message'] = 'Не все обязательные поля заполнены.';
        header('Location: ../admin.php');
    }
} else {
    $_SESSION['message'] = 'Данные не были отправленны';
    header('Location: ../admin.php');
}
