<?php
session_start();
$connectadm = mysqli_connect('localhost','root','','zoomagaz');

// Проверяем соединение с базой данных
if (mysqli_connect_errno()) {
    echo "Ошибка соединения с базой данных: " . mysqli_connect_error();
    exit();
}

$sql_categories = "SELECT * FROM `сategories`"; // Запрос для получения списка категорий
$result_categories = mysqli_query($connectadm, $sql_categories); // Выполнение запроса

if (!$result_categories) {
    echo "Ошибка запроса категорий: " . mysqli_error($connectadm);
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="./admin.css">
</head>
<body>
<header class="header">
    <?php
    if (isset($_SESSION['admin'])) {
        echo '<button class="button_singup" onclick="document.location=\'./out.php\'">Выйти</button>';
    } else {
        header('Location: index.php');
    }
    ?>

    <button id="open">Добавить товар</button>
    <dialog>

        <form method="post" id="categoryForm" enctype ="multipart/form-data" action="incl\dobav.php">
            <label for="category">Категория:</label>
            <select name="category" id="category" onchange="updateSubcategories()">
                <?php
                // Заполнение списка категорий данными из базы данных
                while ($row = mysqli_fetch_assoc($result_categories)) {
                    $ID = $row['IDcat'];
                    echo "<option value='".$row['IDcat']."'>".$row['Name_Cat']."</option>";
                }
                ?>
            </select>

            <label for="subcategories">Подкатегория:</label>
            <select name="subcategories" id="subcategories">
                <?php if (isset($result_subcategories)): ?>
                    <?php while ($rows = mysqli_fetch_assoc($result_subcategories)): ?>
                        <option value='<?php echo $rows['ID_subcut']; ?>'><?php echo $rows['Name_subcut']; ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>

            <label>Название</label>
            <input type="text" name="Name_prod" placeholder="Введите название товара">
        
            <label>Описание</label>
            <input type="text" name="description" placeholder="Напишите Описание">
        
            <label>Цена</label>
            <input type="number" name="price" placeholder="Укажите цену">
        
            <label>Количество</label>
            <input type="number" name="quantity" placeholder="Количество товара">
        
            <label>Фото товара</label>
            <input type="file" name="photo">
        
            <label>Акция</label>
            <input type="checkbox" name="stocks">
        
            <label>Архив</label>
            <input type="checkbox" name="archive">
        
            <label>На главную страницу</label>
            <input type="checkbox" name="main_page">
        
            <button id="dob" type="submit">Добавить данные</button>

            <?php  
            if (isset($_SESSION ['message'])){
                echo ' <p class="mesg">' . $_SESSION ['message'] . '</p>';
            } 
            // уничтожения сообщения после обновления
            unset($_SESSION ['message']);
            ?>
        </form>

        
        


        <p>
            <button id="close">Закрыть окно</button>
        </p>
    </dialog>
</header>

<script>
    function updateSubcategories() {
        var form = document.getElementById('categoryForm');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_subcategories.php', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('subcategories').innerHTML = xhr.responseText;
            }
        };

        xhr.send(formData);
    }
</script>



<form class = "form_tovar">
<?php
$sql_products = "SELECT * FROM `products`";
$result_products = mysqli_query($connectadm, $sql_products);
    
// Проверяем успешность выполнения запроса
if (!$result_products) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectadm);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>   <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
        </form>




</body>
</html>
<script>
      var dialog = document.querySelector('dialog')
      // выводим модальное окно
      document.querySelector('#open').onclick = function () {
        dialog.showModal()
      }
      // скрываем окно
      document.querySelector('#close').onclick = function () {
        dialog.close() 
      }
     





</script>





