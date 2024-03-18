<?php
session_start();
$connectinx = mysqli_connect('localhost','root','','zoomagaz');

// Проверяем соединение с базой данных
if (mysqli_connect_errno()) {
    echo "Ошибка соединения с базой данных: " . mysqli_connect_error();
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="./index2.css">
</head>
<body>
    <header class="header">
            <div class = "logo">
    <img src="photo slider/logojpg.jpg" class = "logo_photo">
        <p id = "push">Пушистик</p>
            </div>
    <?php
        
        if (isset($_SESSION['prof'])) {
            echo '<button class="button_singup" onclick="document.location=\'./out.php\'">'. $_SESSION['prof'] . '</button>';
            
            
        } else {
            echo '<button class="button_singup" onclick="document.location=\'./vhod.php\'"> Войти </button>';
        }
        ?>
       <form > 
    <input type="text"  class = "poisk" placeholder="Поиск товаров...">
    </form>
    </header>
    <div class="slider-container">
  <div class="slider">
    <img src="photo slider/4kioqD9BxH0.jpg">
    
  </div>
  <button class="prev-btn"><</button>
  <button class="next-btn">></button>
</div>

<div class = "container">

        <button class = "butcat">
        <img src="photo_kat/собака.png" class ="photo_kat">
            <p class = "kattext">Собакам</p>
        </button>

        <button class = "butcat">
        <img src="photo_kat/кошки.png" class ="photo_kat">
            <p class = "kattext">Кошкам</p>
        </button>

        <button class = "butcat">
        <img src="photo_kat/птицы.png" class ="photo_kat">
            <p class = "kattext">Птицы</p>
        </button>

        <button class = "butcat">
        <img src="photo_kat/грызуны.png" class ="photo_kat">
            <p class = "kattext">Грызуны</p>
        </button>

        <button class = "butcat">
        <img src="photo_kat/аквариумные.png" class ="photo_kat">
            <p class = "kattext">Аквариумные</p>
        </button>

    </div>

<h2 class = "kategor">Акции</h2>
    
    <form class = "form_tovar">
<?php
$sql_products_stocks = "SELECT * FROM `products` WHERE `stocks` = 1";
$result_products_stocks = mysqli_query($connectinx, $sql_products_stocks);
    
// Проверяем успешность выполнения запроса
if (!$result_products_stocks) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectinx);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products_stocks)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>  <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
        </form>

<h2 class = "kategor">Собакам</h2>

<form class = "form_tovar">
<?php
$sql_products_dog = "SELECT * FROM `products` WHERE `ID_subcut` BETWEEN 1 AND 8 AND `main_page` = 1";
$result_products_dog = mysqli_query($connectinx, $sql_products_dog);
    
// Проверяем успешность выполнения запроса
if (!$result_products_dog) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectinx);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products_dog)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>  <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
        </form>

        <h2 class = "kategor">Кошкам</h2>

<form class = "form_tovar">
<?php
$sql_products_cat = "SELECT * FROM `products` WHERE `ID_subcut` BETWEEN 9 AND 17 AND `main_page` = 1";
$result_products_cat = mysqli_query($connectinx, $sql_products_cat);
    
// Проверяем успешность выполнения запроса
if (!$result_products_cat) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectinx);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products_cat)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>  <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
</form>



<h2 class = "kategor">Птцам</h2>

<form class = "form_tovar">
<?php
$sql_products_birds = "SELECT * FROM `products` WHERE `ID_subcut` BETWEEN 18 AND 21 AND `main_page` = 1";
$result_products_birds = mysqli_query($connectinx, $sql_products_birds);
    
// Проверяем успешность выполнения запроса
if (!$result_products_birds) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectinx);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products_birds)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>  <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
</form>



<h2 class = "kategor">Грызунам</h2>
<form class = "form_tovar">
<?php
$sql_products_rodents = "SELECT * FROM `products` WHERE `ID_subcut` BETWEEN 22 AND 26 AND `main_page` = 1";
$result_products_rodents = mysqli_query($connectinx, $sql_products_rodents);
    
// Проверяем успешность выполнения запроса
if (!$result_products_birds) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectinx);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products_rodents)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>  <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
</form>



<h2 class = "kategor">Аквариумным</h2>
<form class = "form_tovar">
<?php
$sql_products_aquarium = "SELECT * FROM `products` WHERE `ID_subcut` BETWEEN 27 AND 29 AND `main_page` = 1";
$result_products_aquarium = mysqli_query($connectinx, $sql_products_aquarium);
    
// Проверяем успешность выполнения запроса
if (!$result_products_aquarium) {
    echo "Ошибка запроса продуктов: " . mysqli_error($connectinx);
} else {
    // Используем цикл while для перебора всех строк результата запроса
    while ($row = mysqli_fetch_assoc($result_products_aquarium)) {
        echo '<div class = "tovar" > <img src="'. $row['photo']. ' " class = "photo_tovar"> <p class= "Name_prod">' . $row['Name_prod'] . '</p>  <p class= "price">' . $row['price'] . ' ₽</p></div>';
    }
}
?>
        
</form>


</body>
</html>


<script>
    const slider = document.querySelector('.slider');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const slides = document.querySelectorAll('.slider img');
let counter = 0;

nextBtn.addEventListener('click', () => {
  counter++;
  if (counter === slides.length) {
    counter = 0;
  }
  updateSlider();
});

prevBtn.addEventListener('click', () => {
  counter--;
  if (counter < 0) {
    counter = slides.length - 1;
  }
  updateSlider();
});

function updateSlider() {
  slider.style.transform = `translateX(${-counter * 100}%)`;
}

</script>