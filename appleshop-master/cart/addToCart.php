<?php
include_once '../api/database.php'; // подключаем скрипт подключения к базе, проверяем, было ли подлючение ранее
include_once '../api/security.php'; // проверка авторизации пользователя

$userid = $_SESSION['id']; // запись  id в переменную
$article = $_REQUEST['id'];
if(isset($userid) && isset($article)){
    if(mysqli_query($conn,"INSERT into `cart` (userid, article) VALUES  ('$userid','$article')")){ // добавление товара в корзину
        echo 'Товар добавлен';
    }else{
        echo 'Ошибка';
    }
}
?> // возвращение на страницу с товарами при условии выполнения предыдущего шага
<script>
    window.location.href = "/market"
</script>
