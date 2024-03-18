<?php
if (isset($_POST['category'])) {
    $selectedCategory = $_POST['category'];
    $connectadm = mysqli_connect('localhost', 'root', '', 'zoomagaz');

    if (mysqli_connect_errno()) {
        echo "Ошибка соединения с базой данных: " . mysqli_connect_error();
        exit();
    }

    $sql_subcategories = "SELECT * FROM `subcategories` WHERE `IDcut` = '$selectedCategory'";
    $result_subcategories = mysqli_query($connectadm, $sql_subcategories);

    if ($result_subcategories) {
        while ($rows = mysqli_fetch_assoc($result_subcategories)) {
            echo "<option value='" . $rows['ID_subcut'] . "'>" .  $rows['Name_subcut'] . "</option>";
        }
        
    } else {
        echo "Ошибка запроса подкатегорий: " . mysqli_error($connectadm);
    }
}
?>
